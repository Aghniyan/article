<?php

namespace App\Http\Controllers\Api\Article;

use App\Helpers\APIHelpers;
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
        $articles = $this->article->all($request,null);
        $response = APIHelpers::APIResponse(false, http_response_code(), 'Article Not Found', $articles);
        return response()->json(['data' => $response]);
    }

    public function me(Request $request)
    {
        $articles = $this->article->all($request,Auth::user()->id);
        $response = APIHelpers::APIResponse(false, http_response_code(), 'Article Not Found', $articles);
        return response()->json(['data' => $response]);
    }

    public function show($id)
    {
        $article = $this->article->getByID($id);
        $response = APIHelpers::APIResponse(false, 200, 'Article Not Found', $article);
        return response()->json(['data' => $response], 200);
    }

    public function store(ArticleRequest $request)
    {
        $article = $this->article->store($request->all());
        $response = APIHelpers::APIResponse(false, 201, 'Data Berhasil Di Ditambahkan', $article);
        return response()->json(['data' => $response], 201);
    }

    public function update($id, ArticleRequest $request)
    {
        $article = $this->article->update($id, $request->all());
        $response = APIHelpers::APIResponse(false, 200, 'Data Berhasil diUpdate', null);
        return response()->json(['data' => $response],200);
    }

    public function delete($id)
    {
        $article = $this->article->delete($id);
        $response = APIHelpers::APIResponse(false, 200, 'Data Berhasil diHapus', null);
        return response()->json(['data' => $response], 200);
    }
}
