<?php
/**
 * BlogAction.class.php
 *
 * Blog controller
 */

require 'Action.php';

class BlogAction extends ThinkingAction {
    public function index() {
        $posts = D('Post')->get_posts();
        $this->display('index.html', array('posts' => $posts));
    }

    public function post($id) {
        $post = D('Post')->get_post($id);
        $this->display('post.html', array('post' => $post));
    }
}

/* End of file BlogAction.class.php */
