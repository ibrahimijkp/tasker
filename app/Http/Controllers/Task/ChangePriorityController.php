<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChangePriorityController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        //Get the project
        $project = Task::find(
            $request->post('id')
        );

        //Save Project
        $project->priority = $request->post('priority');
        $project->save();

        return response()->json($project, 200);
    }
}
