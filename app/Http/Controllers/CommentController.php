<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commentaire;

class CommentController extends Controller
{
    public function storeComment(Request $request)
    {
        $validatedData = $request->validate([
            'Mail' => 'required|email',
            'comment' => 'required',
            'id' => 'required|exists:projets,id'
        ]);

        $comment = new commentaire;
        $comment->email = $validatedData['Mail'];
        $comment->commentaire = $validatedData['comment'];
        $comment->projet_id = $validatedData['id'];
        $comment->save();

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
    }
}
