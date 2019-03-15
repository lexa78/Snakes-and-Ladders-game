<?php

namespace classes;


use classes\ExactHundredHandler;
use classes\LadderHandler;
use classes\MoreThanHundredHandler;
use classes\SnakeHandler;

class Game implements \SplObserver
{
    private $handlers;
    private $stopCondition;

    /*
     * Constructor prepare the game
     */
    public function __construct(int $stopCondition)
    {
        $this->stopCondition = $stopCondition;
        $this->handlers = new SnakeHandler(new LadderHandler(
            new ExactHundredHandler(
                new MoreThanHundredHandler(new NormalHandler()))));
    }

    /*
     * Specific subscriber respond to updates released by the RollDice.
     * Write calculated data into console
     * @param \SplSubject $subject - RollDice object after it change
     * @return void
     */
    public function update(\SplSubject $subject): void
    {
        $rollDiceVal = $subject->value;
        $total = $this->handlers->handle($rollDiceVal);
        echo '   ', $rollDiceVal, ' - ', $total . PHP_EOL;
        $this->checkStopCondition(intval($total));
    }

    /*
     * Check if stop condition is met
     * @param int $checkForStopNumber - total sum of all turns
     * @return void
     */
    private function checkStopCondition(int $checkForStopNumber): void
    {
        if ($checkForStopNumber == $this->stopCondition) {
            exit();
        }
    }
}