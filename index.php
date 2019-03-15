<?php
function autoloader($class) {
    try {
        require_once __DIR__ . '\\' . $class . '.php';
    }
    Catch(Exception $e) {
        echo $e->getMessage();
    }
}
spl_autoload_register('autoloader');

$rollDice = new \classes\RollDice();
$game = new \classes\Game(100);
$rollDice->attach($game);

while (true) {
    $rollDice->roll();
    sleep(1);
}