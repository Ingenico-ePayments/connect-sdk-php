<?php
namespace GCS\Merchant;

use GCS\Errors\ErrorResponse;
use GCS\Payment\ApprovePaymentRequest;
use GCS\Payment\CancelApprovalPaymentResponse;
use GCS\Payment\CancelPaymentResponse;
use GCS\Payment\CreatePaymentRequest;
use GCS\Payment\CreatePaymentResponse;
use GCS\Payment\PaymentApprovalResponse;
use GCS\Payment\PaymentErrorResponse;
use GCS\Payment\PaymentResponse;
use GCS\Payment\TokenizePaymentRequest;
use GCS\Refund\RefundErrorResponse;
use GCS\Refund\RefundRequest;
use GCS\Refund\RefundResponse;
use GCS\Resource;
use GCS\ResponseClassMap;
use GCS\Token\CreateTokenResponse;

/**
 * Class Payments
 *
 * Payments client.
 * Create, cancel and approve payments
 *
 * @package GCS\Merchant
 */
class Payments extends Resource
{
    /**
     * Resource /{merchantId}/payments/{paymentId}/refund
     * Create refund
     *
     * @param string $paymentId
     * @param RefundRequest $body
     *
     * @return RefundResponse
     *
     * @throws RefundErrorResponse
     * @throws ErrorResponse
     */
    public function refund($paymentId, $body)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(400, '\GCS\Refund\RefundErrorResponse');
        $responseClassMap->addResponseClassName(201, '\GCS\Refund\RefundResponse');
        $responseClassMap->addResponseClassName(404, '\GCS\Refund\RefundErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}/refund'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/processchallenged
     * Approves challenged payment
     *
     * @param string $paymentId
     *
     * @return PaymentResponse
     *
     * @throws ErrorResponse
     */
    public function processchallenged($paymentId)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\Payment\PaymentResponse');
        $responseClassMap->addResponseClassName(404, '\GCS\Errors\ErrorResponse');
        $responseClassMap->addResponseClassName(405, '\GCS\Errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}/processchallenged'),
            $this->getClientMetaInfo()
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}
     * Retrieve payment
     *
     * @param string $paymentId
     *
     * @return PaymentResponse
     *
     * @throws ErrorResponse
     */
    public function get($paymentId)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\Payment\PaymentResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}'),
            $this->getClientMetaInfo()
        );
    }

    /**
     * Resource /{merchantId}/payments
     * Create payment
     *
     * @param CreatePaymentRequest $body
     *
     * @return CreatePaymentResponse
     *
     * @throws PaymentErrorResponse
     * @throws ErrorResponse
     */
    public function create($body)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(400, '\GCS\Payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(402, '\GCS\Payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(403, '\GCS\Payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(502, '\GCS\Payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(503, '\GCS\Payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(201, '\GCS\Payment\CreatePaymentResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/tokenize
     * Create a token from payment
     *
     * @param string $paymentId
     * @param TokenizePaymentRequest $body
     *
     * @return CreateTokenResponse
     *
     * @throws ErrorResponse
     */
    public function tokenize($paymentId, $body)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\Token\CreateTokenResponse');
        $responseClassMap->addResponseClassName(201, '\GCS\Token\CreateTokenResponse');
        $responseClassMap->addResponseClassName(404, '\GCS\Errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}/tokenize'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/cancel
     * Cancel payment
     *
     * @param string $paymentId
     *
     * @return CancelPaymentResponse
     *
     * @throws ErrorResponse
     */
    public function cancel($paymentId)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\Payment\CancelPaymentResponse');
        $responseClassMap->addResponseClassName(402, '\GCS\Errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}/cancel'),
            $this->getClientMetaInfo()
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/approve
     * Capture payment
     *
     * @param string $paymentId
     * @param ApprovePaymentRequest $body
     *
     * @return PaymentApprovalResponse
     *
     * @throws ErrorResponse
     */
    public function approve($paymentId, $body)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\Payment\PaymentApprovalResponse');
        $responseClassMap->addResponseClassName(402, '\GCS\Errors\ErrorResponse');
        $responseClassMap->addResponseClassName(404, '\GCS\Errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}/approve'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/cancelapproval
     * Undo capture payment request
     *
     * @param string $paymentId
     *
     * @return CancelApprovalPaymentResponse
     *
     * @throws ErrorResponse
     */
    public function cancelapproval($paymentId)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\Payment\CancelApprovalPaymentResponse');
        $responseClassMap->addResponseClassName(404, '\GCS\Errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}/cancelapproval'),
            $this->getClientMetaInfo()
        );
    }
}
