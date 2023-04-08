<?php

namespace App\Http\Controllers;

use App\Models\projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function storeProject(Request $request)
    {
        // dd($request->all());
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:191',
            'image_1' => 'required|file|image|mimes:jpg,jpeg,png|max:4000',
            'image_2' => 'file|image|mimes:jpg,jpeg,png|max:4000|nullable',
            'image_3' => 'file|image|mimes:jpg,jpeg,png|max:4000|nullable',
            'description' => 'required|string',
            'url' => 'required|url',
            'customer' => 'required|string|max:191',
            'mission' => 'required|string|max:191',
        ]);
        //dd($validatedData);


        //Enregistrer les image sur notre serveur


        $imagePaths = [];
        $images = [$request->file('image_1'), $request->file('image_2'), $request->file('image_3')];
        foreach ($images as $image) {
            if ($image) {
                $filename = time() . '-' . $image->getClientOriginalName();
                $path = $image->storeAs('public/images/' . $filename);
                $imagePaths[] = $filename;
            }
        }


        // Nouveau projet avec les données validées du formulaire
        $project = new projet;
        $project->name = $validatedData['name'];
        $project->image_1 = $imagePaths[0] ?? null;
        $project->image_2 = $imagePaths[1] ?? null;
        $project->image_3 = $imagePaths[2] ?? null;
        $project->description = $validatedData['description'];
        $project->url = $validatedData['url'];
        $project->customer = $validatedData['customer'];
        $project->mission = $validatedData['mission'];
        $project->user_id = Auth::user()->id;
        $project->save();

        // if()

        return redirect()->route('gallery')->with('success', 'Projet mis en Ligne avec succès.');

        // redirection avec errors
    }

    public function showProject()
    {
        $projects = Projet::all(); // on récupère les projet en DB

        return view('admin_views.admin_gallery', ['projets' => $projects]); // on les passe a la vue
    }

    public function showProjectPublic()
    {
        $projects = Projet::all(); // on récupère les projet en DB

        return view('gallery', ['projets' => $projects]); // on les passe a la vue
    }
    public function deleteProject($id)
    {
        $project = Projet::find($id);
        if (!$project) {
            return redirect()->route('gallery')->with('error', 'Aucun projet trouvé');
        }

        $imagePaths = [$project->image_1, $project->image_2, $project->image_3];

        foreach ($imagePaths as $imagePath) {
            if ($imagePath) { // check if path is not empty
                $filePath = storage_path('app/public/images/' . $imagePath);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }
        $result = Projet::where('id', $id)->delete();

        if ($result) {
            return redirect()->route('gallery')->with('success', 'Projet correctement supprimé');
        }
    }

    public function updateProject(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:191',
            'image_1' => 'file|image|mimes:jpg,jpeg,png|max:4000|nullable',
            'image_2' => 'file|image|mimes:jpg,jpeg,png|max:4000|nullable',
            'image_3' => 'file|image|mimes:jpg,jpeg,png|max:4000|nullable',
            'description' => 'required|string',
            'url' => 'required|url',
            'customer' => 'required|string|max:191',
            'mission' => 'required|string|max:191',
        ]);

        $project = Projet::find($id);
        if (!$project) {
            return redirect()->route('gallery')->with('error', 'Aucun projet trouvé');
        }

        if ($request->hasFile('image_1')) {
            // On supprime l'ancienne
            Storage::disk('public')->delete('storage/images/' . $project->image_1);
            // Storage::delete($project->image_1);

            // On enregistre la nouvelle
            $filename = time() . '-' . $request->file('image_1')->getClientOriginalName();
            $path = $request->file('image_1')->storeAs('storage/images/' . $filename);

            $project->image_1 = $path;
        }

        if ($request->hasFile('image_2')) {

            // On supprime l'ancienne
            Storage::disk('public')->delete('storage/images/' . $project->image_1);
            // Storage::delete($project->image_1);

            // On enregistre la nouvelle
            $filename = time() . '-' . $request->file('image_2')->getClientOriginalName();
            $path = $request->file('image_2')->storeAs('storage/images/' . $filename);

            $project->image_1 = $path;
        }

        if ($request->hasFile('image_3')) {

            // On supprime l'ancienne
            Storage::disk('public')->delete('storage/images/' . $project->image_1);
            // Storage::delete($project->image_1);

            // On enregistre la nouvelle
            $filename = time() . '-' . $request->file('image_3')->getClientOriginalName();
            $path = $request->file('image_3')->storeAs('storage/images/' . $filename);

            $project->image_1 = $path;
        }

        $project->name = $validatedData['name'];
        $project->description = $validatedData['description'];
        $project->url = $validatedData['url'];
        $project->customer = $validatedData['customer'];
        $project->mission = $validatedData['mission'];
        $project->user_id = Auth::user()->id;
        $project->save();

        return redirect()->route('gallery')->with('success', 'Le projet a été mis à jour avec succès.');
    }
}
