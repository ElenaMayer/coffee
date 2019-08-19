<?php

namespace frontend\controllers;

use common\models\Order;
use common\models\OrderItem;
use common\models\Product;
use yz\shoppingcart\ShoppingCart;

class CartController extends \yii\web\Controller
{

    public function actionAdd($id, $quantity = 1)
    {
        $product = Product::findOne($id);
        if ($product) {
            $cart = \Yii::$app->cart;
            $cart->put($product, $quantity);
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'count' => $cart->getCount(),
            ];
        }
    }

    public function actionCart()
    {
        /* @var $cart ShoppingCart */
        $cart = \Yii::$app->cart;

        $products = $cart->getPositions();
        $total = $cart->getCost();

        return $this->render('list', [
           'products' => $products,
           'total' => $total,
        ]);
    }

    public function actionRemove($id)
    {
        \Yii::$app->cart->removeById($id);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $cart = \Yii::$app->cart;
        return [
            'cartCount' => $cart->getCount(),
            'cartTotal' => $cart->getCost(),
        ];

    }

    public function actionUpdate($id, $quantity)
    {
        $product = Product::findOne($id);
        if ($product) {
            \Yii::$app->cart->update($product, $quantity);
            $this->redirect(['cart']);
        }
    }

    public function actionUpdate_cart_qty()
    {
        $get = $_GET;
        if($get && isset($get['id']) && isset($get['type'])) {
            $cart = \Yii::$app->cart;
//                if($product->getItemCount($position->diversity_id) > $get['quantity']){
//                    $count = $get['quantity'];
//                } else {
//                    $count = $product->getItemCount($position->diversity_id);
//                }
            $position = $cart->getPositionById($get['id']);
            if ($position) {
                $quantity = $position->getQuantity();

                if($get['type'] == 'plus'){
                    $quantity++;
                } else {
                    $quantity--;
                }
                $cart->update($position, $quantity);
            }
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            return [
                'id' => $get['id'],
                'count' => $quantity,
                'productTotal' => $position->getCost(),
                'cartTotal' => $cart->getCost(),
                'cartCount' => $cart->getCount(),
            ];
        } else {
            return false;
        }

    }

    public function actionOrder()
    {
        $order = new Order();

        /* @var $cart ShoppingCart */
        $cart = \Yii::$app->cart;

        /* @var $products Product[] */
        $products = $cart->getPositions();
        $total = $cart->getCost();

        if ($order->load(\Yii::$app->request->post()) && $order->validate()) {
            $transaction = $order->getDb()->beginTransaction();
            $order->save(false);

            foreach($products as $product) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->title = $product->title;
                $orderItem->price = $product->getPrice();
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $product->getQuantity();
                if (!$orderItem->save(false)) {
                    $transaction->rollBack();
                    \Yii::$app->session->addFlash('error', 'Невозможно создать заказ. Пожалуйста свяжитесь с нами.');
                    return $this->redirect('/catalog/coffee');
                }
            }

            $transaction->commit();
            \Yii::$app->cart->removeAll();

            \Yii::$app->session->addFlash('success', 'Спасибо за заказ. Мы свяжемся с Вами в ближайшее время.');
            $order->sendEmail();

            return $this->redirect('/catalog/coffee');
        }

        return $this->render('order', [
            'order' => $order,
            'products' => $products,
            'total' => $total,
        ]);
    }
}
