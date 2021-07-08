<?php
session_start();
require '../connection.php';
if(isset($_POST['agree'])){
    $name     = $_POST['fullname'];
    $phone    = $_POST['phone'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $address    = $_POST['address'];
    $bank    = $_POST['bank'];
    $rekening = $_POST['rekening'];
    $address    = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query    = mysqli_query($conn, "INSERT INTO `adminonline` VALUES ('', '$name', '$username', '$password','$email', '$phone','$address','$bank','$rekening','vendor')");
    
    if($query) {
        $admin_id = mysqli_insert_id($conn);
        $_SESSION['id']       = $admin_id;
        $_SESSION['name']     = $name;
        $_SESSION['phone']  = $phone;
        $_SESSION['username'] = $username;
        $_SESSION['email']    = $email;
        $_SESSION['role']    = 'vendor';
        
        echo '<script>alert("Registrasi berhasil!")</script>';
        echo '<script>document.location.href="index.php"</script>';
    } else {
        echo '<script>alert("Registrasi gagal!")</script>';
        echo '<script>document.location.href="index.php"</script>';
    }
}else{
    echo '<script>alert("Please confirm that you agree with the Terms & Conditions!")</script>';
    echo '<script>document.location.href="index.php"</script>';
}