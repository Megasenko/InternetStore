<?php

class Model
{

    /**
     * connect to DB
     * @return PDO
     */
    public function connect()
    {
        return new PDO(
            'mysql:host=' . HOST . ';
                        dbname=' . DB_NAME . ';
                        charset=' . CHARSET,
                        USER,
                        PASSWORD
        );
    }


    /**
     * Save downloaded image (only .jpeg and .png) and return image path.
     * @return bool
     */
    protected function saveImage()
    {
        if (!isset($_FILES)) {
            return false;
        }
        $uploadsDir = __DIR__ . '/../../uploads';
        if (!file_exists($uploadsDir)) {
            mkdir($uploadsDir, 777, true);
        }
        foreach ($_FILES as $file) {
            if ($file['type'] != 'image/jpeg' && $file['type'] != 'image/png') {
                return false;
            }
            $dateTime = new DateTime();
            $name = (string)$dateTime->getTimestamp();
            $explodeName = explode('.', $file['name']);
            $result = move_uploaded_file($file['tmp_name'], $uploadsDir . '/' . $name . '.' . end($explodeName));
            if ($result) {
                return '/uploads/' . $name . '.' . end($explodeName);
            }
        }
    }


    /**
     * Get differents titles on page
     * @return string
     */
    static function getTitle()
    {
        $url = explode('.', $_SERVER['REQUEST_URI']);
        $str = substr($url[0], 1);
        if ($str) {
            return 'My Internet Store - ' . ucfirst($str);
        } else {
            return 'My Internet Store';
        }
    }


    /**
     * Get category in sidebar
     * @return array
     */
    public function getCategories(){
        $sql= "SELECT * 
               FROM categories";
        return $this->connect()->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }
}