<?php
require '../../connection.php';

$editor_eng= $_POST['editor-eng'];
$editor_ind= $_POST['editor-ind'];

$title_ind= $_POST['title_ind'];
$title_eng= $_POST['title_eng'];
$type = $_POST['type'];



$sql = mysqli_query($conn, "SELECT * FROM config where type = '$type'");
if(mysqli_num_rows($sql) > 0){
    $query = mysqli_query($conn,"UPDATE config set title_eng = '$title_eng', title_ind = '$title_ind', english = '$editor_eng' , indonesia='$editor_ind' where type = '$type'");
}else{    
$query    = mysqli_query($conn, "INSERT INTO `config` VALUES ('', '$type', '$title_eng', '$title_ind','$editor_eng','$editor_ind')");
}

if($type == 'term-umum'){
    $type = 'term2';   
}elseif($type == 'term-mutlak'){
    $type = 'term1';
}
if($query) {
    echo '<script>alert("Success!")</script>';
    echo '<script>document.location.href="'.$type.'.php"</script>';
} else {
    echo '<script>alert("Failed!")</script>';
    echo '<script>document.location.href="'.$type.'.php"</script>';

}