<?php
namespace App\Models;

use App\Casts\CoordinateCast;
use Illuminate\Database\Eloquent\Model;

class Plateau extends Model
{
    protected $table = 'plateaus';

    protected $primaryKey = 'id';

    protected $casts = [
        'x' => CoordinateCast::class,
        'y' => CoordinateCast::class
    ];

    public static function create(float $x, float $y)
    {
        $plateau = new self();
        $plateau->x = $x;
        $plateau->y = $y;
        try {
            $plateau->save();
        } catch (\Exception $exception) {
            return false;
        }
        return $plateau;
    }

    public static function getFromId(int $plateauId)
    {
        return self::find($plateauId);
    }

}
