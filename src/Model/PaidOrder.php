<?php

namespace MadePeople\Model;


class PaidOrder
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $orderId;

    /**
     * @var int
     */
    private $totalPaid;

    /**
     * @var int
     */
    private $decimalFactor;

    /**
     * PaidOrder constructor.
     * @param int $orderId
     * @param float $totalPaid
     * @param int $decimalFactor
     */
    public function __construct($orderId, $totalPaid, $decimalFactor)
    {
        $this->orderId = $orderId;
        $this->decimalFactor = $decimalFactor;
        $this->totalPaid = $totalPaid * $this->decimalFactor;

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     */
    public function setOrderId(int $orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return int
     */
    public function getTotalPaid(): int
    {
        return $this->totalPaid;
    }

    /**
     * @param int $totalPaid
     */
    public function setTotalPaid(int $totalPaid)
    {
        $this->totalPaid = $totalPaid;
    }

    /**
     * @return int
     */
    public function getDecimalFactor(): int
    {
        return $this->decimalFactor;
    }

    /**
     * @param int $decimalFactor
     */
    public function setDecimalFactor(int $decimalFactor)
    {
        $this->decimalFactor = $decimalFactor;
    }

}