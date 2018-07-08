<?php

class ControllerProduct extends Controller
{

    public function __construct()
    {
        $this->model = new ModelProduct();
        parent::__construct();
    }


    /**
     * Start page
     */
    public function indexAction()
    {
        $data = $this->model->getProducts($_GET['category']);
        $this->view->generate('productsView.php', $data);
    }


    /**
     * Show one product on page
     * @param $url
     */
    public function pageAction($url)
    {
        $data = $this->model->getProductByUrl($url);
        $this->view->generate('singleView.php', $data);
    }


    /**
     * Show cart page
     */
    public function cartAction()
    {
        $this->view->generate('cartView.php', $data = null);
    }


    /**
     * Show order in cart
     * @param $url
     */
    public function orderAction($url)
    {
        $data = $this->model->getProductByUrl($url);
        $this->view->generate('orderView.php', $data);
    }


    /**
     * Demo send order on email and return answer
     */
    public function sendOrderAction()
    {
        $data = $this->model->sendOrder();
        $this->view->generate('orderAnswerView.php', $data);
    }

}