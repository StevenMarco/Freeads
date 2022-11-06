<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Support\Facades\DB;

class AnnonceController extends Controller
{
    public function showAnnonce()
    {
        $annonces = Annonce::all();
        return view('annonce', ['annonces' => $annonces]); 
    }
    
    public function showAnnonceEdit(Request $request, $id)
    {
       //$annonces = Annonce::all();
        //return view('editAnnonce', ['annonces' => $annonces]);  
       // var_dump($request);
        $result = Annonce::where('id', $id)->first();
        return view("editAnnonce", ['result' => $result]);
    }

    public function store(Request $request)
    {
        if(isset($_POST['create'])) {

            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'price' => 'required',
                'category' => 'required',
            ]);

            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);

            $annonce = new Annonce();
            $annonce->title = $request->input('title'); 
            $annonce->description = $request->input('description');
            $annonce->image = $new_name;
            $annonce->price = $request->input('price');
            $annonce->category = $request->input('category');
            $annonce->users_id = auth()->user()->id;
            $annonce->save();

            return redirect()->back()->with('success', 'Annonce créée avec succès');
        }
    }
   
    public function updateAnnonce(Request $request, Annonce $ad, $id)
    {
        $input = $request->all();
 
        if(isset($_POST['update'])) 
        {
            // if ($image = $request->input('image')) 
            // {
            //     echo "imageeeeeeeee";
            //     $new_name = rand() . '.' . $image->getClientOriginalExtension();
            //     $image->move(public_path('images'), $new_name);
            // }
            // else 
            // {
            //     echo "nooooooooooooooo";
            // }
            $annonces_id = DB::table('annonces')->where('id', $id)->first()->id;
            $annonce = Annonce::find($annonces_id);
            $annonce->title = $request->input('title');
            $annonce->description = $request->input('description');
            $annonce->price = $request->input('price');

            // $annonce for image (à finir)
            // $image = $request->file('image');
            // $new_name = rand() . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path('images'), $new_name);
            // $annonce->image = $new_name;
            
            //save
            $annonce->save();
            return redirect()->back()->with('success', 'Annonce modifiée avec succès');
        }
        elseif(isset($_POST['delete'])) {
            $annonces_id = DB::table('annonces')->where('id', $id)->first()->id;
            $annonce = Annonce::find($annonces_id);
            $annonce->delete();
            return redirect()->to('/profile/');
        }
        elseif(isset($_POST['cancel'])) {
            return redirect()->to('/profile/');
        }
    }

    public function search(Request $request)
    {
        if(isset($_POST['search'])) 
        {
            if($request->input('searchTitle') == !null && !empty($request->input('searchTitle')))
            {
                echo "title";
                $search = $request->input('searchTitle');
                $annonces = Annonce::where('title', 'like', '%'.$search.'%')->get();
                return view('annonce', ['annonces' => $annonces]);
            }
            // elseif($request->input('searchPrice') == !null && $request->input('searchPrice2') == !null)
            // {
            //     $search = $request->input('searchPrice');
            //     $search2 = $request->input('searchPrice2');
            //     $annonces = Annonce::whereBetween('price', [$search, $search2])->get();
            //     return view('annonce', ['annonces' => $annonces]);
            // }
            elseif($request->input('searchPrice') == !null && $request->input('searchPrice') == 'priceUp')
            {
                echo "priceUp";
                $annonces = Annonce::orderBy('price', 'asc')->get();
                return view('annonce', ['annonces' => $annonces]);
            }
            elseif($request->input('searchPrice') == !null && $request->input('searchPrice') == 'priceDown')
            {
                echo "priceDown";
                $annonces = Annonce::orderBy('price', 'desc')->get();
                return view('annonce', ['annonces' => $annonces]);
            }
            elseif($request->input('searchCategory') == !null && $request->input('searchCategory') == 'category')
            {
                echo "category";
                echo $request->input('searchCategory');
                $search = $request->input('searchCategory');
                $annonces = Annonce::where('category', '=', $search)->get();
                return view('annonce', ['annonces' => $annonces]);
            }
            elseif($request->input('searchRecent') == !null && $request->input('searchRecent') == 'recentDown')
            {
                echo "recentDown";
                $annonces = Annonce::orderBy('updated_at', 'desc')->get();
                return view('annonce', ['annonces' => $annonces]);
            }
            elseif($request->input('searchRecent') == !null && $request->input('searchRecent') == 'recentUp')
            {
                echo "recentUp";
                $annonces = Annonce::orderBy('updated_at', 'asc')->get();
                return view('annonce', ['annonces' => $annonces]);
            }
            else
            {
                echo "nooooooo";
                return redirect()->back()->with('error', 'Aucune annonce trouvée');
            }
        }
        elseif(isset($_POST['reset'])) 
        {
            echo "reset";
            $annonces = Annonce::all();
            return view('annonce', ['annonces' => $annonces]);
        }
    }
}