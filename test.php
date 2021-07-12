<?php
//echo password_hash('123456',PASSWORD_DEFAULT);
require 'connection.php';
$query    = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM adminonline WHERE (email = 'superadmin' OR username = 'superadmin') "));
echo $query['id'];
?>