<?php

class ControllerLogin extends Controller
{
    public function __construct()
    {
        $this->model = new ModelLogin();
        parent::__construct();
    }


    /**
     * Start page (signInView.php)
     */
    public function indexAction()
    {
        $this->model->auth();
        $data = $this->model->getErrorMessage();
        $this->view->generate('signInView.php', $data);
    }


    /**
     * Logout and session destroy
     */
    public function logoutAction()
    {
        $this->model->logout();
        $data = $this->model->getErrorMessage();
        $this->view->generate('signInView.php', $data);
    }


    /**
     * Registration on the site
     */
    public function registerAction()
    {
        $this->model->registerUser();
        $data = $this->model->getErrorMessage();
        $this->view->generate('signUpView.php', $data);
    }

}
