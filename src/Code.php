<?php

declare(strict_types = 1);

namespace Dojo;

final class Code
{
    private $colors;

    public function __construct(string ...$colors)
    {
        $this->colors = $colors;
    }

    public function compare(Code $code): Answer
    {
        return new Answer(
            $this->wellPlacedColors($code),
            $this->misplacedColors($code)
        );
    }

    public function unset(int $key)
    {
        unset($this->colors[$key]);
    }

    public function toArray()
    {
        return $this->colors;
    }

    private function wellPlacedColors(Code $code): int
    {
        $numberOfWellPlacedColors = 0;
        foreach ($code->toArray() as $key => $color) {
            if ($this->colors[$key] === $color) {
                ++$numberOfWellPlacedColors;
                $code->unset($key);
            }
        }

        return $numberOfWellPlacedColors;
    }

    private function misplacedColors(Code $code): int
    {
        $misplacedColors = 0;
        foreach ($code->toArray() as $color) {
            if (in_array($color, $this->colors)) {
                ++$misplacedColors;
            }
        }

        return $misplacedColors;
    }
}
