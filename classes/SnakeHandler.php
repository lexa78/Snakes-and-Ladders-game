<?php

namespace classes;


class SnakeHandler extends AbstractHandler
{
    private $backStep = 3;
    private $conditionNumber = 9;

    /*
     * It is a part of the chain. It handles when total sum of all turns divides by 9 (9, 18, 27, 36…)
     * @param int $rollDiceVal - roll dice value after throw
     * @return mixed - next handler or string with value when player landed on a snake and must move back 3 places
     */
    public function handle(int $rollDiceVal): ?string
    {
        $totalVal = self::$totalSum + $rollDiceVal;
        if ($totalVal % $this->conditionNumber == 0) {
            $totalVal -= $this->backStep;
            self::$totalSum = $totalVal;
            return "snake{$totalVal}";
        } else {
            return parent::handle($rollDiceVal);
        }
    }
}