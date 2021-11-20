<?php
    class Posts extends Controller {

        public function __construct() {
            //all posts functionality is available only for logged in users
            if (!isLoggedIn()) {
                redirect('users/login');
            }

            $this->postModel = $this->model('Post');
        }
        
        public function index()
        {
            //Get posts
            $posts = $this->postModel->getPosts();

            $data = [
                'posts' => $posts
            ];
            $this->view('posts/index', $data);
        }
    }