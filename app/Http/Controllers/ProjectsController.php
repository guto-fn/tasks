<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectsRequest;
use App\Models\Project;
use App\Models\User;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ProjectsController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('dashboard', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectsRequest $request)
    {
        try {
            $data = $request->validated();

            $project = new Project($data);
            $project->save();

            return redirect()->route('dashboard')->with('success', 'Projeto registrado com sucesso');
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'sucess' => false,
                'exception' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectsRequest $request, string $id)
    {
        try {
            $data = $request->validated();

            $project = Project::findOrFail($id);

            $project->update($data);

            return redirect()->route('dashboard')->with('success', 'Projeto atualizado com sucesso');
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'sucess' => false,
                'exception' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $project = Project::findOrFail($id);

            $project->delete();

            return redirect()->route('dashboard')->with('success', 'Projeto deletado com sucesso');
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'sucess' => false,
                'exception' => $e->getMessage()
            ], 500);
        }
    }
}
