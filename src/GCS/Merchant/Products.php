<?php
namespace GCS\Merchant;

use GCS\errors\ErrorResponse;
use GCS\product\PaymentProductResponse;
use GCS\product\PaymentProducts;
use GCS\Resource;

/**
 * Class Products
 *
 * Products client.
 * Get information about payment products
 *
 * @package GCS\Merchant
 */
class Products extends Resource
{
    /**
     * Resource /{merchantId}/products/{paymentProductId}
     *
     * @param int $paymentProductId
     *
     * @return Products\PaymentProduct
     *
     * @throws ErrorResponse
     */
    public function paymentProduct($paymentProductId)
    {
        $newContext = $this->context;
        $newContext['paymentProductId'] = $paymentProductId;
        return new Products\PaymentProduct($this, $newContext);
    }

    /**
     * Resource /{merchantId}/products
     * Retrieve payment products
     *
     * @param Products\FindParams $query
     *
     * @return PaymentProducts
     *
     * @throws ErrorResponse
     */
    public function find($query)
    {
        $responseClassMap = new \GCS\ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\product\PaymentProducts');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/products'),
            $this->getClientMetaInfo(),
            $query
        );
    }

    /**
     * Resource /{merchantId}/products/{paymentProductId}
     * Retrieve payment product fields
     *
     * @param int $paymentProductId
     * @param Products\GetParams $query
     *
     * @return PaymentProductResponse
     *
     * @throws ErrorResponse
     */
    public function get($paymentProductId, $query)
    {
        $this->context['paymentProductId'] = $paymentProductId;
        $responseClassMap = new \GCS\ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\product\PaymentProductResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/products/{paymentProductId}'),
            $this->getClientMetaInfo(),
            $query
        );
    }
}
