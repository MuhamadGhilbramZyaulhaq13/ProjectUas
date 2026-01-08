<?php
class AuthController extends Controller {

    public function index() {
        $this->view('auth/login');
    }

    public function login() {
        $user = $this->model('User')->login($_POST);

        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: ' . BASEURL . '/product');
        } else {
            header('Location: ' . BASEURL . '/product');
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASEURL);
    }
}
