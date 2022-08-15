<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
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
        $project = Project::find(
            $request->post('id')
        );

        //Save Project
        $project->priority = $request->post('priority');
        $project->save();

        return response()->json($project, 200);
    }
}
