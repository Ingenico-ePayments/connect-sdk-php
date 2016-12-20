<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\DeclinedPaymentException;
use Ingenico\Connect\Sdk\DeclinedRefundException;
use Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse;
use Ingenico\Connect\Sdk\Domain\Payment\ApprovePaymentRequest;
use Ingenico\Connect\Sdk\Domain\Payment\CancelApprovalPaymentResponse;
use Ingenico\Connect\Sdk\Domain\Payment\CancelPaymentResponse;
use Ingenico\Connect\Sdk\Domain\Payment\CreatePaymentRequest;
use Ingenico\Connect\Sdk\Domain\Payment\CreatePaymentResponse;
use Ingenico\Connect\Sdk\Domain\Payment\PaymentApprovalResponse;
use Ingenico\Connect\Sdk\Domain\Payment\PaymentErrorResponse;
use Ingenico\Connect\Sdk\Domain\Payment\PaymentResponse;
use Ingenico\Connect\Sdk\Domain\Payment\TokenizePaymentRequest;
use Ingenico\Connect\Sdk\Domain\Refund\RefundErrorResponse;
use Ingenico\Connect\Sdk\Domain\Refund\RefundRequest;
use Ingenico\Connect\Sdk\Domain\Refund\RefundResponse;
use Ingenico\Connect\Sdk\Domain\Token\CreateTokenResponse;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Payments client.
 * Create, cancel and approve payments
 */
class Payments extends Resource
{
    /**
     * Resource /{merchantId}/payments
     * Create payment
     *
     * @param CreatePaymentRequest $body
     * @param CallContext $callContext
     * @return CreatePaymentResponse
     * 
     * @throws GlobalCollectException
     * @throws InvalidResponseException
     * @throws AuthorizationException
     * @throws ApiException
     * @throws ReferenceException
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws DeclinedPaymentException
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__payments_post Create payment
     */
    public function create($body, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(400, '\Ingenico\Connect\Sdk\Domain\Payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(402, '\Ingenico\Connect\Sdk\Domain\Payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(403, '\Ingenico\Connect\Sdk\Domain\Payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(502, '\Ingenico\Connect\Sdk\Domain\Payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(503, '\Ingenico\Connect\Sdk\Domain\Payment\PaymentErrorResponse');
        $responseClassMap->addResponseClassName(201, '\Ingenico\Connect\Sdk\Domain\Payment\CreatePaymentResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/payments'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}
     * Get payment
     *
     * @param string $paymentId
     * @param CallContext $callContext
     * @return PaymentResponse
     * 
     * @throws GlobalCollectException
     * @throws InvalidResponseException
     * @throws AuthorizationException
     * @throws ValidationException
     * @throws ReferenceException
     * @throws IdempotenceException
     * @throws ApiException
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__payments__paymentId__get Get payment
     */
    public function get($paymentId, CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Payment\PaymentResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/payments/{paymentId}'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/approve
     * Capture payment
     *
     * @param string $paymentId
     * @param ApprovePaymentRequest $body
     * @param CallContext $callContext
     * @return PaymentApprovalResponse
     * 
     * @throws GlobalCollectException
     * @throws InvalidResponseException
     * @throws AuthorizationException
     * @throws ApiException
     * @throws ReferenceException
     * @throws IdempotenceException
     * @throws ValidationException
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__payments__paymentId__approve_post Capture payment
     */
    public function approve($paymentId, $body, CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Payment\PaymentApprovalResponse');
        $responseClassMap->addResponseClassName(402, '\Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse');
        $responseClassMap->addResponseClassName(404, '\Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/payments/{paymentId}/approve'),
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
     * @param CallContext $callContext
     * @return CancelPaymentResponse
     * 
     * @throws GlobalCollectException
     * @throws InvalidResponseException
     * @throws AuthorizationException
     * @throws ApiException
     * @throws ReferenceException
     * @throws IdempotenceException
     * @throws ValidationException
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__payments__paymentId__cancel_post Cancel payment
     */
    public function cancel($paymentId, CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Payment\CancelPaymentResponse');
        $responseClassMap->addResponseClassName(402, '\Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/payments/{paymentId}/cancel'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/cancelapproval
     * Undo capture payment request
     *
     * @param string $paymentId
     * @param CallContext $callContext
     * @return CancelApprovalPaymentResponse
     * 
     * @throws GlobalCollectException
     * @throws InvalidResponseException
     * @throws AuthorizationException
     * @throws ApiException
     * @throws ReferenceException
     * @throws IdempotenceException
     * @throws ValidationException
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__payments__paymentId__cancelapproval_post Undo capture payment request
     */
    public function cancelapproval($paymentId, CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Payment\CancelApprovalPaymentResponse');
        $responseClassMap->addResponseClassName(404, '\Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/payments/{paymentId}/cancelapproval'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/processchallenged
     * Approves challenged payment
     *
     * @param string $paymentId
     * @param CallContext $callContext
     * @return PaymentResponse
     * 
     * @throws GlobalCollectException
     * @throws InvalidResponseException
     * @throws AuthorizationException
     * @throws ApiException
     * @throws ReferenceException
     * @throws IdempotenceException
     * @throws ValidationException
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__payments__paymentId__processchallenged_post Approves challenged payment
     */
    public function processchallenged($paymentId, CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Payment\PaymentResponse');
        $responseClassMap->addResponseClassName(404, '\Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse');
        $responseClassMap->addResponseClassName(405, '\Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/payments/{paymentId}/processchallenged'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payments/{paymentId}/refund
     * Create refund
     *
     * @param string $paymentId
     * @param RefundRequest $body
     * @param CallContext $callContext
     * @return RefundResponse
     * 
     * @throws GlobalCollectException
     * @throws InvalidResponseException
     * @throws AuthorizationException
     * @throws ApiException
     * @throws ReferenceException
     * @throws DeclinedRefundException
     * @throws IdempotenceException
     * @throws ValidationException
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__payments__paymentId__refund_post Create refund
     */
    public function refund($paymentId, $body, CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(400, '\Ingenico\Connect\Sdk\Domain\Refund\RefundErrorResponse');
        $responseClassMap->addResponseClassName(201, '\Ingenico\Connect\Sdk\Domain\Refund\RefundResponse');
        $responseClassMap->addResponseClassName(404, '\Ingenico\Connect\Sdk\Domain\Refund\RefundErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/payments/{paymentId}/refund'),
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
     * @param TokenizePaymentRequest $body
     * @param CallContext $callContext
     * @return CreateTokenResponse
     * 
     * @throws GlobalCollectException
     * @throws InvalidResponseException
     * @throws AuthorizationException
     * @throws ApiException
     * @throws ReferenceException
     * @throws IdempotenceException
     * @throws ValidationException
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__payments__paymentId__tokenize_post Create a token from payment
     */
    public function tokenize($paymentId, $body, CallContext $callContext = null)
    {
        $this->context['paymentId'] = $paymentId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Token\CreateTokenResponse');
        $responseClassMap->addResponseClassName(201, '\Ingenico\Connect\Sdk\Domain\Token\CreateTokenResponse');
        $responseClassMap->addResponseClassName(404, '\Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/payments/{paymentId}/tokenize'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }
}
