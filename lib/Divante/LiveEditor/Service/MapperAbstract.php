<?php

/**
 * Class Divante_LiveEditor_Service_MapperAbstract
 */
abstract class Divante_LiveEditor_Service_MapperAbstract
{
    /**
     * @param array $values
     * @return Divante_LiveEditor_Service_MapperAbstract
     */
    public static function factory(array $values)
    {
        $model = new static();

        foreach($values as $key => $value) {
            $methodName = 'set' . Zend_Filter::filterStatic($key, 'Word_UnderscoreToCamelCase');
            if(method_exists($model, $methodName)) {
                call_user_func(array($model, $methodName), $value);
            }
        }

        return $model;
    }
}