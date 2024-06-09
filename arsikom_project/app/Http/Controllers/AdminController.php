<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\ArticleModel;

class AdminController extends Controller
{
    public function addBlog(){
        return view('admin.addBlog');
    }

    public function store_blog(Request $request){
        $request->validate([
            'title_article' => 'required',
            'name_writer' => 'required',
            'kategori' => 'required',
            'upload_cover' => 'required',
            'content_article' => 'required'
        ]);

        $title = htmlspecialchars($request->input('title_article'));
        $writer = htmlspecialchars($request->input('name_writer'));
        $kategori = htmlspecialchars($request->input('kategori'));
        $cover = $request->file('upload_cover');
        $content = $request->input('content_article');

        $filename = null;

        if($cover){
            $filename = rand() . '_' . $cover->getClientOriginalName(); // Mengambil nama file asli
            Storage::disk('cover_article')->put($filename, file_get_contents($cover)); // Store the file in the public/cover_article folder with the generated filename
        }

        ArticleModel::create([
            'id_user_writer' => Str::uuid(),
            'cover' => $filename,
            'title' => $title,
            'writer' => $writer,
            'kategori' => $kategori,
            'content' => $content
        ]);

        return redirect()->to('/')->withInput();
    }
}
