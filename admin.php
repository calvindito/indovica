<?php
require 'connection.php';
include 'generatetoken/generatejwt.php';
session_start();
  $tipe = $_POST['tipe'];
  if($tipe == "matchlogin")
  {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $encodepassword = base64_encode($password);
      $stmt = $conn->prepare('SELECT * FROM admin WHERE username = ? and password = ?');
      $stmt->bind_param("ss", $username, $encodepassword);
        $stmt->execute();

        $result = $stmt->get_result();
        if($result->num_rows>0)
        {
            while ($row = $result->fetch_assoc()) {
                echo "sukses";
             }
        }
        else{
                echo "gagal";
        }
        $_SESSION["status"] = "ok";
       
  }
  else if($tipe == "submitterm")
  {
    date_default_timezone_set("Asia/Jakarta");
    $iduser = $_POST['iduser'];
    $tanggal = date("Y-m-d H:i:s"); 
    $stmt = $conn->prepare("INSERT INTO termrecord values(NULL, ?, ?)");
    $stmt->bind_param("ss", $iduser, $tanggal);
    $stmt->execute();
  }
  else if($tipe == "buatuser")
  {
    date_default_timezone_set("Asia/Jakarta");
    $nama = $_POST['Nama'];
    $email = $_POST['email'];
    $jeniskartu = $_POST['jeniskartu'];
    // $passpowrt = $_POST['passport'];
    $nohp = $_POST['nohp'];
    if($email == "")
    {
      $stringemail = "-";
    }
    else{
      $stringemail = $email;
    }
    if($nohp == "")
    {
      $stringhp = "-";
    }
    else{
      $stringhp = $nohp;
    }
      $countfiles = count($_FILES['fotopassports']['name']);
    $allfilepassport = "";
    for($i=0;$i<$countfiles;$i++)
    {
      $filename = $_FILES['fotopassports']['name'][$i];
      if($i == ($countfiles-1))
      {
        $allfilepassport .= $filename;
      }
      else{
        $allfilepassport .= $filename.",";
      }
     
        move_uploaded_file($_FILES['fotopassports']['tmp_name'][$i],'foto/'.$filename);
      
    
    }
    $encodepassport = base64_encode($allfilepassport);

    $countfilesbarang = count($_FILES['fotobarang']['name']);
    $allfilbarang = "";
    for($i=0;$i<$countfilesbarang;$i++)
    {
      $filename = $_FILES['fotobarang']['name'][$i];
      if($i == ($countfilesbarang-1))
      {
        $allfilbarang .= $filename;
      }
      else{
        $allfilbarang .= $filename.",";
      }
     
        move_uploaded_file($_FILES['fotobarang']['tmp_name'][$i],'foto/'.$filename);
      
    
    }
    $encodebarang = base64_encode($allfilbarang);
    $totalnominalcicilan = $_POST['totalnominalcicilan'];
    $totalnominalcicilan	= preg_replace('/\D/','',$totalnominalcicilan);
    $kuantiticicilan =  $_POST['kuantiticicilan'];
    $cicilan=$_POST['cicilan'];
    
    $nokartu = $_POST['nomorkartu'];
    $expiredmonth = $_POST['expiredmonth'];
    $expiredyear = $_POST['expiredyear'];

    

      $countfileskartu = count($_FILES['fotokartu']['name']);
    
    $allfilekartu = "";
    for($i=0;$i<$countfileskartu;$i++)
    {
      $filename = $_FILES['fotokartu']['name'][$i];
      if($i == ($countfileskartu-1))
      {
        $allfilekartu .= $filename;
      }
      else{
        $allfilekartu .= $filename.",";
      }
     move_uploaded_file($_FILES['fotokartu']['tmp_name'][$i],"foto/".$filename);
      
    }
    $encodekartu = base64_encode($allfilekartu);
    $encodenokartu = base64_encode($nokartu);
    $encodenotelp = base64_encode($stringhp);
      $stmt = $conn->prepare("INSERT INTO customer values(NULL, ?, ?, ?, ? ,?, ?, ?, ?, ?, NULL)");
      $stmt->bind_param("sssssssss", $nama, $encodepassport, $encodekartu, $jeniskartu, $encodenokartu, $expiredmonth, $expiredyear, $stringemail, $encodenotelp);
      $stmt->execute();
      if ( false===$stmt ) {
        echo $stmt->error;
        
      }
      else{

       
        $myid = $stmt->insert_id;
        echo "Sukses Kode Yang terbuat : <br> ";
        $mykey = "";
        $mykey = getkey($myid);
        date_default_timezone_set("Asia/Jakarta");
        $dates = date("Y-m-d");
        // INSERT INTO `transaksi` VALUES (NULL, '63', '2020-02-02', '3000000', '0', 'asdasdasdasd');
        $stmtinsert = $conn->prepare("INSERT INTO transaksi values (NULL, ?, ?, ?, 0, ?)");
          $stmtinsert->bind_param("ssss", $myid, $dates, $totalnominalcicilan, $encodebarang);
          $stmtinsert->execute();
        $idtransaksi = $stmtinsert->insert_id;
        $j = 1;
        for($i = 0 ; $i < $kuantiticicilan; $i++)
        {
          $cicilani = preg_replace('/\D/','', $cicilan[$i]);
          $stmtinsertdetail = $conn->prepare("INSERT INTO detailtransaksi values(NULL, ?, ?, ?, NULL, 'Belum Lunas')");
          $stmtinsertdetail->bind_param("sis", $idtransaksi, $j, $cicilani);
          $stmtinsertdetail->execute();
          $j +=1;
        }

        $keyuntukclient = base64_encode($mykey);
          $stmts = $conn->prepare("INSERT into token values (NULL,?)");
          $stmts->bind_param("s", $mykey);
          $stmts->execute();
          echo $keyuntukclient;
    
      }
    
 
    
    // echo "\nraw = ".$allfilepassport;
    // $encodepassport = base64_encode($allfilekartu);
    // echo "\nEncode = ".$encodepassport;
    // $decodepassport = base64_decode($encodepassport);
    // echo "decode = ".$decodepassport. "\n";

  }
  
?>