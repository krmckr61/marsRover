<?php

namespace Tests\Unit;

use App\Models\Plateau;
use App\Models\Rover;
use Tests\TestCase;

class RoverTest extends TestCase
{

    public function test_create_rover_passed()
    {
        $x = -27.763781;
        $y = 99.123123;
        $plateauId = Plateau::first()->id;
        $d = 'W';

        $rover = Rover::create($plateauId, $x, $y, $d);
        $this->assertEquals($x, $rover->x);
    }

    public function test_create_rover_with_invalid_params()
    {
        $plateauId = 'qwdqwd';
        $x = "dwqdwq";
        $y = "qwdqwd";
        $d = 'C';
        $this->expectErrorMessageMatches($this->getInvalidTypeOfParamMessage('int', gettype($plateauId)));
        $rover = Rover::create($plateauId, $x, $y, $d);
    }

    public function test_create_rover_with_out_of_range_params()
    {
        $plateauId = 999999999999999;
        $x = 1000;
        $y = -1000;
        $d = 'E';
        $this->assertFalse(Rover::create($plateauId, $x, $y, $d));
    }


    public function test_get_rover_passed()
    {
        $roverId = Rover::first()->id;

        $rover = Rover::getFromId($roverId);
        $this->assertEquals($roverId, $rover->id);
    }

    public function test_get_rover_with_invalid_params()
    {
        $roverId = 'qwkjdlkqw';

        $this->expectErrorMessageMatches($this->getInvalidTypeOfParamMessage('int', gettype($roverId)));
        $rover = Rover::getFromId($roverId);
    }

    public function test_get_rover_with_out_of_range_params()
    {
        $roverId = 9999999999999999999;

        $this->expectErrorMessageMatches($this->getInvalidTypeOfParamMessage('int', 'float'));
        $rover = Rover::getFromId($roverId);
    }

    public function test_send_commands_to_rover_passed() {
        $rover = Rover::create(Plateau::first()->id, 0, 0, 'N');

        $currentX = $rover->x;
        $currentY = $rover->y;
        $currentD = $rover->d;

        $rover = $rover->getFinalStateFromCommandlist('MRMLMRMLMRMLMLMMMLMMMMLL');

        $this->assertEquals(['x' => $rover->x, 'y' => $rover->y, 'd' => $rover->d], ['x' => $currentX, 'y' => $currentY, 'd' => $currentD]);
    }
}
