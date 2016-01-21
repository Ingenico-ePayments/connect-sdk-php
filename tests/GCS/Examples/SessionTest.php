<?php

/**
 * @group examples
 *
 */
class GCS_Client_SessionTest extends GCS_ClientTestCase
{
    const MERCHANT_ID = "20000";

    /**
     * @return GCS_sessions_SessionResponse
     * @throws GCS_ApiException
     */
    public function testCreateSession()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $sessionRequest = new GCS_sessions_SessionRequest();

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
