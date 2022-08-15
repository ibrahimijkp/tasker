<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DeleteController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $project = Project::find(
            $request->id
        );

        //Delete Project
        $project->delete();

        //Set flash message and redirect
        session()->flash('message', 'Project deleted successfully.');
        $redirectTo = route('projects.list');

        return redirect()->to($redirectTo);
    }
}
