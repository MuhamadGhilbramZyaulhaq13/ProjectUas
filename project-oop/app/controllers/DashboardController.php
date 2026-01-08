<?php

class DashboardController extends Controller {

    public function index() {
        // Cek login
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        // Arahkan berdasarkan role
        if ($_SESSION['user']['role'] === 'admin') {
            $this->view('dashboard/admin');
        } else {
            $this->view('dashboard/user');
        }
    }
}
