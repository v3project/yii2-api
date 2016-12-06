<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.07.2016
 */
namespace v3toys\yii2\api\models;

use yii\base\Component;
use yii\httpclient\Request;
use yii\httpclient\Response;

/**
 * Описание общих полей запросов
 *
 * @property bool isError
 * @property bool isOk
 *
 * @see http://www.v3toys.ru/index.php?nid=api #1
 * @package v3toys\yii2\api\models
 */
abstract class ApiResponse extends Component
{
    /**
     * версия api, на настоящий момент 0.4
     * @var string
     */
    public $v;

    /**
     * ключ аффилиата в системе V3Project
     * @var string
     */
    public $affiliate_key;

    /**
     * вызыванный метод, список приведен далее
     * @var string
     */
    public $method;

    /**
     * данные соответствующие методу запроса
     * @var mixed
     */
    public $data;


    /**
     * Seerver response code
     * @var int
     */
    public $statusCode;

    /**
     * @var Request
     */
    public $request;

    /**
     * @var Response
     */
    public $response;

    /**
     * Ответны запрос ошибочный?
     * @return bool
     */
    abstract public function getIsError();

    /**
     * @return bool
     */
    public function getIsOk()
    {
        return !$this->isError;
    }
}