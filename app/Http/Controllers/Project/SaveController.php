<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SaveController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        //Check last priority
        $priority = 1;
        $last_record = Project::orderBy('id', 'DESC')->first();
        if ($last_record !== null) {
            $priority = $last_record->priority + 1;
        }

        //Check if project already exists
        $project = new Project;
        if ($request->post('id')) {
            $project = $project->find(
                $request->post('id')
            );
            //Set priority if it's Edit mode
            $priority = $project->priority;
        }

        //Save Project
        $project->name = $request->post('name');
        $project->priority = $priority;
        $project->save();

        //Set flash message and redirect
        session()->flash('message', 'Project saved successfully.');
        $redirectTo = route('projects.list');

        return redirect()->to($redirectTo);
    }
}
