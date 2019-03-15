<?php

namespace classes;


class MoreThanHundredHandler extends AbstractHandler
{
    /*
     * It is a part of the chain. It handles when total sum of all turns is more than 100
     * @param int $rollDiceVal - roll dice value after throw
     * @return mixed - next handler or string with value when total sum of all rolls is more than 100
     */
    public function handle(int $rollDiceVal): ?string
    {
        $totalVal = self::$totalSum + $rollDiceVal;
        if ($totalVal > $this->hundred) {
            return self::$totalSum;
        } else {
            return parent::handle($rollDiceVal);
        }
    }
}