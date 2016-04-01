<?php

class GCS_RequestHeaderGenerator
{

    const AUTHORIZATION_ID = 'GCS';

    const DATE_RFC2616 = 'D, d M Y H:i:s T';

    const AUTHORIZATION_TYPE = 'v1HMAC';

    const HASH_ALGORITHM = 'sha256';

    const MIME_APPLICATION_JSON = 'application/json';

    /** @var GCS_CommunicatorConfiguration */
    protected $communicatorConfiguration;

    /** @var string */
    protected $httpMethodText;

    /** @var string */
    protected $uriPath;

    /** @var string */
    protected $clientMetaInfo;

    /** @var GCS_CallContext */
    protected $callContext;

    /**
     * @param GCS_CommunicatorConfiguration $communicatorConfiguration
     * @param string $httpMethodText
     * @param string $uriPath
     * @param string $clientMetaInfo
     * @param GCS_CallContext $callContext
     * @throws UnexpectedValueException
     */

    public function __construct(
        GCS_CommunicatorConfiguration $communicatorConfiguration,
        $httpMethodText,
        $uriPath,
        $clientMetaInfo = '',
        GCS_CallContext $callContext = null
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
        $contentType = self::MIME_APPLICATION_JSON;
        $rfc2616Date = $this->getRfc161Date();
        $requestHeaders = array();
        $requestHeaders['Content-type'] = $contentType;
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
        return $dateTime->format(self::DATE_RFC2616);
    }

    protected function getServerMetaInfoValue()
    {
        $serverMetaInfo = new GCS_ServerMetaInfo();
        $serverMetaInfo->platformIdentifier = sprintf('%s; php version %s', php_uname(), phpversion());
        $serverMetaInfo->sdkIdentifier = 'v1.0';
        return base64_encode(json_encode($serverMetaInfo));
    }

    /**
     * @param string[] $requestHeaders
     * @return string
     */
    protected function getAuthorizationHeaderValue($requestHeaders)
    {
        return
            self::AUTHORIZATION_ID . ' ' . self::AUTHORIZATION_TYPE. ':'.
            $this->communicatorConfiguration->getApiKeyId() .':'.
            base64_encode(
                hash_hmac(
                    self::HASH_ALGORITHM,
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
        if (isset($requestHeaders['Content-type'])) {
            $signData .= $requestHeaders['Content-type'] . "\n";
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
            $gcsEncodedHeaderValue = trim(preg_replace('/\s+/', ' ', $gcsHeaderValue));

            $signData .= strtolower($gcsHeaderKey).':'.$gcsEncodedHeaderValue. "\n";
        }
        $signData .= $this->uriPath . "\n";
        return $signData;
    }
}
