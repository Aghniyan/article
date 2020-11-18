<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\Article\ArticleInterfaces;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    protected $article;

    public function __construct(ArticleInterfaces $article)
    {
        $this->article = $article;
    }

    public function index()
    {
        $articles = $this->article->all($this->currentUser()->id);
        return response()->json(['data' => $articles], 200);
    }

    public function show($id)
    {
        $article = $this->article->getByID($id);
        return response()->json(['data' => $article], 200);
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $article = $this->article->store($data);
        return response()->json(['data' => $article], 201);
    }

    public function update($id, Request $request)
    {
        $data = $this->getData($request);
        $article = $this->article->update($id, $data);
        return response()->json(['data' => $article], 200);
    }

    public function delete($id)
    {
        $article = $this->article->delete($id);
        return response()->json(['data' => $article], 200);
    }

    private function getData($request){
        return [
            "user_id"=> $this->currentUser()->id,
            "slug"=> $this->getSlug($request->title),
            "title"=> $request->title,
            "content"=> $request->content
        ];
    }

    public function currentUser()
    {
        return Auth::user();
    }

    private function getSlug($data)
    {
        return str_replace(" ", "-", strtolower($data));
    }
}
