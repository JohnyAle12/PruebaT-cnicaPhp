<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request){
    	$articles = Article::orderBy('created_at', 'desc')->get();
    	if($request->ajax()){
    		return response()->json($articles);
    	}
    	return view('articles.index', compact('articles'));
    }

    public function store(Request $request){
    	$article = new Article;
    	$article->name = $request->name;
    	$article->description = $request->description;
    	$article->save();

    	return $article;
    }

    public function update(Request $request, Article $articulo){
    	$articulo->update([
    		'description' => $request->description
    	]);

    	return $articulo;
    }

    public function destroy(Article $articulo){

    	return $articulo->delete();
    }
}
