<?php declare(strict_types = 1);

namespace Source\Model\Operation;

use Source\Model\Money\MoneyInterface;

class Operation implements OperationInterface
{
    /**
     * @var \DateTime
     */
    protected $date;
    
    /**
     * @var string
     */
    protected $type;
    
    /**
     * @var MoneyInterface
     */
    protected $amount;
    
    /**
     * Get operation's date.
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->date->format(self::DATE_FORMAT);
    }
    
    /**
     * Set operation's date.
     *
     * @param string $date
     *
     * @return \Source\Model\Operation\OperationInterface
     */
    public function setDate(string $date): OperationInterface
    {
        $this->date = \DateTime::createFromFormat(self::DATE_FORMAT, $date);
        
        return $this;
    }
    
    /**
     * Set operation's type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    
    /**
     * Get operation's type.
     *
     * @param string $type
     *
     * @return \Source\Model\Operation\OperationInterface
     */
    public function setType(string $type): OperationInterface
    {
        $this->type = $type;
        
        return $this;
    }
    
    /**
     * Get operation's currency.
     *
     * @return \Source\Model\Money\MoneyInterface
     */
    public function getMoney(): MoneyInterface
    {
        return $this->amount;
    }
    
    /**
     * Set operation's currency
     *
     * @param \Source\Model\Money\MoneyInterface $money
     *
     * @return \Source\Model\Operation\OperationInterface
     */
    public function setMoney(MoneyInterface $money): OperationInterface
    {
        $this->amount = $money;
        
        return $this;
    }
    
    /**
     * Returns the number of the week in year of the operation (set by setDate).
     *
     * @return int
     */
    public function getWeekNumber(): int
    {
        return (int)$this->date->format('W');
    }
}