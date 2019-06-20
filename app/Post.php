<?php 

    namespace App;

    class Post {
        private function hasSessionPosts($session) {
             if (!$session->has('posts')) {
                $this->createDummyData($session);
            }
            return true;

        }

        public function getPosts($session) {
            $this->hasSessionPosts($session);
            return $session->get('posts');
        }
        
        private function createDummyData($session) {
            $posts = [
                [
                    'title' => 'Learning Laravel',
                    'content' => 'This blog post will get you right on track with Laravel!'
                ],
                [
                    'title' => 'Something Else',
                    'content' => 'Some other content.'
                    ]
                ];
                $session->put('posts', $posts);
        }
            
        public function getPost($session, $id) {
            $this->hasSessionPosts($session);
           
            return $session->get('posts')[$id];
        }

        public function addPost($session, $title, $content) {
            $this->hasSessionPosts($session);
            $posts = $session->get('posts');
            array_push($posts, ['title' => $title, 'content' => $content]);
            $session->put('posts', $posts);

        }

        public function editPost($session, $id, $title, $content) {
            $posts = $session->get('posts');
            $posts[$id] = ['title' => $title, 'content' => $content];
            $session->put('posts', $posts);
        }
    }

?>