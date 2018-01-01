<?php

declare(strict_types = 1);

namespace Dojo;

final class MasterMind
{
    private $secret;

    private function __construct(Code $secret)
    {
        $this->secret = $secret;
    }

    public static function startGameWithSecret(string ...$colors): MasterMind
    {
        return new self(new Code(...$colors));
    }

    public function guess(string ...$colors): Answer
    {
        return $this->secret->compare(new Code(...$colors));
    }
}
