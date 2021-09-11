<?php

namespace App\Http\Controllers\v1;

use App\Http\Requests\Rover\CreateRequest;
use App\Http\Requests\Rover\SendCommandRequest;
use App\Models\Plateau;
use App\Models\Rover;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class RoverController extends Controller
{

    public function create(CreateRequest $request): Response
    {
        $plateauId = $request->input('plateau_id');
        if(Plateau::getFromId($plateauId)) {
            return $this->roverResponse(Rover::create($plateauId, $request->input('x'), $request->input('y'), $request->input('d')), 201);
        } else {
            return $this->notFoundResponse();
        }
    }

    public function store()
    {
        $rovers = Rover::get();
        if(count($rovers) > 0) {
            return $rovers;
        } else {
            return $this->noContentResponse();
        }
    }

    public function getFromId($roverId): Response
    {
        if($rover = Rover::getFromId($roverId)) {
            return $this->roverResponse($rover);
        } else {
            return $this->notFoundResponse();
        }
    }

    public function sendCommands(SendCommandRequest $request): Response
    {
        $response = [];
        $rovers = Rover::get();
        if(count($rovers) > 0) {
            foreach ($rovers as $rover) {
                $response[] = $rover->getFinalStateFromCommandlist($request->input('commands'));
            }

            return new Response($response);

        } else {
            return $this->noContentResponse();
        }
    }

    private function notFoundResponse() {
        return new Response([
            'message' => 'Rover not found.'
        ], 404);
    }

    private function roverResponse(Rover $rover, int $status = 200) {
        return new Response($rover, $status);
    }

}
