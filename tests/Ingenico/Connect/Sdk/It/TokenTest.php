<?php
namespace Ingenico\Connect\Sdk\It;

use Ingenico\Connect\Sdk\ClientTestCase;
use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use Ingenico\Connect\Sdk\Domain\Definitions\CardWithoutCvv;
use Ingenico\Connect\Sdk\Domain\Token\CreateTokenRequest;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenCard;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenCardData;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\CustomerToken;
use Ingenico\Connect\Sdk\Merchant\Tokens\DeleteTokenParams;

/**
 * @group integration
 *
 */
class TokenTest extends ClientTestCase
{
    /**
     * Smoke test for token calls.
     */
    public function test()
    {
        $billingAddress = new Address();
        $billingAddress->countryCode = "NL";

        $customer = new CustomerToken();
        $customer->billingAddress = $billingAddress;

        $cardWithoutCvv = new CardWithoutCvv();
        $cardWithoutCvv->cardholderName = "Jan";
        $cardWithoutCvv->issueNumber = "12";
        $cardWithoutCvv->cardNumber = "4567350000427977";
        $cardWithoutCvv->expiryDate = "1225";

        $mandate = new TokenCardData();
        $mandate->cardWithoutCvv = $cardWithoutCvv;

        $tokenCard = new TokenCard();
        $tokenCard->customer = $customer;
        $tokenCard->data = $mandate;

        $createTokenRequest = new CreateTokenRequest();
        $createTokenRequest->paymentProductId = 1;
        $createTokenRequest->card = $tokenCard;

        $client = $this->getClient();
        $merchantId = $this->getMerchantId();
        $createTokenResponse = $client->merchant($merchantId)->tokens()->create($createTokenRequest);

        $this->assertNotNull($createTokenResponse->token);

        $deleteTokenRequest = new DeleteTokenParams();
        $client->merchant($merchantId)->tokens()->delete($createTokenResponse->token, $deleteTokenRequest);
    }
}
