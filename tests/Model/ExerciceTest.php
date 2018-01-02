<?php
namespace MadePeople\Tests\Model;

use MadePeople\Model\Customer;
use MadePeople\Model\Item;
use MadePeople\Model\Order;
use MadePeople\Model\PaidOrder;
use PDO;
use PDOException;
use PHPUnit\Framework\TestCase;

class ExerciceTest extends TestCase
{
    /**
     * @var Order
     */
    protected $order;

    /**
     * @var PDO
     */
    protected $pdo;
    protected function setUp()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=madepeople','root', '');
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        $selectOrder=$this->pdo->prepare("select * from orders where id=1");
        $selectOrder->execute();
        $selectCustomer=$this->pdo->prepare("select * from customers where id=1");
        $selectCustomer->execute();
        $this->order=$selectOrder->fetchObject(Order::class);
        $customer=$selectCustomer->fetchObject(Customer::class);
        $this->order->setCustomer($customer);
        $selectItems=$this->pdo->prepare("select * from items where orderId=1");
        $selectItems->execute();
        $items=$selectItems->fetchObject(Item::class);
        $this->order->setItems($items);
    }
    public function testCreatePaidOrder()
    {

        $this->assertEquals('paid',$this->order->getState());
        $decimalFactor = 100;
        $paidOrder = new PaidOrder(1, floatval($this->order->getTotalSum()), $decimalFactor);
        $this->assertEquals(200000, $paidOrder->getTotalPaid());
        $query = "INSERT INTO `paidorders` (`id`, `order_id`, `totalPaid`, `decimalFactor`) VALUES (NULL, ?, ?, ?)";
        $savePaidOrder = $this->pdo->prepare($query);
        $savePaidOrder->execute(array($paidOrder->getOrderId(),$paidOrder->getTotalPaid(),$paidOrder->getDecimalFactor()));
        $this->assertNotEquals(1, $paidOrder->getTotalPaid());
    }
}
