<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2015-03-14
 * Time: 22:47
 */
abstract class Divante_LiveEditor_Service_MetadataAdapter_StatusMapperAbstract
{
    /**
     * @return mixed
     */
    abstract public function setIsEnabled($model);

    /**
     * @return mixed
     */
    abstract public function setIsDisabled($model);
}