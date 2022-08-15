<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function __invoke(Request $request): Factory|View|Application
    {
        $project = Project::find($request->id);
        return view('task.list', ['project' => $project]);
    }
}
