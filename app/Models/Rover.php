<?php

namespace App\Models;

use App\Casts\CoordinateCast;
use Illuminate\Database\Eloquent\Model;

class Rover extends Model
{
    protected $table = 'rover';

    protected $primaryKey = 'id';

    protected $casts = [
        'x' => CoordinateCast::class,
        'y' => CoordinateCast::class
    ];

    public static function create(int $plateauId, float $x, float $y, string $d)
    {
        $rover = new self();
        $rover->plateau_id = $plateauId;
        $rover->x = $x;
        $rover->y = $y;
        $rover->d = $d;
        try {
            $rover->save();
        } catch (\Exception $exception) {
            return false;
        }
        return $rover;
    }

    public static function getFromId(int $roverId)
    {
        return self::find($roverId);
    }

    public function getFinalStateFromCommandlist(string $commandList)
    {
        $commands = str_split($commandList);
        foreach ($commands as $command) {
            if ($command === 'L' || $command === 'R') {
                $this->setDirection($command);
            } else if($command === 'M') {
                $this->moveForward();
            }
        }

        $this->save();
        return $this;
    }

    private function setDirection(string $directionCommand)
    {
        $directions = [
            0 => 'W',
            1 => 'N',
            2 => 'E',
            3 => 'S'
        ];

        $movement = $directionCommand === 'R' ? 1 : -1;

        $currentDirectionKey = array_search($this->d, $directions);

        $newDirectionKey = ($currentDirectionKey + $movement);
        if($newDirectionKey < 0) {
            $newDirectionKey = count($directions) - 1;
        }

        $this->d = $directions[$newDirectionKey % count($directions)];
    }

    private function moveForward()
    {
        switch ($this->d) {
            case 'W':
                $this->x = $this->x - 1;
                break;
            case 'N':
                $this->y = $this->y + 1;
                break;
            case 'E':
                $this->x = $this->x + 1;
                break;
            case 'S':
                $this->y = $this->y - 1;
                break;
        }
    }

}
