<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\image;

class ImageController extends Controller
{


    // Store Image
    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:400'
        ]);

        $imageName = time() . '.' . $request->image->extension();

        // Public Folder
        $request->image->move(public_path('images'), $imageName);

        // //Store in Storage Folder
        //$request->image->storeAs('images', $imageName);



        return back()->with('success', 'Image uploaded Successfully!')
            ->with('image', $imageName);
    }

    public function storeDashboardImage(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|file|image|mimes:jpg,jpeg,png|max:4000',
        ]);

        $image = null;
        $uploadedImage = $request->file('image');

        if ($uploadedImage) {
            $filename = time() . '-' . $uploadedImage->getClientOriginalName();
            $path = $uploadedImage->storeAs('public/images', $filename);

            $image = new image();
            $image->image = $filename;
            $image->save();
        }
        if ($request->hasFile('image') && $image) {
            // On supprime l'ancienne
            Storage::disk('public')->delete('images/' . $image->image);

            // On enregistre la nouvelle
            $filename = time() . '-' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images/' . $filename);

            $image->image = $filename;
            $image->save();
        }

        return redirect()->route('admin')->with('success', 'Image uploaded successfully!');
    }
}
