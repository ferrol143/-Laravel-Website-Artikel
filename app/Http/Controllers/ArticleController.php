<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function home(Request $request){

        $keyword = htmlspecialchars($request->input('keyword'));
        $kategori = htmlspecialchars($request->input('kategori'));

        if($keyword){
            $article = DB::table('tbl_article')->select('*')
            ->where('title', 'like', '%' . $keyword . '%')
            ->orWhere('writer', 'like', '%' . $keyword . '%')->paginate(4);
        }else{
            if($kategori){
                $article = DB::table('tbl_article')->select('*')->where('kategori',$kategori)->paginate(4);
            }else{
                $article = DB::table('tbl_article')->select('*')->paginate(4);
            }
        }

        return view('home.home',['article' => $article]);
    }

    public function detail($id_article){
        $article = DB::table('tbl_article')->select('*')->where('id',$id_article)->first();

        return view('home.detailBlog', ['article' => $article]);
    }
}
