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
        $comment->status = 0;
        $comment->save();

        return redirect()->back()->with('success', 'Votre commentaire est en attente de validation par un administrateur.');
    }

    public function validateComment($id)
    {
        $comment = commentaire::find($id);

        $comment->status = 1;
        $comment->save();

        return redirect()->back()->with('success', 'Commentaire Validé.');
    }
    public function deleteComment($id)
    {
        $comment = commentaire::find($id);
        if (!$comment) {
            return redirect()->route('gallery')->with('error', 'Le système a rencontré une erreur');
        }

        $result = commentaire::where('id', $id)->delete();

        if ($result) {
            return redirect()->route('gallery')->with('success', 'Commentaire supprimé');
        }
    }
}
