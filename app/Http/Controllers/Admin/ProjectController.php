<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectUpsertRequest;
use App\Models\Project;
use Illuminate\Support\Str;

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
        //porta a una view per la creazione di un nuovo project
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectUpsertRequest $request)
    {
        //i dati inviati vengono validati tramite il from request
        $data = $request->validated();


        $data["slug"] = $this->generateSlug($data["title"]);

        // language viene trasformato in un array
        $data["language"] = explode(",", $data["language"]);

        // $project = new Post();
        // $project->fill($data);
        // $project->save()

        // Il ::create esegue il fill e il save in un unico comando
        $project = Project::create($data);

        //l'utente viene reindirizzato a un'altra pagina
        return redirect()->route("admin.projects.show", $project->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //una query dove lo slug corrispondente a $slug
        $project = Project::where("slug", $slug)->first();

        //porta a una view dove si visualizzano i dettagli del singolo project.
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // è utilizzato per recuperare i dettagli di un singolo project specifico ed editarlo
    public function edit($slug)
    {
        //una query dove lo slug corrispondente a $slug
        $project = Project::where("slug", $slug)->first();

        //porta a una view per la modifica di un project
        return view("admin.projects.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpsertRequest $request, $slug)
    {
        //una query dove lo slug corrispondente a $slug
        $project = Project::where("slug", $slug)->first();

        $data = $request->validated();

        //se i due titoli sono diversi  genera un nuovo "slug" basato sul nuovo titolo.
        if ($data["title"] !== $project->title) {
            $data["slug"] = $this->generateSlug($data["title"]);
        }

        // language viene trasformato in un array
        $data["language"] = explode(",", $data["language"]);

        // update fa un fill() + save()
        $project->update($data);

        //l'utente viene reindirizzato a un'altra pagina
        return redirect()->route("admin.projects.show", $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $project = Project::where("slug", $slug)->first();

        //Il metodo delete() elimina il singolo project associato
        $project->delete();

        //l'utente viene reindirizzato a un'altra pagina
        return redirect()->route("admin.projects.index");
    }

    protected function generateSlug($title)
    {
        // contatore da usare per avere un numero incrementale
        $counter = 0;

        do {
            // creo uno slug e se il counter è maggiore di 0, concateno il counter
            $slug = Str::slug($title) . ($counter > 0 ? "-" . $counter : "");

            // cerco se esiste già un elemento con questo slug
            $alreadyExists = Project::where("slug", $slug)->first();

            $counter++;
        } while ($alreadyExists); // finché esiste già un elemento con questo slug, ripeto il ciclo per creare uno slug nuovo

        return $slug;
    }
}
