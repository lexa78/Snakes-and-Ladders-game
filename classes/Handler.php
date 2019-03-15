<?php

namespace classes;

/**
 * Interface defines method for handle information
 */
interface Handler
{
    public function handle(int $totalVal): ?string;
}