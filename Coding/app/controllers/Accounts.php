<?php
class Accounts extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Account');
    }

    public function index()
    {
        $this->view('accounts/index');
    }
}
?>