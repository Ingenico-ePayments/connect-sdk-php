<?php
namespace GCS\Merchant;

use GCS\errors\ErrorResponse;
use GCS\payment\ApprovePaymentRequest;
use GCS\payment\CancelApprovalPaymentResponse;
use GCS\payment\CancelPaymentResponse;
use GCS\payment\CreatePaymentRequest;
use GCS\payment\CreatePaymentResponse;
use GCS\payment\PaymentApprovalResponse;
use GCS\payment\PaymentErrorResponse;
use GCS\payment\PaymentResponse;
use GCS\payment\TokenizePaymentRequest;
use GCS\refund\RefundErrorResponse;
use GCS\refund\RefundRequest;
use GCS\refund\RefundResponse;
use GCS\Resource;
use GCS\ResponseClassMap;
use GCS\token\CreateTokenResponse;

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
        $responseClassMap->addResponseClassName(400, '\GCS\refund\RefundErrorResponse');
        $responseClassMap->addResponseClassName(201, '\GCS\refund\RefundResponse');
        $responseClassMap->addResponseClassName(404, '\GCS\refund\RefundErrorResponse');
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
        $responseClassMap->addResponseClassName(200, '\GCS\payment\PaymentResponse');
        $responseClassMap->addResponseClassName(404, '\GCS\errors\ErrorResponse');
        $responseClassMap->addResponseClassName(405, '\GCS\errors\ErrorResponse');
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
        $responseClassMap->addResponseClassName(200, '\GCS\payment\PaymentResponse');
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
        $responseClassMap->addResponseClassName(400, '\GCS\payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(402, '\GCS\payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(403, '\GCS\payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(502, '\GCS\payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(503, '\GCS\payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(201, '\GCS\payment\CreatePaymentResponse');
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
        $responseClassMap->addResponseClassName(200, '\GCS\token\CreateTokenResponse');
        $responseClassMap->addResponseClassName(201, '\GCS\token\CreateTokenResponse');
        $responseClassMap->addResponseClassName(404, '\GCS\errors\ErrorResponse');
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
        $responseClassMap->addResponseClassName(200, '\GCS\payment\CancelPaymentResponse');
        $responseClassMap->addResponseClassName(402, '\GCS\errors\ErrorResponse');
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
        $responseClassMap->addResponseClassName(200, '\GCS\payment\PaymentApprovalResponse');
        $responseClassMap->addResponseClassName(402, '\GCS\errors\ErrorResponse');
        $responseClassMap->addResponseClassName(404, '\GCS\errors\ErrorResponse');
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
        $responseClassMap->addResponseClassName(200, '\GCS\payment\CancelApprovalPaymentResponse');
        $responseClassMap->addResponseClassName(404, '\GCS\errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}/cancelapproval'),
            $this->getClientMetaInfo()
        );
    }
}
