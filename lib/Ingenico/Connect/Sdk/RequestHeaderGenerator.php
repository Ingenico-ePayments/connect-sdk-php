<?php
namespace Ingenico\Connect\Sdk;

use stdClass;
use DateTime;
use UnexpectedValueException;

/**
 * Class RequestHeaderGenerator
 *
 * @package Ingenico\Connect\Sdk
 */
class RequestHeaderGenerator
{
    const SDK_VERSION = '5.5.1';

    const AUTHORIZATION_ID = 'GCS';

    const DATE_RFC2616 = 'D, d M Y H:i:s T';

    const AUTHORIZATION_TYPE = 'v1HMAC';

    const HASH_ALGORITHM = 'sha256';

    const MIME_APPLICATION_JSON = 'application/json';

    /** @var CommunicatorConfiguration */
    protected $communicatorConfiguration;

    /** @var string */
    protected $httpMethodText;

    /** @var string */
    protected $uriPath;

    /** @var string */
    protected $clientMetaInfo;

    /** @var CallContext */
    protected $callContext;

    /**
     * @param CommunicatorConfiguration $communicatorConfiguration
     * @param string $httpMethodText
     * @param string $uriPath
     * @param string $clientMetaInfo
     * @param CallContext $callContext
     * @throws UnexpectedValueException
     */
    public function __construct(
        CommunicatorConfiguration $communicatorConfiguration,
        $httpMethodText,
        $uriPath,
        $clientMetaInfo = '',
        CallContext $callContext = null
    ) {
        if (!in_array($httpMethodText, array('GET','PUT','POST','DELETE'))) {
            throw new UnexpectedValueException(sprintf('Undefined HTTP-method, got %s', $httpMethodText));
        }
        $this->communicatorConfiguration = $communicatorConfiguration;
        $this->httpMethodText = $httpMethodText;
        $this->uriPath = $uriPath;
        $this->clientMetaInfo = $clientMetaInfo;
        $this->callContext = $callContext;
    }

    /**
     * @return string[]
     */
    public function generateRequestHeaders()
    {
        $contentType = static::MIME_APPLICATION_JSON;
        $rfc2616Date = $this->getRfc161Date();
        $requestHeaders = array();
        $requestHeaders['Content-Type'] = $contentType;
        $requestHeaders['Date'] = $rfc2616Date;
        if ($this->clientMetaInfo) {
            $requestHeaders['X-GCS-ClientMetaInfo'] = $this->clientMetaInfo;
        }
        $requestHeaders['X-GCS-ServerMetaInfo'] = $this->getServerMetaInfoValue();
        if ($this->callContext && strlen($this->callContext->getIdempotenceKey()) > 0) {
            $requestHeaders['X-GCS-Idempotence-Key'] = $this->callContext->getIdempotenceKey();
        }
        $requestHeaders['Authorization'] = $this->getAuthorizationHeaderValue($requestHeaders);
        return $requestHeaders;
    }

    /**
     * @return string
     */
    protected function getRfc161Date()
    {
        $dateTime = new DateTime('now');
        return $dateTime->format(static::DATE_RFC2616);
    }

    protected function getServerMetaInfoValue()
    {
        // use a stdClass instead of specific class to keep out null properties
        $serverMetaInfo = new stdClass();
        $serverMetaInfo->platformIdentifier = sprintf('%s; php version %s', php_uname(), phpversion());
        $serverMetaInfo->sdkIdentifier = 'PHPServerSDK/v' . static::SDK_VERSION;
        $serverMetaInfo->sdkCreator = 'Ingenico';

        $integrator = $this->communicatorConfiguration->getIntegrator();
        if (!is_null($integrator)) {
            $serverMetaInfo->integrator = $integrator;
        }
        $shoppingCartExtension = $this->communicatorConfiguration->getShoppingCartExtension();
        if (!is_null($shoppingCartExtension)) {
            $serverMetaInfo->shoppingCartExtension = $shoppingCartExtension;
        }
        // the sdkIdentifier contains a /. Without the JSON_UNESCAPED_SLASHES, this is turned to \/ in JSON.
        return base64_encode(json_encode($serverMetaInfo, JSON_UNESCAPED_SLASHES));
    }

    /**
     * @param string[] $requestHeaders
     * @return string
     */
    protected function getAuthorizationHeaderValue($requestHeaders)
    {
        return
            static::AUTHORIZATION_ID . ' ' . static::AUTHORIZATION_TYPE. ':'.
            $this->communicatorConfiguration->getApiKeyId() .':'.
            base64_encode(
                hash_hmac(
                    static::HASH_ALGORITHM,
                    $this->getSignData($requestHeaders),
                    $this->communicatorConfiguration->getApiSecret(),
                    true
                )
            );
    }

    /**
     * @param string[] $requestHeaders
     * @return string
     */
    protected function getSignData($requestHeaders)
    {
        $signData = $this->httpMethodText . "\n";
        if (isset($requestHeaders['Content-Type'])) {
            $signData .= $requestHeaders['Content-Type'] . "\n";
        } else {
            $signData .= "\n";
        }
        if (isset($requestHeaders['Date'])) {
            $signData .= $requestHeaders['Date'] . "\n";
        } else {
            $signData .= "\n";
        }
        $gcsHeaders = array();
        foreach ($requestHeaders as $headerKey => $headerValue) {
            if (preg_match('/X-GCS/i', $headerKey)) {
                $gcsHeaders[$headerKey] = $headerValue;
            }
        }
        ksort($gcsHeaders);
        foreach ($gcsHeaders as $gcsHeaderKey => $gcsHeaderValue) {
            $gcsEncodedHeaderValue = trim(preg_replace('/\r?\n[\h]*/', ' ', $gcsHeaderValue));

            $signData .= strtolower($gcsHeaderKey).':'.$gcsEncodedHeaderValue. "\n";
        }
        $signData .= $this->uriPath . "\n";
        return $signData;
    }
}
