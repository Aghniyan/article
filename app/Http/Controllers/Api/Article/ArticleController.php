<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequest;
use App\Repositories\Interfaces\Article\ArticleInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ArticleController extends Controller
{
    protected $article;
    public function __construct(ArticleInterfaces $article)
    {
        $this->article = $article;
    }

    public function index(Request $request)
    {
        $articles = $this->article->all(Auth::user()->id,$request);
        return response()->json(['data' => $articles], 200);
    }

    public function show($id)
    {
        dd($id);
        $article = $this->article->getByID($id);
        return response()->json(['data' => $article], 200);
    }

    public function store(ArticleRequest $request)
    {
        $article = $this->article->store($request->all());
        return response()->json(['data' => $article], 201);
    }

    public function update($id, ArticleRequest $request)
    {
        $article = $this->article->update($id, $request->all());
        return response()->json(['data' => $article], 200);
    }

    public function delete($id)
    {
        $article = $this->article->delete($id);
        return response()->json(['data' => $article], 200);
    }

    public function filter(Request $request)
    {
        // dd($request);
        $article = $this->article->filter($request);
        return response()->json(['data' => $article], 200);
    }
}
