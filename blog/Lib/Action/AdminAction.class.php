<?php
/**
 * AdminAction.class.php
 *
 * Admin controller
 */

require 'Action.php';

class AdminAction extends ThinkingAction {
    protected function user() {
        return D('User')->get_user(session('user_id'));
    }

    protected function check_login() {
        if (!(session('is_login') === 1)) {
            $this->redirect('Admin/login');
        }
        return true;
    }

    public function login() {
        if ($this->isGet()) {
            $this->display('login.html');
        } else if ($this->isPost()) {
            $hash = D('User')->encrypt($_POST['password']);
            $user = D('User')->get_user_by_email($_POST['email']);
            if ($user !== null && $hash === $user['password']) {
                session('is_login', 1);
                session('user_id', $user['id']);
                $this->redirect('Admin/index');
            } else {
                session('is_login', null);
                $this->redirect('Admin/login');
            }
        }
    }

    public function logout() {
        $this->check_login();
        session('is_login', null);
        session('user_id', null);
        $this->redirect('Admin/login');
    }

    public function index() {
        $this->check_login();
        $posts = D('Post')->get_posts();
        $this->display('admin.html', array('posts' => $posts));
    }

    public function compose() {
        $this->check_login();

        if ($this->isPost()) {
            $data = array(
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'author_id' => $this->user()['id'],
            );
            $post = D('Post');
            $post->create($data);
            $post->add();
            $this-redirect('Admin/index');
        } else if ($this->isGet()) {
            $this->display('compose.html');
        }
    }

    public function edit($id=null) {
        $this->check_login();

        if ($this->isPost()) {
            $data = array(
                'id' => $_POST['post_id'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'author_id' => $this->user()['id'],
            );
            $post = D('Post')->save($data);
            $this->redirect('Admin/index');
        } if ($this->isGet()) {
            $post = D('Post')->get_post($id);
            $this->display('edit.html', array('post' => $post));
        }
    }

    public function remove($id) {
        $this->check_login();

        $cond = array('id' => array('eq', $id));
        $post = D('Post')->where($cond)->delete();

        $this->redirect('Admin/index');
    }
}

/* End of file AdminAction.class.php */
