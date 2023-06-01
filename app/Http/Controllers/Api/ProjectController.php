<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function home()
    {
        $projects = Project::with('type', 'technologies')->where('is_important', true)->get();
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }


    public function index()
    {

        $projects = Project::with('type', 'technologies')->get();

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }



    public function show($slug)
    {
        $projects = Project::where('slug', $slug)->first();

        if ($projects) {
            return response()->json([
                'success' => true,
                'results' => $projects
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Spiacenti, Nessun Progetto Trovato'
            ]);
        }
    }
}
