<?php

require_once __DIR__ . '/../helpers/app_url_helper.php';
class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('ProductModel');

        // Simple session-based authentication check
        session_start();
        if (!isset($_SESSION['logged_in'])) {
            header('Location: ' . app_url('/login'));
            exit;
        }
    }

    // READ - list all products
    public function index()
    {
        $data['products'] = $this->ProductModel->all();
        $this->call->view('products_view', $data);
    }

    // CREATE - show form
    public function create()
    {
        $this->call->view('product_create_view');
    }

    // CREATE - handle form submission
    public function store()
    {
        $this->ProductModel->create([
            'product_name' => $_POST['product_name'],
            'description'  => $_POST['description'],
            'price'        => $_POST['price'],
            'quantity'     => $_POST['quantity'],
        ]);
        header('Location: ' . app_url('/products'));
        exit;
    }

    // UPDATE - show edit form
    public function edit($id)
    {
        $data['product'] = $this->ProductModel->find($id);
        $this->call->view('product_edit_view', $data);
    }

    // UPDATE - handle form submission
    public function update($id)
    {
        $this->ProductModel->update($id, [
            'product_name' => $_POST['product_name'],
            'description'  => $_POST['description'],
            'price'        => $_POST['price'],
            'quantity'     => $_POST['quantity'],
        ]);
        header('Location: ' . app_url('/products'));
        exit;
    }

    // DELETE
    public function delete($id)
    {
        $this->ProductModel->delete($id);
        header('Location: ' . app_url('/products'));
        exit;
    }
}