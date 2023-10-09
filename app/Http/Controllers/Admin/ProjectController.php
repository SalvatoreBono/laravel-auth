<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //recuperare tutti i project dal database 
        $projects = Project::all();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //porta a una view che  per la creazione di un nuovo project
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //i dati inviati vengono validati
        $data = $request->validate([
            "title" => "required|string",
            "description" => "required|string",
            "thumbnail" => "required|string",
            "link" => "required|string",
            "date" => "required|date",
            "language" => "required|string",
        ]);
        // language viene trasformato in un array
        $data["language"] = explode(",", $data["language"]);

        // $project = new Post();
        // $project->fill($data);
        // $project->save()

        // Il ::create esegue il fill e il save in un unico comando
        $project = Project::create($data);

        //l'utente viene reindirizzato a un'altra pagina
        return redirect()->route("admin.projects.show", $project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //una query dove l'ID corrispondente a $id
        $project = Project::findOrFail($id);

        //porta a una view dove si visualizzano i dettagli del singolo project.
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // è utilizzato per recuperare i dettagli di un singolo project specifico ed editarlo
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        //porta a una view per la modifica di un project
        return view("admin.projects.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        //i dati modificati vengono validati
        $data = $request->validate([
            "title" => "required|string",
            "description" => "required|string",
            "thumbnail" => "required|string",
            "link" => "required|string",
            "date" => "required|date",
            "language" => "required|string",
        ]);

        // language viene trasformato in un array
        $data["language"] = explode(",", $data["language"]);

        // update fa un fill() + save()
        $project->update($data);

        //l'utente viene reindirizzato a un'altra pagina
        return redirect()->route("admin.projects.show", compact("project"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        //Il metodo delete() elimina il singolo project associato
        $project->delete();

        //l'utente viene reindirizzato a un'altra pagina
        return redirect()->route("admin.projects.index");
    }
}
