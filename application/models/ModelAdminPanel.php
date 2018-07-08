<?php

class ModelAdminPanel extends Model
{
    /**
     * Products
     * @var
     */
    private $product_name;
    private $description;
    private $categories_id;
    private $price;


    /**
     * Users
     * @var
     */
    private $name;
    private $last_name;
    private $login;
    private $email;
    private $password;


    /**
     * Categories
     * @var
     */
    private $title;


    /**
     * Get all product
     * @return array|bool
     */
    public function getProducts()
    {
        if ($this->connect()) {
            $sql = "SELECT *
                    FROM categories AS c
                    JOIN products AS p ON c.id = p.categories_id ";
            return $this->connect()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }


    /**
     * Add product in DB
     * @return bool
     */
    public function insertProduct()
    {
        if (isset($_POST['add'])) {
            $this->product_name = (isset($_POST['product_name'])) ? $_POST['product_name'] : '';
            $this->description = (isset($_POST['description'])) ? $_POST['description'] : '';
            $this->categories_id = (isset($_POST['categories_id'])) ? $_POST['categories_id'] : '';
            $this->price = (isset($_POST['price'])) ? $_POST['price'] : '';
        }

        $filePath = null;
        if (isset($_FILES)) {
            $filePath = $this->saveImage();
        }

        if ($this->connect()) {
            $sql = "INSERT INTO products(product_name , description  , url , image, categories_id, price)
            VALUES ( :product_name , :description , :url , :image , :categories_id, :price)";

            $stmt = $this->connect()->prepare($sql);
            $url = $this->getUrl($this->product_name);

            $stmt->bindValue(':product_name', strip_tags(trim($this->product_name)), PDO::PARAM_STR);
            $stmt->bindValue(':description', strip_tags(trim($this->description)), PDO::PARAM_STR);
            $stmt->bindValue(':url', $url, PDO::PARAM_STR);
            $stmt->bindValue(':image', $filePath, PDO::PARAM_STR);
            $stmt->bindValue(':categories_id', strip_tags(trim($this->categories_id)), PDO::PARAM_STR);
            $stmt->bindValue(':price', strip_tags(trim($this->price)), PDO::PARAM_STR);
            if ($stmt->execute()) {
                header('Location:/adminPanel/products');
                exit;
            }
        }
        return false;
    }


    /**
     * Generate URL
     * @param $str
     * @return mixed|string
     */
    private function getUrl($str)
    {
        $productUrl = str_replace(' ', '-', $str);
        $productUrl = $this->transliteration($productUrl);
        $productIsset = $this->getProductByUrl($productUrl);
        if (!$productIsset) {
            return $productUrl;
        } else {
            $url = $productIsset['url'];
            $exUrl = explode('-', $url);
            if ($exUrl) {
                $temp = (int)end($exUrl);
                $newUrl = $exUrl[0] . '-' . ++$temp;
            } else {
                $temp = 0;
                $newUrl = $productUrl . '-' . ++$temp;
            }
            return $this->getUrl($newUrl);
        }
    }


    /**
     *  Translate text
     * @param $str
     * @return string
     */
    private function transliteration($str)
    {
        $st = strtr($str,
            array(
                'а' => 'a',
                'б' => 'b',
                'в' => 'v',
                'г' => 'g',
                'д' => 'd',
                'е' => 'e',
                'ё' => 'e',
                'ж' => 'zh',
                'з' => 'z',
                'и' => 'i',
                'к' => 'k',
                'л' => 'l',
                'м' => 'm',
                'н' => 'n',
                'о' => 'o',
                'п' => 'p',
                'р' => 'r',
                'с' => 's',
                'т' => 't',
                'у' => 'u',
                'ф' => 'ph',
                'х' => 'h',
                'ы' => 'y',
                'э' => 'e',
                'ь' => '',
                'ъ' => '',
                'й' => 'y',
                'ц' => 'c',
                'ч' => 'ch',
                'ш' => 'sh',
                'щ' => 'sh',
                'ю' => 'yu',
                'я' => 'ya',
                ' ' => '_',
                '<' => '_',
                '>' => '_',
                '?' => '_',
                '"' => '_',
                '=' => '_',
                '/' => '_',
                '|' => '_'
            )
        );
        $st2 = strtr($st,
            array(
                'А' => 'a',
                'Б' => 'b',
                'В' => 'v',
                'Г' => 'g',
                'Д' => 'd',
                'Е' => 'e',
                'Ё' => 'e',
                'Ж' => 'zh',
                'З' => 'z',
                'И' => 'i',
                'К' => 'k',
                'Л' => 'l',
                'М' => 'm',
                'Н' => 'n',
                'О' => 'o',
                'П' => 'p',
                'Р' => 'r',
                'С' => 's',
                'Т' => 't',
                'У' => 'u',
                'Ф' => 'ph',
                'Х' => 'h',
                'Ы' => 'y',
                'Э' => 'e',
                'Ь' => '',
                'Ъ' => '',
                'Й' => 'y',
                'Ц' => 'c',
                'Ч' => 'ch',
                'Ш' => 'sh',
                'Щ' => 'sh',
                'Ю' => 'yu',
                'Я' => 'ya'
            )
        );
        $translit = $st2;

        return $translit;
    }


    /**
     * Get product by URL
     * @param $str
     * @return bool|mixed
     *
     */
    function getProductByUrl($str)
    {
        if ($this->connect()) {
            $sql = "SELECT *
                    FROM categories AS c
                    JOIN products AS p ON c.id = p.categories_id
                    WHERE url='$str'
                    ";
            return $this->connect()->query($sql)->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }


    /**
     * Update product
     * @param $urlProduct
     * @return bool
     */
    public function updateProduct($urlProduct)
    {

        if (isset($_POST['update'])) {
            $this->product_name = (isset($_POST['product_name'])) ? $_POST['product_name'] : '';
            $this->description = (isset($_POST['description'])) ? $_POST['description'] : '';
            $this->categories_id = (isset($_POST['categories_id'])) ? $_POST['categories_id'] : '';
            $this->price = (isset($_POST['price'])) ? $_POST['price'] : '';

        }
        $filePath = null;
        if (isset($_FILES)) {
            $filePath = $this->saveImage();
        }
        if ($filePath != null) {
            $product = $this->getProductByUrl($urlProduct);
            if ($product->image) {
                unlink(__DIR__ . '/../../' . $product->image);
            }
        }
        if ($filePath === false) {
            $filePath = $this->getProductByUrl($urlProduct)->image;
        }
        if ($this->connect()) {
            $product_name = strip_tags(trim($this->product_name));
            $description = strip_tags(trim($this->description));
            $categories_id = strip_tags(trim($this->categories_id));
            $price = strip_tags(trim($this->price));

            $sql = "UPDATE products SET product_name='$product_name',description=' $description',
              image='$filePath', categories_id='$categories_id', price='$price'  WHERE url='$urlProduct'";

            return $this->connect()->prepare($sql)->execute();
        } else {
            header('Location:/adminPanel');
            exit;
        }

    }


    /**
     * Delete product
     * @param $url
     * @return bool
     */
    public function deleteProduct($url)
    {

        if ($this->connect()) {
            $sql = "DELETE FROM products WHERE url='$url'";
            return $this->connect()->prepare($sql)->execute();
        }
        return false;
    }


    /**
     * Add category in DB
     * @return bool
     */
    public function insertCategory()
    {
        if (isset($_POST['add'])) {
            $this->title = (isset($_POST['title'])) ? $_POST['title'] : '';
        }
        if ($this->connect()) {
            $sql = "INSERT INTO categories(title)
                    VALUES ( :title )";

            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(':title', strip_tags(trim($this->title)), PDO::PARAM_STR);
            if ($stmt->execute()) {
                header('Location:/adminPanel/categories');
                exit;
            }
        }
        return false;
    }


    /**
     * Get category by title
     * @param $title
     * @return array
     *
     */
    public function getCategoryByTitle($title)
    {
        if ($this->connect()) {
            $sql = "SELECT *
            FROM categories WHERE title='$title'";
            return $this->connect()->query($sql)->fetch(PDO::FETCH_OBJ);
        }
    }


    /**
     * Update category
     * @param $title
     * @return bool
     */
    public function updateCategory($title)
    {

        if (isset($_POST['update'])) {
            $this->title = (isset($_POST['title'])) ? $_POST['title'] : '';
        }
        if ($this->connect()) {
            $titleUp = strip_tags(trim($this->title));

            $sql = "UPDATE categories 
                    SET title='$titleUp'
                    WHERE title='$title'";

            return $this->connect()->prepare($sql)->execute();
        } else {
            header('Location:/adminPanel');
            exit;
        }

    }


    /**
     * Delete category
     * @param $title
     * @return bool
     */
    public function deleteCategory($title)
    {
        if ($this->connect()) {
            $sql = "DELETE FROM categories WHERE title='$title'";
            return $this->connect()->prepare($sql)->execute();
        }
        return false;
    }


    /**
     * Show all users from db
     */
    public function getUsers()
    {
        if ($this->connect()) {
            $sql = "SELECT *
                FROM users
                ";

            return $this->connect()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }
    }


    /**
     * Add users in db
     * @return bool
     */
    public function insertUser()
    {
        if (isset($_POST['add'])) {
            $this->name = (isset($_POST['name'])) ? $_POST['name'] : '';
            $this->last_name = (isset($_POST['last_name'])) ? $_POST['last_name'] : '';
            $this->login = (isset($_POST['ModelLogin'])) ? $_POST['ModelLogin'] : '';
            $this->email = (isset($_POST['email'])) ? $_POST['email'] : '';
            $this->password = (isset($_POST['password'])) ? $_POST['password'] : '';
        }

        if ($this->connect()) {
            $userRole = 3;
            $password = md5($this->password);

            $sql = "INSERT INTO users(name, last_name, login , email , password, role)
        VALUES ( :name, :last_name , :login , :email , :password , :role)";

            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $this->last_name, PDO::PARAM_STR);
            $stmt->bindParam(':login', $this->login, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':role', $userRole, PDO::PARAM_STR);
            if ($stmt->execute()) {
                header('Location:/adminPanel/users');
            }


        }
        return false;
    }


    /**
     *  Delete user from db
     * @param $id
     * @return bool
     */
    public function deleteUser($id)
    {

        if ($this->connect()) {
            $sql = "DELETE FROM users WHERE id=$id";

            return $this->connect()->prepare($sql)->execute();
        }

        return false;
    }


    /**
     * Update users role
     * @param $id
     * @return bool
     */
    public function updateRole($id)
    {

        if (isset($_POST['updateRole'])) {
            $this->userRole = (isset($_POST['role'])) ? $_POST['role'] : '';
        }
        if ($this->connect()) {
            $role = $this->userRole;

            $sql = "UPDATE users SET role=$role WHERE id='$id'";

            return $this->connect()->prepare($sql)->execute();
        } else {
            header("Location : /");
            exit;
        }

    }


    /**
     * Get user by id
     * @param $id
     * @return array
     */
    public function getUser($id)
    {

        if ($this->connect()) {
            $sql = "SELECT *
            FROM users WHERE id='$id'";
            return $this->connect()->query($sql)->fetch(PDO::FETCH_OBJ);
        }
    }


    /**
     * Show error message
     * @return bool
     */
    function getErrorMessage()
    {
        return $_SESSION['error_message'] ?? false;
    }

}
