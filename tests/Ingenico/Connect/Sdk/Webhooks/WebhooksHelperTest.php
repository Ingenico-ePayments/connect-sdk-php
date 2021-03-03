<?php
namespace Ingenico\Connect\Sdk\Webhooks;

use Ingenico\Connect\Sdk\Client;
use Ingenico\Connect\Sdk\ConnectionResponse;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ResponseFactory;

/**
 * @group webhooks
 */
class WebhooksHelperTest extends \PHPUnit\Framework\TestCase
{
    const SIGNATURE_HEADER = 'X-GCS-Signature';
    const SIGNATURE = '2S7doBj/GnJnacIjSJzr5fxGM5xmfQyFAwxv1I53ZEk=';

    const KEY_ID_HEADER = 'X-GCS-KeyId';
    const KEY_ID = 'dummy-key-id';

    const SECRET_KEY = 'hello+world';

    const VALID_BODY_WITHOUT_LINEBREAK_FIX = <<<EOD
{
  "apiVersion": "v1",
  "id": "8ee793f6-4553-4749-85dc-f2ef095c5ab0",
  "created": "2017-02-02T11:24:14.040+0100",
  "merchantId": "20000",
  "type": "payment.paid",
  "payment": {
    "id": "00000200000143570012",
    "paymentOutput": {
      "amountOfMoney": {
        "amount": 1000,
        "currencyCode": "EUR"
      },
      "references": {
        "paymentReference": "200001681810"
      },
      "paymentMethod": "bankTransfer",
      "bankTransferPaymentMethodSpecificOutput": {
        "paymentProductId": 11
      }
    },
    "status": "PAID",
    "statusOutput": {
      "isCancellable": false,
      "statusCategory": "COMPLETED",
      "statusCode": 1000,
      "statusCodeChangeDateTime": "20170202112414",
      "isAuthorized": true
    }
  }
}
EOD;

    const INVALID_BODY_WITHOUT_LINEBREAK_FIX = <<<EOD
{
  "apiVersion": "v1",
  "id": "8ee793f6-4553-4749-85dc-f2ef095c5ab0",
  "created": "2017-02-02T11:25:14.040+0100",
  "merchantId": "20000",
  "type": "payment.paid",
  "payment": {
    "id": "00000200000143570012",
    "paymentOutput": {
      "amountOfMoney": {
        "amount": 1000,
        "currencyCode": "EUR"
      },
      "references": {
        "paymentReference": "200001681810"
      },
      "paymentMethod": "bankTransfer",
      "bankTransferPaymentMethodSpecificOutput": {
        "paymentProductId": 11
      }
    },
    "status": "PAID",
    "statusOutput": {
      "isCancellable": false,
      "statusCategory": "COMPLETED",
      "statusCode": 1000,
      "statusCodeChangeDateTime": "20170202112514",
      "isAuthorized": true
    }
  }
}
EOD;
    // the above constants may contain \r but the body from which the signature was created doesn't
    private $validBody;

    private $invalidBody;

    public function __construct()
    {
        parent::__construct();
        $this->validBody = preg_replace("/\r\n/", "\n", self::VALID_BODY_WITHOUT_LINEBREAK_FIX);
        $this->invalidBody = preg_replace("/\r\n/", "\n", self::INVALID_BODY_WITHOUT_LINEBREAK_FIX);
    }

    function testUnmarshalApiVersionMismatch()
    {
        $secretKeyStore = new InMemorySecretKeyStore(array(self::KEY_ID => self::SECRET_KEY));
        $helper = new ApiVersionMismatchTestingWebhooksHelper($secretKeyStore);

        $requestHeaders = array(self::SIGNATURE_HEADER => self::SIGNATURE, self::KEY_ID_HEADER => self::KEY_ID);
        try {
            $helper->unmarshal($this->validBody, $requestHeaders);
        } catch (ApiVersionMismatchException $e) {
            $this->assertEquals('v0', $e->getEventApiVersion());
            $this->assertEquals(Client::API_VERSION, $e->getSdkApiVersion());
            return;
        }
        $this->fail('an expected exception has not been raised');
    }

    function testUnmarshalNoSecretKeyAvailable()
    {
        $secretKeyStore = new InMemorySecretKeyStore();
        $helper = $this->createHelper($secretKeyStore);

        $requestHeaders = array(self::SIGNATURE_HEADER => self::SIGNATURE, self::KEY_ID_HEADER => self::KEY_ID);

        try {
            $helper->unmarshal($this->validBody, $requestHeaders);
        } catch (SecretKeyNotAvailableException $e) {
            $this->assertEquals(self::KEY_ID, $e->getKeyId());
            return;
        }
        $this->fail('an expected exception has not been raised');
    }

    function testUnmarshalMissingHeaders()
    {
        $secretKeyStore = new InMemorySecretKeyStore(array(self::KEY_ID => self::SECRET_KEY));
        $helper = $this->createHelper($secretKeyStore);

        $requestHeaders = array();
        try {
            $helper->unmarshal($this->validBody, $requestHeaders);
        } catch (SignatureValidationException $e) {
            return;
        }
        $this->fail('an expected exception has not been raised');
    }

    function testUnmarshalBytesSuccess()
    {
        $secretKeyStore = new InMemorySecretKeyStore(array(self::KEY_ID => self::SECRET_KEY));
        $helper = $this->createHelper($secretKeyStore);

        $requestHeaders = array(self::SIGNATURE_HEADER => self::SIGNATURE, self::KEY_ID_HEADER => self::KEY_ID);

        $event = $helper->unmarshal($this->validBody, $requestHeaders);

        $this->assertEquals('v1', $event->apiVersion);
        $this->assertEquals('8ee793f6-4553-4749-85dc-f2ef095c5ab0', $event->id);
        $this->assertEquals('2017-02-02T11:24:14.040+0100', $event->created);
        $this->assertEquals('20000', $event->merchantId);
        $this->assertEquals('payment.paid', $event->type);

        $this->assertNull($event->refund);
        $this->assertNull($event->payout);
        $this->assertNull($event->token);

        $this->assertNotNull($event->payment);
        $this->assertEquals('00000200000143570012', $event->payment->id);
        $this->assertNotNull($event->payment->paymentOutput);
        $this->assertNotNull($event->payment->paymentOutput->amountOfMoney);
        $this->assertEquals(1000, $event->payment->paymentOutput->amountOfMoney->amount);
        $this->assertEquals('EUR', $event->payment->paymentOutput->amountOfMoney->currencyCode);
        $this->assertNotNull($event->payment->paymentOutput->references);
        $this->assertEquals('200001681810', $event->payment->paymentOutput->references->paymentReference);
        $this->assertEquals('bankTransfer', $event->payment->paymentOutput->paymentMethod);

        $this->assertNull($event->payment->paymentOutput->cardPaymentMethodSpecificOutput);
        $this->assertNull($event->payment->paymentOutput->cashPaymentMethodSpecificOutput);
        $this->assertNull($event->payment->paymentOutput->directDebitPaymentMethodSpecificOutput);
        $this->assertNull($event->payment->paymentOutput->invoicePaymentMethodSpecificOutput);
        $this->assertNull($event->payment->paymentOutput->redirectPaymentMethodSpecificOutput);
        $this->assertNull($event->payment->paymentOutput->sepaDirectDebitPaymentMethodSpecificOutput);
        $this->assertNotNull($event->payment->paymentOutput->bankTransferPaymentMethodSpecificOutput);
        $this->assertEquals(11, $event->payment->paymentOutput->bankTransferPaymentMethodSpecificOutput->paymentProductId);

        $this->assertEquals('PAID', $event->payment->status);
        $this->assertNotNull($event->payment->statusOutput);
        $this->assertEquals(false, $event->payment->statusOutput->isCancellable);
        $this->assertEquals('COMPLETED', $event->payment->statusOutput->statusCategory);
        $this->assertEquals(1000, $event->payment->statusOutput->statusCode);
        $this->assertEquals('20170202112414', $event->payment->statusOutput->statusCodeChangeDateTime);
        $this->assertEquals(true, $event->payment->statusOutput->isAuthorized);
    }

    function testUnmarshalBytesInvalidBody()
    {
        $secretKeyStore = new InMemorySecretKeyStore(array(self::KEY_ID => self::SECRET_KEY));
        $helper = $this->createHelper($secretKeyStore);

        $requestHeaders = array(self::SIGNATURE_HEADER => self::SIGNATURE, self::KEY_ID_HEADER => self::KEY_ID);
        try {
            $helper->unmarshal($this->invalidBody, $requestHeaders);
        } catch (SignatureValidationException $e) {
            return;
        }
        $this->fail('an expected exception has not been raised');
    }

    function testUnmarshalBytesInvalidSecretKey()
    {
        $invalidSecretKey = '1' . self::SECRET_KEY;
        $secretKeyStore = new InMemorySecretKeyStore(array(self::KEY_ID => $invalidSecretKey));
        $helper = $this->createHelper($secretKeyStore);

        $requestHeaders = array(self::SIGNATURE_HEADER => self::SIGNATURE, self::KEY_ID_HEADER => self::KEY_ID);
        try {
            $helper->unmarshal($this->validBody, $requestHeaders);
        } catch (SignatureValidationException $e) {
            return;
        }
        $this->fail('an expected exception has not been raised');
    }

    function testUnmarshalBytesInvalidSignature()
    {
        $secretKeyStore = new InMemorySecretKeyStore(array(self::KEY_ID => self::SECRET_KEY));
        $helper = $this->createHelper($secretKeyStore);

        $requestHeaders = array(self::SIGNATURE_HEADER => '1' . self::SIGNATURE, self::KEY_ID_HEADER => self::KEY_ID);
        try {
            $helper->unmarshal($this->validBody, $requestHeaders);
        } catch (SignatureValidationException $e) {
            return;
        }
        $this->fail('an expected exception has not been raised');
    }

    /**
     * @param SecretKeyStore $secretKeyStore
     * @return WebhooksHelper
     */
    protected function createHelper($secretKeyStore)
    {
        return new WebhooksHelper($secretKeyStore);
    }
}

class ApiVersionMismatchTestingWebhooksHelper extends WebhooksHelper
{
    protected function getResponseFactory()
    {
        return new ApiVersionMismatchTestingResponseFactory();
    }
}

class ApiVersionMismatchTestingResponseFactory extends ResponseFactory
{
    public function createResponse(
        ConnectionResponse $response,
        ResponseClassMap $responseClassMap
    ) {
        $event = parent::createResponse($response, $responseClassMap);
        $event->apiVersion = 'v0';
        return $event;
    }
}
