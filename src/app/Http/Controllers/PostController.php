<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SnsAccount;
use App\Models\Post;

class PostController extends Controller
{
    public function getPost(Request $request) {
        $data = Post
            ::where("sns_account_id", $request->input("accountId"))
            ->where("status", 0)
            ->orderBy("updated_at", "desc")
            ->get();

        return $data;
    }

    public function addPost(Request $request) {
        $post = new Post;
        $post->body = $request->input("body");
        $post->sns_account_id = $request->input("accountId");
        $post->user_id = $request->input('authId');
        $post->save();

    }
}
