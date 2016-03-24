<?php
namespace GCS;

/**
 * Class RequestHeaderGenerator
 *
 * @package GCS
 */
class RequestHeaderGenerator
{

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

    /** @var  string */
    protected $clientMetaInfo;

    /**
     * @param CommunicatorConfiguration $communicatorConfiguration
     * @param string $httpMethodText
     * @param string $uriPath
     * @param string $clientMetaInfo
     *
     * @throws \UnexpectedValueException
     */

    public function __construct(
        CommunicatorConfiguration $communicatorConfiguration,
        $httpMethodText,
        $uriPath,
        $clientMetaInfo = ''
    ) {
        if (!in_array($httpMethodText, array('GET','PUT','POST','DELETE'))) {
            throw new \UnexpectedValueException(sprintf('Undefined HTTP-method, got %s', $httpMethodText));
        }
        $this->communicatorConfiguration = $communicatorConfiguration;
        $this->httpMethodText = $httpMethodText;
        $this->uriPath = $uriPath;
        $this->clientMetaInfo = $clientMetaInfo;
    }

    /**
     * @return string[]
     */
    public function generateRequestHeaders()
    {
        $contentType = self::MIME_APPLICATION_JSON;
        $rfc2616Date = $this->getRfc161Date();
        $requestHeaderValuesByFieldName = array();
        $requestHeaderValuesByFieldName['Content-type'] = $contentType;
        $requestHeaderValuesByFieldName['Date'] = $rfc2616Date;
        if ($this->clientMetaInfo) {
            $requestHeaderValuesByFieldName['X-GCS-ClientMetaInfo'] = $this->clientMetaInfo;
        }
        $requestHeaderValuesByFieldName['X-GCS-ServerMetaInfo'] = $this->getServerMetaInfoValue();
        $requestHeaderValuesByFieldName['Authorization'] =
            $this->getAuthorizationHeaderValue($requestHeaderValuesByFieldName);
        $requestHeaders = array();
        foreach ($requestHeaderValuesByFieldName as $fieldName => $fieldValue) {
            $requestHeaders[] = sprintf('%s: %s', $fieldName, $fieldValue);
        }
        return $requestHeaders;
    }

    /**
     * @return string
     */
    protected function getRfc161Date()
    {
        $dateTime = new \DateTime('now');
        return $dateTime->format(self::DATE_RFC2616);
    }

    /**
     * @return string
     */
    protected function getServerMetaInfoValue()
    {
        $serverMetaInfo = new ServerMetaInfo();
        $serverMetaInfo->platformIdentifier = sprintf('%s; php version %s', php_uname(), phpversion());
        $serverMetaInfo->sdkIdentifier = 'v1.0';
        return base64_encode(json_encode($serverMetaInfo));
    }

    /**
     * @param string[] $requestHeaderValuesByFieldName
     *
     * @return string
     */
    protected function getAuthorizationHeaderValue($requestHeaderValuesByFieldName)
    {
        return
            self::AUTHORIZATION_ID . ' ' . self::AUTHORIZATION_TYPE. ':'.
            $this->communicatorConfiguration->getApiKeyId() .':'.
            base64_encode(
                hash_hmac(
                    self::HASH_ALGORITHM,
                    $this->getSignData($requestHeaderValuesByFieldName),
                    $this->communicatorConfiguration->getApiSecret(),
                    true
                )
            );
    }

    /**
     * @param string[] $requestHeaderValuesByFieldName
     *
     * @return string
     */
    protected function getSignData($requestHeaderValuesByFieldName)
    {
        $signData = $this->httpMethodText . "\n";
        if (isset($requestHeaderValuesByFieldName['Content-type'])) {
            $signData .= $requestHeaderValuesByFieldName['Content-type'] . "\n";
        } else {
            $signData .= "\n";
        }
        if (isset($requestHeaderValuesByFieldName['Date'])) {
            $signData .= $requestHeaderValuesByFieldName['Date'] . "\n";
        } else {
            $signData .= "\n";
        }
        $gcsHeaders = array();
        foreach ($requestHeaderValuesByFieldName as $headerKey => $headerValue) {
            if (preg_match('/X-GCS/i', $headerKey)) {
                $gcsHeaders[$headerKey] = $headerValue;
            }
        }
        ksort($gcsHeaders);
        foreach ($gcsHeaders as $gcsHeaderKey => $gcsHeaderValue) {
            $gcsEncodedHeaderValue = trim(preg_replace('/\s+/', ' ', $gcsHeaderValue));

            $signData .= strtolower($gcsHeaderKey).':'.$gcsEncodedHeaderValue. "\n";
        }
        $signData .= $this->uriPath . "\n";
        return $signData;
    }
}
