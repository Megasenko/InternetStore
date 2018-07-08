<?php

class ControllerMain extends Controller
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
        $this->view->generate('mainView.php', 'templateView.php');
    }

}