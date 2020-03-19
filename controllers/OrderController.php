<?php

require_once 'models/Order.php';

class OrderController
{
    public function make()
    {
        require_once 'views/order/make.php';
    }

    public function add()
    {
        if (isset($_SESSION['identify'])) {
            $user_id = $_SESSION['identify']->id;
            $province = isset($_POST['province']) ? $_POST['province'] : false;
            $locality = isset($_POST['locality']) ? $_POST['locality'] : false;
            $address = isset($_POST['address']) ? $_POST['address'] : false;
            $stats = Util::statisticsCarrito();
            $cost = $stats['total'];

            if ($province && $locality && $address) {
                $order = new Order();

                $order->setUserId($user_id);
                $order->setProvince($province);
                $order->setLocality($locality);
                $order->setAddress($address);
                $order->setCost($cost);

                $save = $order->save();

                $save_line = $order->save_line();

                if ($save && $save_line) {
                    $_SESSION['pedido'] = 'complete';
                }else {
                    $_SESSION['pedido'] = 'failed';
                }
            }else {
                $_SESSION['pedido'] = 'failed';
            }

            header('Location: ' . base_url . 'order/confirmed');
        }else {
            header('Location: ' . base_url);
        }
    }

    public function confirmed()
    {
        if (isset($_SESSION['identify'])) {
            $identify = $_SESSION['identify'];
            $order = new Order();
            $order->setUserId($identify->id);
            $order = $order->getOrderByUser();

            $order_products = new Order();
            $products = $order_products->getProductsByOrder($order->id);
        }

        require_once 'views/order/confirmed.php';
    }

    public function myOrders()
    {
        Util::isLogged();

        $user_id = $_SESSION['identify']->id;
        $order = new Order();
        $order->setUserId($user_id);
        $orders = $order->getAllByUser();

        require_once 'views/order/myorders.php';
    }

    public function detail()
    {
        Util::isLogged();

        if (isset($_GET['id'])) {
            $order_id = $_GET['id'];
            $order = new Order();
            $order->setId($order_id);
            $order = $order->getOrder();

            $order_products = new Order();
            $products = $order_products->getProductsByOrder($order_id);

            require_once 'views/order/detail.php';
        }else {
            header('Location: ' . base_url . 'order/myorders');
        }

    }
}

?>
