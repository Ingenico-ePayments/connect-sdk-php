<?php
namespace GCS\HostedCheckout\Definitions;

use GCS\DataObject;

/**
 * Class HostedCheckoutSpecificInput
 *
 * @package GCS\HostedCheckout\Definitions
 */
class HostedCheckoutSpecificInput extends DataObject
{
    /**
     * @var bool
     */
    public $isRecurring = null;

    /**
     * @var string
     */
    public $locale = null;

    /**
     * @var string
     */
    public $returnUrl = null;

    /**
     * @var bool
     */
    public $showResultPage = null;

    /**
     * @var string
     */
    public $tokens = null;

    /**
     * @var string
     */
    public $variant = null;

    /**
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'isRecurring')) {
            $this->isRecurring = $object->isRecurring;
        }
        if (property_exists($object, 'locale')) {
            $this->locale = $object->locale;
        }
        if (property_exists($object, 'returnUrl')) {
            $this->returnUrl = $object->returnUrl;
        }
        if (property_exists($object, 'showResultPage')) {
            $this->showResultPage = $object->showResultPage;
        }
        if (property_exists($object, 'tokens')) {
            $this->tokens = $object->tokens;
        }
        if (property_exists($object, 'variant')) {
            $this->variant = $object->variant;
        }
        return $this;
    }
}
