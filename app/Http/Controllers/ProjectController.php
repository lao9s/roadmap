<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function show($id)
    {
        $projects = Project::select('id', 'slug', 'title')->visibleForCurrentUser()->get();

        $project = Project::query()->visibleForCurrentUser()->where('slug', $id)->firstOrFail();

        return view('project', [
            'projects' => $projects,
            'project' => $project,
            'boards' => $project->boards()
                ->visible()
                ->with(['items' => function ($query) {
                    return $query
                        ->orderBy('pinned', 'desc')
                        ->visibleForCurrentUser()
                        ->popular() // TODO: This needs to be fixed to respect the sorting setting from the board itself (sort_items_by)
                        ->withCount('votes');
                }])
                ->get(),
        ]);
    }
}
