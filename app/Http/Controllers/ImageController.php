<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $filename = time() . '-' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images', $filename);

        // pass the filename to the view
        return view('admin_views.dashboard', ['filename' => $filename]);
    }
}
