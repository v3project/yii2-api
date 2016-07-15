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
 * 1.3 Описание общих полей ответов, код 400
 *
 * @see http://www.v3toys.ru/index.php?nid=api
 * @package v3toys\yii2\api
 */
class ApiResponseError extends ApiResponse
{
    /**
     * код ошибки
     * @var string
     */
    public $error_code;

    /**
     * описание ошибки
     * @var string
     */
    public $error_message;

    /**
     * данные дающие дополнительную информацию об ошибке
     * @var string
     */
    public $error_data;

    /**
     * @return bool
     */
    public function getIsError()
    {
        return true;
    }
}