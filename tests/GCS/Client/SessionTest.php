<?php
namespace GCS\Client;

use GCS\ApiException;
use GCS\ClientTestCase;
use GCS\sessions\SessionRequest;
use GCS\sessions\SessionResponse;

/**
 * Class SessionTest
 *
 * @package GCS\Client
 * @group   examples
 */
class SessionTest extends ClientTestCase
{
    const MERCHANT_ID = "20000";

    /**
     * @return SessionResponse
     *
     * @throws ApiException
     */
    public function testCreateSession()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $sessionRequest = new SessionRequest();

        $tokens = array();

        $tokens[] = "122c5b4d-dd40-49f0-b7c9-3594212167a9";
        $tokens[] = "126166b16ed04b3ab85fb06da1d7a167";
        $tokens[] = "226166b16ed04b3ab85fb06da1d7a167";
        $tokens[] = "326166b16ed04b3ab85fb06da1d7a167";
        $tokens[] = "426166b16ed04b3ab85fb06da1d7a167";

        $sessionRequest->tokens = $tokens;

        $response = $client->merchant($merchantId)->sessions()->create($sessionRequest);
        return $response;
    }
}
