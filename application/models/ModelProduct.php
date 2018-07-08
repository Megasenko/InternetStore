<?php

class ModelProduct extends Model
{

    /**
     * Get products by category
     * @param $category
     * @return array|bool
     */
    public function getProducts($category)
    {
        if ($this->connect()) {
            $sql = "SELECT *
                    FROM categories AS c
                    JOIN products AS p ON c.id = p.categories_id
                    WHERE   c.title='$category'";
            return $this->connect()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }


    /**
     * Get product by URL
     * @param $url
     * @return bool|mixed
     */
    public function getProductByUrl($url)
    {
        if ($this->connect()) {
            $sql = "SELECT *
                    FROM categories AS c
                    JOIN products AS p ON c.id = p.categories_id
                    WHERE url='$url'
                    ";
            return $this->connect()->query($sql)->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }


    /**
     * Send order on mail
     * @return string
     */
    public function sendOrder()
    {
        if (isset($_POST["order"])) {
            $to = 'admin@gmail.ru';
            $product_name = htmlspecialchars($_POST["product_name"]);
            $price = htmlspecialchars($_POST["price"]);
            $category = htmlspecialchars($_POST["category"]);
            $from = htmlspecialchars($_POST["email"]);
            $messageOrder = htmlspecialchars($_POST["message"]);

            $headers = "From: $from\r\nReply-to: $from\r\nContent-type:text/plain; charset=utf-8\r\n";
            $subject = 'Заказ с сайта';
            $message = "Заказ: $product_name\r\n$category\r\n$price\r\n$messageOrder";
            mail($to, $subject, $message, $headers);
//  На локальном сервере не отправляется письмо , поэтому сделал имитацию отправки
            return "Спасибо , Ваш заказ успешно отправлен администратору ";
        }
        return 'Возникла проблема и Ваш заказ не отправлен';
    }

}