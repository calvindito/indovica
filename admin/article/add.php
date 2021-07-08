<?php
require '../../connection.php';

$editor= $_POST['editor-full'];

$date= $_POST['date'];

$title= $_POST['title'];

$author= $_POST['author'];


if($_POST['id_article'] > 0){
   
    $id_article = $_POST['id_article'];
    $query = mysqli_query($conn,"UPDATE article set date = '$date', title = '$title', content = '$editor' , author='$author' where id = $id_article");
 
}else{
    
$query    = mysqli_query($conn, "INSERT INTO `article` VALUES ('', '$date', '$title', '$editor','$author')");

}

if($query) {

    echo '<script>alert("Success!")</script>';
    echo '<script>document.location.href="index.php"</script>';
} else {

    echo '<script>alert("Failed!")</script>';
    echo '<script>document.location.href="index.php"</script>';
}