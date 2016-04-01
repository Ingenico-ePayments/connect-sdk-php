<?php

/**
 * Payments client.
 * Create, cancel and approve payments
 */
class GCS_Merchant_Payments extends GCS_Resource
{
    /**
     * Resource /{merchantId}/payments/{paymentId}/refund
     * Create refund
     *
     * @param string $paymentId
     * @param GCS_refund_RefundRequest $body
     * @param GCS_CallContext $callContext
     * @return GCS_refund_RefundResponse
     * 
     * @throws GCS_refund_RefundErrorResponse
     * @throws GCS_errors_ErrorResponse
     */
    public function refund($paymentId, $body, GCS_CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(400, 'GCS_refund_RefundErrorResponse');
        $responseClassMap->addResponseClassName(201, 'GCS_refund_RefundResponse');
        $responseClassMap->addResponseClassName(404, 'GCS_refund_RefundErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}/refund'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/processchallenged
     * Approves challenged payment
     *
     * @param string $paymentId
     * @param GCS_CallContext $callContext
     * @return GCS_payment_PaymentResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function processchallenged($paymentId, GCS_CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_payment_PaymentResponse');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
        $responseClassMap->addResponseClassName(405, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}/processchallenged'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}
     * Retrieve payment
     *
     * @param string $paymentId
     * @param GCS_CallContext $callContext
     * @return GCS_payment_PaymentResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function get($paymentId, GCS_CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_payment_PaymentResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payments
     * Create payment
     *
     * @param GCS_payment_CreatePaymentRequest $body
     * @param GCS_CallContext $callContext
     * @return GCS_payment_CreatePaymentResponse
     * 
     * @throws GCS_payment_PaymentErrorResponse
     * @throws GCS_errors_ErrorResponse
     */
    public function create($body, GCS_CallContext $callContext = null)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(400, 'GCS_payment_PaymentErrorResponse');
        $responseClassMap->addResponseClassName(402, 'GCS_payment_PaymentErrorResponse');
        $responseClassMap->addResponseClassName(403, 'GCS_payment_PaymentErrorResponse');
        $responseClassMap->addResponseClassName(502, 'GCS_payment_PaymentErrorResponse');
        $responseClassMap->addResponseClassName(503, 'GCS_payment_PaymentErrorResponse');
        $responseClassMap->addResponseClassName(201, 'GCS_payment_CreatePaymentResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/tokenize
     * Create a token from payment
     *
     * @param string $paymentId
     * @param GCS_payment_TokenizePaymentRequest $body
     * @param GCS_CallContext $callContext
     * @return GCS_token_CreateTokenResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function tokenize($paymentId, $body, GCS_CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_token_CreateTokenResponse');
        $responseClassMap->addResponseClassName(201, 'GCS_token_CreateTokenResponse');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}/tokenize'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/cancel
     * Cancel payment
     *
     * @param string $paymentId
     * @param GCS_CallContext $callContext
     * @return GCS_payment_CancelPaymentResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function cancel($paymentId, GCS_CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_payment_CancelPaymentResponse');
        $responseClassMap->addResponseClassName(402, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}/cancel'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/approve
     * Capture payment
     *
     * @param string $paymentId
     * @param GCS_payment_ApprovePaymentRequest $body
     * @param GCS_CallContext $callContext
     * @return GCS_payment_PaymentApprovalResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function approve($paymentId, $body, GCS_CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_payment_PaymentApprovalResponse');
        $responseClassMap->addResponseClassName(402, 'GCS_errors_ErrorResponse');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}/approve'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/cancelapproval
     * Undo capture payment request
     *
     * @param string $paymentId
     * @param GCS_CallContext $callContext
     * @return GCS_payment_CancelApprovalPaymentResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function cancelapproval($paymentId, GCS_CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_payment_CancelApprovalPaymentResponse');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payments/{paymentId}/cancelapproval'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }
}
