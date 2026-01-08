<?php
class ProductController extends Controller {

    private function onlyAdmin() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
            header('Location: ' . BASEURL . '/product');
            exit;
        }
    }


    public function index() {
        $keyword = $_GET['search'] ?? '';
        $page = $_GET['page'] ?? 1;

        $data['products'] = $this->model('Product')->getAll($keyword, $page);
        $data['total'] = $this->model('Product')->totalPage($keyword);

        $this->view('product/index', $data);
    }

    public function create() {
        $this->view('product/create');
    }

    public function store() {
        $photoName = null;

        if ($_FILES['photo']['name']) {
            $photoName = time() . '_' . $_FILES['photo']['name'];
            move_uploaded_file(
                $_FILES['photo']['tmp_name'],
                'uploads/products/' . $photoName
            );
        }

        $_POST['photo'] = $photoName;
        $this->model('Product')->insert($_POST);

        header('Location: ' . BASEURL . '/product');
    }


    public function edit($id) {
        $data['product'] = $this->model('Product')->find($id);
        $this->view('product/edit', $data);
    }

    public function update() {
        $photoName = $_POST['old_photo'];

        if ($_FILES['photo']['name']) {
            $photoName = time() . '_' . $_FILES['photo']['name'];
            move_uploaded_file(
                $_FILES['photo']['tmp_name'],
                'uploads/products/' . $photoName
            );
        }

        $_POST['photo'] = $photoName;
        $this->model('Product')->update($_POST);

        header('Location: ' . BASEURL . '/product');
    }

    public function delete($id) {
        $this->model('Product')->delete($id);
        header('Location: ' . BASEURL . '/product');
    }
}
