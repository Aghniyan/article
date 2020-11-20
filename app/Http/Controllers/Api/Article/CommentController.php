<?php

namespace App\Http\Controllers\Api\Article;

use App\Helpers\APIHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\CommentRequest;
use App\Repositories\Interfaces\Article\CommentInterfaces;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comment;


    public function __construct(CommentInterfaces $comment)
    {
        $this->comment = $comment;
    }

    public function index($article_id)
    {
        $comments = $this->comment->getByArticle($article_id);
        $response = APIHelpers::APIResponse(false, 200, 'comment Not Found', $comments);
        return response()->json(['data' => $response],200);
    }
    public function store($article_id, CommentRequest $request)
    {
        $comment = $this->comment->store($request->all());
        $response = APIHelpers::APIResponse(false, 201, 'Data Berhasil Di Ditambahkan', $comment);
        return response()->json(['data' => $response], 201);
    }
    public function update($article_id,$id,CommentRequest $request)
    {
        $comment = $this->comment->update($id, $request->all());
        $response = APIHelpers::APIResponse(false, 200, 'Data Berhasil diUpdate', null);
        return response()->json(['data' => $response], 200);
    }
    public function delete($id)
    {
        $comment = $this->comment->delete($id);
        $response = APIHelpers::APIResponse(false, 200, 'Data Berhasil diHapus', null);
        return response()->json(['data' => $response], 200);
    }
}
