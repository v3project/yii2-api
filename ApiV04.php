<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.07.2016
 */
namespace v3toys\yii2\api;
/**
 * Class ApiV04
 *
 * @package v3toys\yii2\api
 */
class ApiV04 extends ApiBase
{
    const VERSION = '0.4';

    /**
     * 3.1.5 Метод getStatus - возвращает все возможные статусы заказов в V3Project
     *
     * @return models\ApiResponseError|models\ApiResponseOk
     * "data": [
            {
                "id": 1,
                "title": "Принят"
            },
            {
                "id": 2,
                "title": "Отмена"
            }
        ]
     */
    public function getStatus()
    {
        return $this->send('getStatus');
    }

    /**
     * 3.1.3 Метод getProductsDataByIds - получение данных о товаре по коду
     *
     * @param array $request
     * @return models\ApiResponseError|models\ApiResponseOk
     *
     * "data": [
            {
                "id": 109420,
                "deleted": 0,
                "quantity": 1,              //количеcтво
                "buy_price": 500,           //закупочная цена
                "base_price": 530,          //базовая цена
                "mr_price": 553,            //минимальная розничная рцена
                "price": 553,               //ориентировочная цена продажи
                "title": "Игровой набор..",
                "sku": "A8532/A8232",
                "barcode": "5010994804367",
                "brand": "Hasbro"
            }
        ]
     */
    public function getProductsDataByIds($request = [])
    {
        return $this->send('getProductsDataByIds', array_merge([
            'full'              => 1,       //признак получения полной информации (title, sky, barcode)
            'products_ids'      => 'all',   //Возможные значения: all: все товары >код: товары с кодом больше заданного код,код: товары заданных кодов код: товар заданного кода
            'limit'             => 100,     //количество получаемых товаров (по умолчанию 10000)
            'offset'            => 0,       //смещение при выборке товаров (по умолчанию 0)
            //'in_stock'        => 0,       //признак получения товаров в наличие:
            //'is_deleted'      => 0,       //признак получения удаленных товаров
        ], $request));
    }
}