<?php

declare(strict_types = 1);

namespace Dojo;

final class Code
{
    private $colors;
    private $wellPlacedColors = [];

    public function __construct(string ...$colors)
    {
        $this->colors = $colors;
    }

    public function compare(Code $code): Answer
    {
        $code->setWellPlacedColors($this);

        return new Answer(
            count($code->wellPlacedColors),
            $code->numberOfMisplacedColors($this)
        );
    }

    private function setWellPlacedColors(Code $code)
    {
        foreach ($code->colors as $key => $color) {
            if ($this->colors[$key] === $color) {
                $this->wellPlacedColors[] = $color;
            }
        }
    }

    private function numberOfMisplacedColors(Code $code): int
    {
        return count(array_filter($code->colors, function (string $color) {
            return in_array($color, $this->colors) && !in_array($color, $this->wellPlacedColors);
        }));
    }
}
