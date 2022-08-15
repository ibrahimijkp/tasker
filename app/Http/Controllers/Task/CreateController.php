<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CreateController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function __invoke(Request $request): Factory|View|Application
    {
        $project = Project::find($request->project_id);
        return view('task.create', ['project' => $project]);
    }
}
