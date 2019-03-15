<?php
namespace classes;


class NormalHandler extends AbstractHandler
{
    /*
     * It is a last part of the chain. It handles when all previous conditions not met
     * @param int $rollDiceVal - roll dice value after throw
     * @return mixed - string with value of total sum
     */
    public function handle(int $rollDiceVal): ?string
    {
        self::$totalSum += $rollDiceVal;
        return self::$totalSum;
    }
}