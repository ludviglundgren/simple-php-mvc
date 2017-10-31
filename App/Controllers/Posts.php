<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Post;

class Posts extends \Core\Controller
{
    public function indexAction()
    {
        $posts = Post::getAll();
        // echo 'Hello from the index action in the Posts controller!';
        View::renderTemplate('Posts/index.html', [
            'posts' => $posts
        ]);
    }

    public function newAction()
    {
        View::renderTemplate('Posts/new.html');
    }

    public function createAction()
    {
        $post = new Post($_POST);

        $post->save();

        View::renderTemplate('Posts/success.html');
    }

    public function editAction()
    {
        echo 'Hello from the edit action in the Posts controller!';
        echo '<p>Route parameters: <pre>' .
        htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}
