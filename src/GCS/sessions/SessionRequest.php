<?php
/**
 * class SessionRequest
 */
class GCS_sessions_SessionRequest extends GCS_DataObject
{
    /**
     * @var string[]
     */
    public $tokens = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'tokens')) {
            if (!is_array($object->tokens) && !is_object($object->tokens)) {
                throw new UnexpectedValueException('value \'' . print_r($object->tokens, true) . '\' is not an array or object');
            }
            $this->tokens = [];
            foreach ($object->tokens as $tokensElementObject) {
                $this->tokens[] = $tokensElementObject;
            }
        }
        return $this;
    }
}
