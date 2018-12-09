<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Photo;

class AdminMediasController extends Controller
{
    //
    public function index(){

    	$photos = Photo::all();

    	return view('admin.medias.index', compact('photos'));
    }

    public function create(){

    	return view('admin.medias.create');
    }

    public function store(Request $request){

    	$file = $request->file('file');

    	$name = time() . $file->getClientOriginalName();

    	$file->move('images', $name);

    	Photo::create(['file'=>$name]);
    }

    public function destroy($id){
    	
    	$photo = Photo::findOrFail($id);

    	unlink(public_path() . $photo->file);

    	$photo->delete();

    	return redirect('/admin/medias');
    }

    public function deleteMedia(Request $request){

        if(isset($request->single_delete)){
            $this->destroy($request->photo);
            return redirect()->back();
        }

        if(isset($request->delete_all) && !empty($request->checkBoxArray)){
            $photos = Photo::findOrFail($request->checkBoxArray);
            foreach ($photos as $photo) {
                $photo->delete();
            }
            return redirect()->back();
        } else {
            return redirect()->back();

        }





        return redirect('admin/medias');
    }
}
