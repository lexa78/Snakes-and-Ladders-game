<?php

namespace classes;


class RollDice implements \SplSubject
{
    const MIN_VALUE = 1;
    const MAX_VALUE = 6;
    public $value = 1;

    /**
     * @var \SplObjectStorage - subscribers list.
     */
    private $observers;

    /*
     * Constructor saves storage for subscribers
     */
    public function __construct()
    {
        $this->observers = new \SplObjectStorage;
    }

    /*
     * Add subscriber to subscribers storage
     * @param \SplObserver $observer - subscriber
     * @return void
     */
    public function attach(\SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    /*
     * Remove subscriber from subscribers storage
     * @param \SplObserver $observer - subscriber
     * @return void
     */
    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    /*
     * Notify all subscribers about state change
     * @param void
     * @return void
     */
    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /*
     * Throw roll dice and save dice value
     * @param void
     * @return void
     */
    public function roll() :void
    {
        $this->value = rand(self::MIN_VALUE, self::MAX_VALUE);
        $this->notify();
    }
}