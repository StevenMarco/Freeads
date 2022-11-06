<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EditAnnonceController extends Controller
{
    public function showAnnonceEdit(Request $request, $id)
    {
       //$annonces = Annonce::all();
        //return view('editAnnonce', ['annonces' => $annonces]);  
       // var_dump($request);
        echo $id;
        return view("editAnnonce");
    }

    public function update(Request $request, Annonce $ad)
    {
        $input = $request->all();

        if ($img = $request->file("image")) {
            $imageName = time() . '_' . $img->getClientOriginalExtension();
            $img->move(\public_path("image/"), $imageName);
            $input['image'] = $imageName;
        } else {
            unset($input['image']);
        }

        $ad->update($input);

        return redirect('admin')->with('success', 'Ad updated successfully');
    }
}
