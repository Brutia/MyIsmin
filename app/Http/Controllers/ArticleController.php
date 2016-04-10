<?php
namespace App\Http\Controllers;


use DB;
use App\User;
use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Controllers\BaseController;
use App\Http\Requests\Request;

class ArticleController extends BaseController{
	
	public function display($article_name){
		$article = DB::table('articles')->where('name', $article_name)->first();
		return view('article', ['content'=> $article->content, 'banner'=>null]);
	}
}