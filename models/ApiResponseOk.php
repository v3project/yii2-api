<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.07.2016
 */
namespace v3toys\yii2\api\models;

use yii\base\Component;

/**
 * 1.2 Описание общих полей ответов, код 200
 *
 * @see http://www.v3toys.ru/index.php?nid=api
 * @package v3toys\yii2\api
 */
class ApiResponseOk extends ApiResponse
{
    /**
     * @return bool
     */
    public function getIsError()
    {
        return false;
    }
}