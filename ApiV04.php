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
     *
     *  Метод getOrderStatus - возвращает статус заказа *** должен быть один из двух параметров (order_id или v3p_oid)
     *
     * "data": {
            "status_id": 599,
            "status": "Принят",
        }
     *
     * @param $v3toysOrderId
     * @return models\ApiResponseError|models\ApiResponseOk
     */
    public function getOrderStatusByV3toysId($v3toysOrderId)
    {
        return $this->send('getOrderStatus', [
            'v3p_oid' => $v3toysOrderId
        ]);
    }

    /**
     *  Метод getOrderStatus - возвращает статус заказа *** должен быть один из двух параметров (order_id или v3p_oid)
     *
     * "data": {
            "status_id": 599,
            "status": "Принят",
        }
     *
     *
     * @param $orderId
     * @return models\ApiResponseError|models\ApiResponseOk
     */
    public function getOrderStatusById($orderId)
    {
        return $this->send('getOrderStatus', [
            'order_id' => $orderId
        ]);
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

    /**
     * {
            "order_id": "3423",
            "fake": 1,
            "created_at": "2014-02-03 15:34:23",
            "full_name": "Игорь",
            "phone": "79261234567",
            "email": "test@example.com",
            "products": [
                {
                    "product_id": 2352,
                    "price": 2246,
                    "quantity": 1
                },
                {
                    "product_id": 54352,
                    "price": 46,
                    "quantity": 2
                },
            ],
            "shipping_method": "PICKUP",
            "shipping_cost": 50,
            "shipping_data": {
                "city": "Орел",
                "point_id": 1
            },
            "comment": "Тестовый комментарий"
        }
     *
     * @param array $request
     *
     * @return models\ApiResponseError|models\ApiResponseOk
     */
    public function createOrder($request = [])
    {
        return $this->send('createOrder', $request);
        /*return $this->send('createOrder', array_merge([
            /*'full_name'             => "",
            'phone'             => "",
            'email'             => "",
            'products'             => [
                [
                    'product_id' => '',
                    'price' => '',
                    'quantity' => '',
                    'is_deleted' => '',
                ]
            ],  //имя клиента
            'shipping_method' => '',
            'shipping_cost' => '',
            'shipping_data' => [
                'city' => '',
                'address' => '',
            ],
        ], $request));*/
    }


    /**
     *
     * 3.2.1 Метод createMessage - создает заявку и возвращает ее номер
        ***Параметры этого метода полностью совпадают с данными ответа метода
     *
     * {
        "v": "0.4",
        "method": "getMessageDataById",
        "data": {
            "message_id": "3423",
            "fake": 1,
            "created_at": "2014-02-03 15:34:23",
            "full_name": "Игорь",
            "phone": "79261234567",
            "email": "",
            "products": [
                {
                    "product_id": 2352,
                    "price": 2246,
                    "quantity": 1
                },
            ],
            "comment": "Тестовый комментарий"
        }
    }
     *
     * @param array $request
     *
     * @return models\ApiResponseError|models\ApiResponseOk
     */
    public function createMessage($request = [])
    {
        return $this->send('createMessage', $request);
        /*return $this->send('createOrder', array_merge([
            /*'full_name'             => "",
            'phone'             => "",
            'email'             => "",
            'products'             => [
                [
                    'product_id' => '',
                    'price' => '',
                    'quantity' => '',
                    'is_deleted' => '',
                ]
            ],  //имя клиента
            'shipping_method' => '',
            'shipping_cost' => '',
            'shipping_data' => [
                'city' => '',
                'address' => '',
            ],
        ], $request));*/
    }


    /**
     * 3.2.2 Метод getMessageStatus - возвращает статус заявки
     * @param $messageId
     *
     * @return models\ApiResponseError|models\ApiResponseOk
     */
    public function getMessageStatus($messageId)
    {
        return $this->send('getMessageStatus', [
            'message_id' => $messageId
        ]);
    }
}