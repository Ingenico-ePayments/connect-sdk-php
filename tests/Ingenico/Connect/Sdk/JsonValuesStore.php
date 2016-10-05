<?php
namespace Ingenico\Connect\Sdk;

use Exception;

/**
 * Class JsonValuesStore
 */
class JsonValuesStore
{
    /**
     * @var null|string
     */
    protected $valuesFilePath = null;

    /**
     * @var null|StdClass
     */
    protected $valuesObject = null;

    /**
     * @param $valuesFilePath
     */
    public function __construct($valuesFilePath)
    {
        $this->valuesFilePath = $valuesFilePath;
    }

    /**
     * @param string $key
     * @param bool $isRequired
     * @return mixed
     * @throws Exception
     */
    public function getValue($key, $isRequired = true)
    {
        $valuesObject = $this->getValuesObject();
        $value = null;
        if (!property_exists($valuesObject, $key) && $isRequired) {
            throw new Exception('could not find property "' . $key . '"" in file "' . $this->valuesFilePath . '"');
        }
        if (property_exists($valuesObject, $key)) {
            $value = $valuesObject->{$key};
        }
        return $value;
    }

    /**
     * @return StdClass
     * @throws Exception
     */
    protected function getValuesObject()
    {
        if (is_null($this->valuesObject)) {
            if (!file_exists($this->valuesFilePath)) {
                throw new Exception('could not open file ' . $this->valuesFilePath . ' (file does not exist)');
            }
            if (!is_readable($this->valuesFilePath)) {
                throw new Exception('could not open file ' . $this->valuesFilePath . ' (file is not readable)');
            }
            $valuesObject = json_decode(file_get_contents($this->valuesFilePath));
            if (!$valuesObject) {
                throw new Exception(
                    'could not read JSON values file ' . $this->valuesFilePath . ' (file does not contain valid json)'
                );
            }
            $this->valuesObject = $valuesObject;
        }

        return $this->valuesObject;
    }
}
