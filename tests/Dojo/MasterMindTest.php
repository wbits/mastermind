<?php

declare(strict_types = 1);

namespace Dojo;

use PHPUnit\Framework\TestCase;

final class MasterMindTest extends TestCase
{
    public function testItGetsStartedWithASecret()
    {
        self::assertInstanceOf(MasterMind::class, MasterMind::startGameWithSecret('blue', 'white', 'yellow', 'black'));
    }

    public function testItReturnsTheNumberOfWellPlacedColorsAndTheNumberOfMisplacedColors()
    {
        $game = MasterMind::startGameWithSecret('blue');

        self::assertEquals(['b' => 0, 'w' => 0], $game->guess('red'));
    }

    public function testItDetectsAWellolacedColor()
    {
        $game = MasterMind::startGameWithSecret('blue');

        self::assertEquals(['b' => 1, 'w' => 0], $game->guess('blue'));
    }

    public function testItDetectsMisplacedColors()
    {
        $game = MasterMind::startGameWithSecret('blue', 'red');

        self::assertEquals(['b' => 0, 'w' => 1], $game->guess('red', 'black'));
    }

    public function testItCanDetectBothWellPlacedAndMisplacedColors()
    {
        $game = MasterMind::startGameWithSecret('blue', 'red', 'green', 'black');

        self::assertEquals(['b' => 1, 'w' => 1], $game->guess('blue', 'black', 'white', 'yellow'));
    }
}

