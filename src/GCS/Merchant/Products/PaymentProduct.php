<?php
namespace GCS\Merchant\Products;

use GCS\product\Directory;
use GCS\Resource;
use GCS\ResponseClassMap;

/**
 * Class PaymentProduct
 *
 * @package GCS\Merchant\Products
 */
class PaymentProduct extends Resource
{
    /**
     * Resource /{merchantId}/products/{paymentProductId}/directory
     * Retrieve payment product directory
     *
     * @param PaymentProduct\DirectoryParams $query
     *
     * @return Directory
     *
     * @throws \GCS\errors\ErrorResponse
     */
    public function directory($query)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\product\Directory');
        $responseClassMap->addResponseClassName(404, '\GCS\errors\ErrorResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/products/{paymentProductId}/directory'),
            $this->getClientMetaInfo(),
            $query
        );
    }
}
