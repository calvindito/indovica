<?php
session_start();
require 'connection.php';

$name     = $_POST['fullname'];
$phone    = $_POST['phone'];
$username = $_POST['username'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$query    = mysqli_query($conn, "INSERT INTO customeronline VALUES ('', '$name', '$email', '$username', '$password', '$phone','')");

if($query) {
    $customer_id = mysqli_insert_id($conn);
    mysqli_query($conn, "UPDATE cart SET customer_id = '$customer_id' WHERE customer_id = '$session_id'");

    $_SESSION['id']       = $customer_id;
    $_SESSION['name']     = $name;
    $_SESSION['phone']  = $phone;
    $_SESSION['username'] = $username;
    $_SESSION['email']    = $email;
    echo '<script>alert("Success!")</script>';
    echo '<script>document.location.href="index.php"</script>';
} else {
    echo '<script>alert("Failed!")</script>';
    echo '<script>document.location.href="index.php"</script>';
}