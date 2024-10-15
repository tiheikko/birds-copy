<?php

namespace App\Http\Controllers;

use App\Models\Species;
use App\Models\Order;
use App\Models\Family;
use App\Models\Genus;
use App\Models\Image;
use App\Models\Article;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(Species $species) {
        $id = $species->id;
        $bird = Species::find($id);
        $article = Article::where('bird_id', $id)->first();
        $main_img = Image::where('species_id', $id)->first();

        return view('article.index', compact('species', 'article', 'main_img'));
    }

    public function create() {
        $species = Species::all();

        return view('article.create', compact('species'));
    }

    public function store(Request $request) {
        function checkIfLoaded($filename, $path) {
            if (request()->hasFile($filename)) {
                $file = request()->file($filename);
                $name = $file->getClientOriginalName();

                $file->move(public_path() . $path, $name);

                return $path . $name;
            } else {
                return null;
            }
        }


        //info about the bird
        $species_full_info = Species::find(request()->species_id);

        $order = Order::find($species_full_info->order_id)->latin_name;
        $family = Family::find($species_full_info->family_id)->latin_name;
        $genus = Genus::find($species_full_info->family_id)->latin_name;
        $species = Species::find(request()->species_id)->latin_name;

        //pathes
        $path = '/images/' . $order . '/' . $family . '/' . $genus . '/' . $species . '/';
        $path_audio = '/audio/' . $order . '/';

        if(!File::exists(public_path() . $path_audio)) {
            File::makeDirectory(public_path() . $path_audio);
        }


        //data
        $validated = request()->validate([
            'appearance_img' => 'nullable|image',
            'habitat_img' => 'nullable|image',
            'feeding_img' => 'nullable|image',
            'breeding_img' => 'nullable|image',
        ]);

        $appearance_img = checkIfLoaded('appearance_img', $path);
        $habitat_img = checkIfLoaded('habitat_img', $path);
        $feeding_img = checkIfLoaded('feeding_img', $path);
        $breeding_img = checkIfLoaded('breeding_img', $path);

        $voice_audio = checkIfLoaded('voice_audio', $path_audio);

        Article::create([
            'bird_id' => request()->species_id,
            'voice_audio' => $voice_audio,
            'general_info' => request()->general_info,
            'appearance' => request()->appearance,
            'appearance_img' => $appearance_img,
            'appearance_img_note' => request()->appearance_img_note,
            'voice_description' => request()->voice_description,
            'habitat' => request()->habitat,
            'habitat_img' => $habitat_img,
            'habitat_img_note' => request()->habitat_img_note,
            'behavior' => request()->behavior,
            'feeding' => request()->feeding,
            'feeding_img' => $feeding_img,
            'feeding_img_note' => request()->feeding_img_note,
            'breeding' => request()->breeding,
            'breeding_img' => $breeding_img,
            'breeding_img_note' => request()->breeding_img_note,
        ]);

        return redirect()->route('article.create');
    }

    public function show() {
        $articles = Article::all();

        //dd($articles[0]);

        return view('article.show', compact('articles'));
    }

    public function edit(Article $article) {
        $info = Article::find($article->id);

        return view('article.edit', compact('info'));
    }

    public function update(Request $request, Article $article) {

        //filename is the name of the column in the db!!
        function checkIfLoaded($filename, $path, $bird_id) {
            if (request()->hasFile($filename)) {
                $file = request()->file($filename);
                $name = $file->getClientOriginalName();

                $old_file = Article::find($bird_id)->$filename;
                File::delete(public_path() . $old_file);

                $file->move(public_path() . $path, $name);

                return $path . $name;
            } else {
                $old_file = Article::find($bird_id)->$filename;
                return $old_file;
            }
        }


        //info about the bird
        $species_full_info = Species::find($article->bird_id);

        $order = Order::find($species_full_info->order_id)->latin_name;
        $family = Family::find($species_full_info->family_id)->latin_name;
        $genus = Genus::find($species_full_info->family_id)->latin_name;
        $species = Species::find($article->bird_id)->latin_name;

        //pathes
        $path = '/images/' . $order . '/' . $family . '/' . $genus . '/' . $species . '/';
        $path_audio = '/audio/' . $order . '/';


        //data
        $validated = request()->validate([
            'appearance_img' => 'nullable|image',
            'habitat_img' => 'nullable|image',
            'feeding_img' => 'nullable|image',
            'breeding_img' => 'nullable|image',
        ]);

        $appearance_img = checkIfLoaded('appearance_img', $path, $article->id);
        $habitat_img = checkIfLoaded('habitat_img', $path, $article->id);
        $feeding_img = checkIfLoaded('feeding_img', $path, $article->id);
        $breeding_img = checkIfLoaded('breeding_img', $path, $article->id);

        $voice_audio = checkIfLoaded('voice_audio', $path_audio, $article->id);

        $article->update([
            'bird_id' => $species_full_info->id,
            'voice_audio' => $voice_audio,
            'general_info' => request()->general_info,
            'appearance' => request()->appearance,
            'appearance_img' => $appearance_img,
            'appearance_img_note' => request()->appearance_img_note,
            'voice_description' => request()->voice_description,
            'habitat' => request()->habitat,
            'habitat_img' => $habitat_img,
            'habitat_img_note' => request()->habitat_img_note,
            'behavior' => request()->behavior,
            'feeding' => request()->feeding,
            'feeding_img' => $feeding_img,
            'feeding_img_note' => request()->feeding_img_note,
            'breeding' => request()->breeding,
            'breeding_img' => $breeding_img,
            'breeding_img_note' => request()->breeding_img_note,
        ]);

        return redirect()->route('article.edit', $article->id);
    }

    public function destroy(Article $article) {
        File::delete(public_path() . $article->appearance_img);
        File::delete(public_path() . $article->habitat_img);
        File::delete(public_path() . $article->feeding_img);
        File::delete(public_path() . $article->breeding_img);
        File::delete(public_path() . $article->voice_audio);

        $article->delete();

        return redirect()->route('article.show');
    }
}
