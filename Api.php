<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.07.2016
 */
namespace v3toys\yii2\api;

use yii\base\Component;

/**
 * Class Api
 *
 * @see http://www.v3toys.ru/index.php?nid=api
 * @package v3toys\yii2\api
 */
abstract class Api extends Component
{
    const VERSION = '0.4';

    public $url = 'http://www.v3toys.ru/pear-www/Kiwi_Shop/api.php';
}