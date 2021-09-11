<?php

namespace App\Http\Controllers\v1;

use App\Http\Requests\Plateau\CreateRequest;
use App\Models\Plateau;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class PlateauController extends Controller
{

    public function create(CreateRequest $request): Response
    {
        if($plateau = Plateau::create($request->input('x'), $request->input('y'))) {
            return $this->plateauResponse($plateau, 201);
        } else {
            return $this->noContentResponse();
        }
    }

    public function store()
    {
        $plateaus = Plateau::get();
        if(count($plateaus) > 0) {
            return $plateaus;
        } else {
            return $this->noContentResponse();
        }
    }

    public function getFromId($plateauId): Response
    {
        if($plateau = Plateau::getFromId($plateauId)) {
            return $this->plateauResponse($plateau);
        } else {
            return new Response([
                'message' => 'Plateau not found.'
            ], 404);
        }
    }

    private function plateauResponse(Plateau $plateau, int $status = 200) {
        return new Response($plateau, $status);
    }

}
