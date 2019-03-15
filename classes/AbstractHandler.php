<?php

namespace classes;


abstract class AbstractHandler implements Handler
{
    /**
     * It contains the next handler in the chain
     * @var Handler
     */
    protected $nextHandler;

    protected static $totalSum = 1;

    protected $hundred = 100;

    /*
     * Constructor saves next handler
     * @param mixed $handler - next handler
     */
    public function __construct(AbstractHandler $handler=null)
    {
        $this->nextHandler = $handler;
    }

    /*
     * It is a part in the chain
     * @param int $rollDiceVal - roll dice value after throw
     * @return mixed - next handler or null if next handler is absent
     */
    public function handle(int $rollDiceVal): ?string
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($rollDiceVal);
        }

        return null;
    }
}