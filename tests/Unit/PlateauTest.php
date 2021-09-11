<?php

namespace Tests\Unit;

use App\Models\Plateau;
use Tests\TestCase;

class PlateauTest extends TestCase
{

    public function test_create_plateau_passed()
    {
        $x = 100;
        $y = 99.123123;
        $plateau = Plateau::create($x, $y);
        $this->assertEquals($x, $plateau->x);
    }

    public function test_create_plateau_with_invalid_params()
    {
        $x = "dwqdwq";
        $y = "qwdqwd";
        $this->expectErrorMessageMatches($this->getInvalidTypeOfParamMessage('float', gettype($x)));
        $plateau = Plateau::create($x, $y);
    }

    public function test_create_plateau_with_out_of_range_params()
    {
        $x = 1000;
        $y = -1000;
        $this->assertFalse(Plateau::create($x, $y));
    }

    public function test_get_plateau_passed()
    {
        $plateauId = Plateau::first()->id;

        $plateau = Plateau::getFromId($plateauId);
        $this->assertEquals($plateauId, $plateau->id);
    }

    public function test_get_plateau_with_invalid_params()
    {
        $plateauId = 'qwkjdlkqw';

        $this->expectErrorMessageMatches($this->getInvalidTypeOfParamMessage('int', gettype($plateauId)));
        $plateau = Plateau::getFromId($plateauId);
    }

    public function test_get_plateau_with_out_of_range_params()
    {
        $plateauId = 9999999999999999999;

        $this->expectErrorMessageMatches($this->getInvalidTypeOfParamMessage('int', 'float'));
        $plateau = Plateau::getFromId($plateauId);
    }

}
