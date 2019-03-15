<?php
namespace classes;


class LadderHandler extends AbstractHandler
{
    private $forwardStep = 10;
    private $conditionNumbers = [25, 55];

    /*
     * It is a part of the chain. It handles when total sum of all turns is 25 or 55
     * @param int $rollDiceVal - roll dice value after throw
     * @return mixed - next handler or string with value when player landed on a ladder and must move forward 10 places
     */
    public function handle(int $rollDiceVal): ?string
    {
        $totalVal = self::$totalSum + $rollDiceVal;
        if (in_array($totalVal, $this->conditionNumbers)) {
            $totalVal += $this->forwardStep;
            self::$totalSum = $totalVal;
            return "ladder{$totalVal}";
        } else {
            return parent::handle($rollDiceVal);
        }
    }
}