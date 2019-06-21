<?php
namespace Ingenico\Connect\Sdk;

/**
 * Class BodyHandler
 * A utility class that can be used to support binary responses. Its handleBodyPart method can be used as
 * callback to methods that require a body handler callable.
 *
 * @package Ingenico\Connect\Sdk
 */
class BodyHandler
{
    /** @var bool */
    private $initialized = false;

    /**
     * Initializes this body handler if not done yet, then calls doHandleBodyPart.
     * @param string $bodyPart
     * @param array $headers
     */
    public final function handleBodyPart($bodyPart, $headers)
    {
        if (!$this->initialized) {
            $this->initialize($headers);
            $this->initialized = true;
        }
        $this->doHandleBodyPart($bodyPart);
    }

    /**
     * Calls doCleanup, then marks this body handler as not initialized.
     * Afterwards this instance can be reused again.
     */
    public final function close()
    {
        $this->doCleanup();
        $this->initialized = false;
    }

    /**
     * Can be used to initialize this body handler based on the given headers.
     * The default implementation does nothing.
     * @param array $headers
     */
    protected function initialize($headers)
    {
    }

    /**
     * Can be used to handle a single body part.
     * The default implementation does nothing.
     * @param string $bodyPart
     */
    protected function doHandleBodyPart($bodyPart)
    {
    }

    /**
     * Can be used to do cleanup resources allocated by this body handler.
     * The default implementation does nothing.
     */
    protected function doCleanup()
    {
    }
}
