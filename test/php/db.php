<?php
$host = 'localhost';
$user = 'root';
$password = 'P@ssW0RDXIC3';
$dbname = 'abc';
$message = '';

try {
    $conn = new mysqli($host, $user, $password, '', 3308);
    $conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
    mysqli_select_db($conn, $dbname);

    $conn->query("CREATE TABLE IF NOT EXISTS `categories` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(100) NOT NULL,
        `status` VARCHAR(100) NOT NULL,
        `quantity` INT(11) default 0,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Handle form submission for adding/updating categories
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $status = $_POST['status'];
        $quantity = $_POST['quantity'];

        if (isset($_POST['id']) && $_POST['id'] != '') {
            $id = $_POST['id'];
            $conn->query("UPDATE categories SET name='$name', status='$status', quantity='$quantity' WHERE id=$id");
        } else {
            $conn->query("INSERT INTO categories (name, status, quantity) VALUES ('$name', '$status', '$quantity')");
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    // Handle edit request
    $editData = null;
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $editResult = $conn->query("SELECT * FROM categories WHERE id = $id");
        $editData = $editResult->fetch_assoc();
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $conn->query("DELETE FROM categories WHERE id = $id");
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }


} catch (\Throwable $th) {
    $message = "Connection failed: " . $th->getMessage();
}
?>