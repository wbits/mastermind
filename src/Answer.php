<?php

declare(strict_types = 1);

namespace Dojo;

final class Answer
{
    private $wellPlaced;
    private $misplaced;

    public function __construct(int $wellPlaced, int $misplaced)
    {
        $this->wellPlaced = $wellPlaced;
        $this->misplaced = $misplaced;
    }

    public function toArray(): array
    {
        return [
            'b' => $this->wellPlaced,
            'w' => $this->misplaced,
        ];
    }
}
