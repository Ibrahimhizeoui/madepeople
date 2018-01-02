<?php
namespace MadePeopl\App;
use MadePeople\Model\Order;
use MadePeople\Model\Customer;
use MadePeople\Model\Item;

use MadePeople\Model\PaidOrder;
use PDO;
include '..\Model\Customer.php';
include '..\Model\Order.php';
include '..\Model\Item.php';
include '..\Model\PaidOrder.php';

        try
        {
            $pdo = new PDO('mysql:host=localhost;dbname=madepeople','root', '');
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }

        $selectConfig = $pdo->prepare("select * from config where id=1");
        $selectConfig->execute();

       $currentDecimalFactor = $selectConfig->fetchColumn(1);
       $currentEnableFuncs = $selectConfig->fetchColumn(2);

        $selectOrder=$pdo->prepare("select * from orders");
        $selectOrder->execute();
        $selectCustomer=$pdo->prepare("select * from customers");
        $selectCustomer->execute();
        $selectItems=$pdo->prepare("select * from items");
        $selectItems->execute();

        $orders=$selectOrder->fetchAll(PDO::FETCH_CLASS,"MadePeople\Model\Order");
        $customers=$selectCustomer->fetchAll(PDO::FETCH_CLASS,"MadePeople\Model\Customer");
        $items=$selectItems->fetchAll(PDO::FETCH_CLASS,"MadePeople\Model\Item");

        foreach ($orders as $order){
            foreach ($customers as $customer) {
                if ($order->customerId == $customer->getId()){
                    $order->setCustomer($customer);
                }
            }
            $arrayItems = [];
            foreach ($items as $item) {


                if ($order->getId() == $item->getOrderId()){
                    array_push($arrayItems,$item);
                }

                $order->setItems($arrayItems);
            }
        }

        if (isset($_GET['save-decimal-factor'])&& isset($_GET['decimal-factor'])){
            if ($_GET['decimal-factor']!= null){
                $inserDecimalFactor = $pdo->prepare("UPDATE `config` SET `decimal-factor` = ? WHERE `config`.`id` = 1");
                $inserDecimalFactor->execute([$_GET['decimal-factor']]);
            }
        }

        if (isset($_GET['order_id'])){
           foreach ($orders as $orders){
               if ($order->getId() == $_GET['order_id']){
                   $fetchedOrder = $order;
               }
           }
        }

        if (isset($_POST['save-me'])){
            $paidOrder = new PaidOrder(intval($_GET['order_id']), floatval($fetchedOrder->getTotalSum()), $currentDecimalFactor);
            $query = "INSERT INTO `paidorders` (`id`, `order_id`, `totalPaid`, `decimalFactor`) VALUES (NULL, ?, ?, ?)";
            $savePaidOrder = $pdo->prepare($query);
            $savePaidOrder->execute(array($paidOrder->getOrderId(),$paidOrder->getTotalPaid(),$paidOrder->getDecimalFactor()));


        }

  ?>