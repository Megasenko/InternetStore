<?php

class ControllerAdminPanel extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
            header('Location:/');
        } else {
            $this->model = new ModelAdminPanel();
            parent::__construct();
        }
    }


    /**
     * Start page
     */
    public function indexAction()
    {
        $this->view->generate('adminView.php', $data = null, $templateView = 'adminTemplateView.php');
    }

    //                                              Functions by products

    /**
     * Show all products in table
     */
    public function productsAction()
    {
        $data = $this->model->getProducts();
        $this->view->generate('adminProductsView.php', $data, $templateView = 'adminTemplateView.php');
    }


    /**
     * Add product
     */
    public function addProductAction()
    {
        $data = $this->model->getCategories();
        if (isset($_POST['add'])) {
            $this->model->insertProduct();
        }
        $this->view->generate('adminAddProductView.php', $data, $templateView = 'adminTemplateView.php');
    }


    /**
     * View product before update
     * @param $url
     */
    public function editProductAction($url)
    {
        $data = $this->model->getProductByUrl($url);
        $this->view->generate('adminUpdateProductView.php', $data, $templateView = 'adminTemplateView.php');

    }


    /**
     * Update product
     * @param $url
     */
    public function updateProductAction($url)
    {
        if ($this->model->updateProduct($url)) {
            $data = $this->model->getProductByUrl($url);
            $this->view->generate('adminUpdatedProductView.php', $data, $templateView = 'adminTemplateView.php');
        }
    }


    /**
     * Delete product
     * @param $url
     */
    public function delProductAction($url)
    {
        $this->model->deleteProduct($url);
        $data = $this->model->getProducts();
        $this->view->generate('adminProductsView.php', $data, $templateView = 'adminTemplateView.php');

    }

    //                                              Functions by categories

    /**
     * Show all categories in table
     */
    public function categoriesAction()
    {
        $data = $this->model->getCategories();
        $this->view->generate('adminCategoriesView.php', $data, $templateView = 'adminTemplateView.php');
    }


    /**
     * Add category
     */
    public function addCategoryAction()
    {
        if (isset($_POST['add'])) {
            $this->model->insertCategory();
        }
        $this->view->generate('adminAddCategoryView.php', $data = null, $templateView = 'adminTemplateView.php');
    }


    /**
     * View category before update
     * @param $title
     */
    public function editCategoryAction($title)
    {
        $data = $this->model->getCategoryByTitle($title);
        $this->view->generate('adminUpdateCategoryView.php', $data, $templateView = 'adminTemplateView.php');

    }


    /**
     * Update category
     * @param $title
     */
    public function updateCategoryAction($title)
    {
        if ($this->model->updateCategory($title)) {
            $data = $this->model->getCategories();
            $this->view->generate('adminCategoriesView.php', $data, $templateView = 'adminTemplateView.php');
        }
    }


    /**
     * Delete category
     * @param $title
     */
    public function delCategoryAction($title)
    {
        $this->model->deleteCategory($title);
        $data = $this->model->getCategories();
        $this->view->generate('adminCategoriesView.php', $data, $templateView = 'adminTemplateView.php');

    }

    //                                              Functions by users

    /**
     * Show all users in table
     */
    public function usersAction()
    {
        $data = $this->model->getUsers();
        $this->view->generate('adminUsersView.php', $data, $templateView = 'adminTemplateView.php');
    }


    /**
     * Add user
     */
    public function addUserAction()
    {
        $this->model->insertUser();
        $this->view->generate('adminAddUserView.php', $data = null, $templateView = 'adminTemplateView.php');
    }


    /**
     * View user before update
     * @param $id
     */
    public function editUserAction($id)
    {
        $data = $this->model->getUser($id);
        $this->view->generate('adminUpdateUserView.php', $data, $templateView = 'adminTemplateView.php');
    }


    /**
     * Update user
     * @param $id
     */
    public function updateUserAction($id)
    {
        if ($this->model->updateRole($id)) {
            $data = $this->model->getUsers();
            $this->view->generate('adminUsersView.php', $data, $templateView = 'adminTemplateView.php');
        }
    }


    /**
     * Delete user
     * @param $id
     */
    public function delUserAction($id)
    {
        $this->model->deleteUser($id);
        $data = $this->model->getUsers();
        $this->view->generate('adminUsersView.php', $data, $templateView = 'adminTemplateView.php');
    }

}
