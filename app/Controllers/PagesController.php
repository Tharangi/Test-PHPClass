<?php namespace App\Controllers;


use App\Models\Post;

class PagesController extends BaseController{

    public function index()
    {
        $post_tbl = new Post();
        $posts  = $post_tbl->all();
        return $this->loadView('posts.all',['posts'=> $posts,'title'=>'All posts']);
    }

    public function test(){
        $post_tbl = new Post();
        $posts  = $post_tbl->all();
        var_dump($posts);
    }

} 