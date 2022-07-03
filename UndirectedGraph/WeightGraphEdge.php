<?php

class WeightGraphEdge
{
    public function __construct(
        public string $from,
        public string $to,
        public int $weight,
    ) {}
}