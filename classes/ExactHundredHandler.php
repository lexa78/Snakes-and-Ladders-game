<?php
namespace classes;


class ExactHundredHandler extends AbstractHandler
{
    /*
     * It is a part of the chain. It handles when total sum of all turns is equal 100
     * @param int $rollDiceVal - roll dice value after throw
     * @return mixed - next handler or string with value when total sum of all rolls is equal 100
     */
    public function handle(int $rollDiceVal): ?string
    {
        $totalVal = self::$totalSum + $rollDiceVal;
        if ($totalVal == $this->hundred) {
            self::$totalSum = $totalVal;
            return $totalVal;
        } else {
            return parent::handle($rollDiceVal);
        }
    }
}