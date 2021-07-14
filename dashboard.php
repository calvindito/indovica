<!DOCTYPE html>
<html>

<head>
    <?php
    include 'exception.php';
    include 'generatetoken/checktokenonpage.php';
    include 'generatetoken/getinfouser.php';
    
?>
    <style>
        .stylebold {
            font-weight: bold;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle;
        }

        .btn span.glyphicon {
            opacity: 0;
        }

        .btn.active span.glyphicon {
            opacity: 1;
        }

        #bodyterm {
            height: 50vh;
            overflow-y: auto;
        }
     
    </style>
    <link rel="icon" href="logo/logovica.png">
    <title>Dashboard - Indovica</title>

</head>

<body>
    <?php
 if(isset($_GET['token']))
 {
    date_default_timezone_set("Asia/Jakarta");
    $tokeninput = $_GET['token'];
    $resultcheck = checktokenonmypage($tokeninput);
    
    if($resultcheck == "sukses")
    {
    $token = base64_decode($tokeninput);
    $tokenparts = explode('.', $token);
    $payload = base64_decode($tokenparts[1]);
    $expired = json_decode($payload)->exp;
    $userid = json_decode($payload)->user_id;
    $myresultdata = getinfo($userid);
   
    $arr = json_decode($myresultdata, true);
    $iduser = $arr[0]['id'];
    $namauser = $arr[0]['namauser'];
    $email = $arr[0]['email'];
    $notelp = $arr[0]['notelp'];
    $jeniskartu = $arr[0]['jeniskartu'];
    $nokartu = $arr[0]['nomerkartu'];
        // echo "<h1>WOI</h1>";
    ?>
    <input type='hidden' value='<?php echo $iduser;?>' id="iduser">
    <input type='hidden' value='<?php  $newstring = substr(base64_decode($nokartu), -4); echo $newstring;?>'
        id="datakartu">
    <!-- Modal kartu -->
    <div class="modal fade" id="modalkartu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <img src="logo/logovica.png" style="max-width:150px;">
                    <h5 class="modal-title" style = "margin-left:20px; font-weight:bold; color:#a33c34;">Masukkan Password Anda</h5>

                </div>

                <div class="modal-body" >
                    <div class="form-group" style = "padding:20px;">
                        
                            <input type="text" maxlength="4" class="form-control input-lg" name="nokartulogin"
                                id="nokartulogin" value="" onkeypress="return isNumberKey(event)" id="nokartu" required>
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Confirm" onclick="check()"  style = "margin-right:20px; background-color:#731f18; color:white; padding:5px; border-radius:10px; width:100px;">
                </div>

            </div>
        </div>
    </div>
    <!-- Modal T&C -->
    <!-- Modal -->
    <div class="modal fade" id="termcondition" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <img src="logo/logovica.png" style="max-width:150px;">
                        <h3 class="modal-title" id="exampleModalScrollableTitle" style="margin-left:20px;"> Term &
                            Condition</h3>

                    </div>
                    <div class="modal-body">

                        <div id=bodyterm style="padding-left:20px;">
                            <p class="stylebold">
                                KETENTUAN DAN PERSYARATAN KHUSUS :
                            </p>
                            <p class="stylebold">
                                SPECIFIC TERMS AND CONDITIONS :
                            </p>
                            Situs VICA Online disediakan hanya untuk keperluan bisnis pada umumnya, dengan taat
                            sepenuhnya pada norma hokum secara universal, tidak diperuntukkan untuk kepentingan negatif.
                            <br> <br>
                            <p>

                                <i>
                                    The VICA Web Online is provided only for business purposes in general, in full
                                    compliance
                                    with universal legal norms, not intended for negative purposes.
                                </i>
                            </p>
                            <p>
                                Situs VICA Online tidak menerima produk/barang hasil pencurian atau hasil penipuan dari
                                milik pihak lain yang sah.
                                Pemilik produk & barang harus menandatangani Surat Pernyataan tentang pengakuan
                                kepemilikan
                                yang sah.
                                Untuk itu, jika dikemudian hari ditemukan fakta pelanggaran seperti yang dimaksud pada
                                Ketentuan dan Persyaratan Khusus ini, maka hal tersebut menjadi tanggung jawab penuh
                                pihak
                                yang mengaku sebagai pemilik produk/barang.
                                <br> <br>
                                <i>
                                    The VICA Web Online does not accept products / goods resulting from theft or fraud
                                    from
                                    other legitimate parties.
                                    The owner of the product & goods must sign a Declaration Letter regarding the
                                    recognition of
                                    legal ownership.
                                    For this reason, if in the future there are facts of violations as referred to in
                                    these
                                    Special Terms and Conditions, then it is the full responsibility of the party who
                                    claims to
                                    be the owner of the product / goods.
                                </i>
                            </p>

                            <p>
                                Situs VICA Online tidak menerima pembayaran dari pembeli dengan menggunakan dana hasil
                                pencurian dalam bentuk apapun atau dana hasil penjualan narkoba atau dana hasil
                                penjualan
                                senjata atau dana hasil tindak kejahatan lainnya yang berlaku secara universal.
                                Untuk itu, jika dikemudian hari ditemukan fakta pelanggaran seperti yang dimaksud pada
                                Ketentuan dan Persyaratan Khusus ini, maka hal tersebut menjadi tanggung jawab penuh
                                pihak
                                yang mengaku sebagai pembeli yang membayar menggunakan dana milik pribadi yang sah.
                                <i> <br> <br>
                                    The VICA Web Online does not accept payments from buyers using theft proceeds in any
                                    form or
                                    funds from drug sales or funds from sales of weapons or funds from other crimes that
                                    are
                                    universally applicable.
                                    For this reason, if in the future there are facts of violations as referred to in
                                    these
                                    Special Terms and Conditions, it is the full responsibility of the party claiming to
                                    be the
                                    buyer who paid using legitimate personal funds.
                                </i>
                            </p>
                            <p class="stylebold">
                                Situs VICA Online tidak terlibat dan tidak bertanggung jawab atas segala tindak
                                kejahatan
                                yang dilakukan oleh pihak yang mengaku sebagai pemilik sah barang/produk atau juga oleh
                                pihak pembeli yang mengaku membeli dan membayar dengan dana milik pribadi yang sah.
                                <i> <br> <br>
                                    The VICA Web Online is not involved and is not responsible for any crime committed
                                    by
                                    parties claiming to be the legitimate owner of the goods / products or also by
                                    buyers who
                                    claim to buy and pay with legitimate personal funds.
                                </i>
                            </p>
                            <p class="stylebold">
                                KETENTUAN DAN PERSYARATAN MUTLAK :
                            </p>
                            <p class="stylebold">
                                ABSOLUTE TERMS AND CONDITIONS :
                            </p>
                            <ul>
                                <p>
                                    <li class="stylebold">Tentang identitas dan alat pembayaran.</li>
                                </p>
                                Sebelum melanjutkan ke tahap pembelian, pihak pembeli harus menyerahkan / mengirimkan ke
                                pihak VICA identitas pembeli yang masih berlaku (foto / gambar paspor atau Kartu Tanda
                                Pengenal lainnya), serta identitas alat pembayaran yang masih berlaku (foto / gambar
                                Kartu
                                Kredit atau Kartu debit).
                                Tanpa menyerahkan / mengirimkan kedua identitas tersebut, pihak VICA berhak untuk tidak
                                melayani dan tidak melanjutkan transaksi ke tahap selanjutnya.
                                <br><br>
                                <p class="stylebold"> About identity and payment instruments.</p>
                                <i>
                                    Before proceeding to the purchase stage, the buyer must submit / send to VICA a
                                    valid
                                    identity of the buyer (photo / image of a passport or other ID card), as well as a
                                    valid
                                    identity of the payment instrument (photo / image of a credit card or debit card).
                                    Without submitting / sending both identities, VICA has the right not to serve and
                                    not
                                    continue the transaction to the next stage.
                                </i>

                                <p>
                                    <li class="stylebold">Tentang barang/produk</li>
                                </p>
                                Barang/produk yang dibeli dipastikan sudah dilihat sendiri secara virtual atau langsung
                                oleh
                                pembeli atau dilihat secara virtual atau langsung dan dinilai oleh kurator yang
                                ditentukan/ditunjuk oleh pembeli atau dilihat secara virtual atau langsung dan dinilai
                                oleh
                                tenaga ahli dibidangnya yang ditentukan/ditunjuk oleh pembeli dan atau dilihat secara
                                virtual atau langsung dan dinilai oleh pihak lain yang ditentukan/ditunjuk oleh pembeli.
                                <br><br>
                                <p class="stylebold">About goods / products.</p>
                                <i>
                                    The goods / products purchased are confirmed to have been seen by themselves
                                    virtually or
                                    directly by the buyer or seen virtually or directly and assessed by a curator who is
                                    determined / appointed by the buyer or seen virtually or directly and assessed by
                                    experts in
                                    their field who are determined / appointed by the buyer and or viewed virtually or
                                    directly
                                    and assessed by other parties determined / appointed by the buyer.
                                </i>
                                <p>
                                    <li class="stylebold">Tentang kurator, tenaga ahli dibidangnya dan pihak lain.</li>
                                </p>
                                Adalah merupakan hak sepenuhnya dari pembeli tanpa keterlibatan pihak VICA, dengan
                                demikian
                                segala biaya dan hal lain yang ditimbulkan menjadi tanggung jawab penuh dan kewajiban
                                pihak
                                pembeli untuk menyelesaikannya.
                                <br><br>
                                <p class="stylebold">Regarding curators, experts in their fields and other parties.</p>
                                <i> It is the full right of the buyer without the involvement of the VICA, thus all
                                    costs and
                                    other things incurred are the full responsibility and obligation of the buyer to
                                    resolve
                                    them.</i>
                                <p>
                                    <li class="stylebold">Tentang harga</li>
                                </p>
                                Harga yang berlaku adalah sesuai penawaran resmi di laman Website VICA Online atau
                                melalui
                                Surat Penawaran khusus yang dikirim melalui email resmi vica.wolrd.
                                <br><br>
                                <p class="stylebold">About the price</p>
                                <i>The applicable price is according to the official offer on the VICA Online Website
                                    page or
                                    through a special offer letter sent via the official vica.wolrd email.</i>


                                Harga barang/produk sudah termasuk pajak penjualan yang berlaku resmi di Indonesia.
                                <i>The price of goods / products includes sales tax that is legally valid in
                                    Indonesia.</i>
                                <p>
                                    <li class="stylebold">Tentang pembayaran</li>
                                </p>
                                Pembayaran tunai atau angsuran tahap kesatu sudah harus dilaksanakan paling lambat 24
                                jam
                                setelah persetujuan pembelian.
                                Jika melebihi dari batas waktu 24 jam, maka pembelian dianggap tidak jadi.
                                <br>
                                Pembayaran hanya bisa atau dimungkinkan menggunakan mata uang Rupiah (IDR) atau Dollar
                                (USD)
                                atau Euro dan hanya menggunakan jalur resmi Situs VICA Online.
                                <br><br>
                                <p class="stylebold">About payment.</p>
                                <i>Payment in cash or first stage installments must be made no later than 24 hours after
                                    purchase approval.
                                    If exceed the time limit of 24 hours, the purchase is considered invalid.

                                    Payment can only or is possible in Rupiah (IDR) or Dollar (USD) or Euro and only
                                    using the
                                    official VICA Web Online channel.
                                </i>
                                <br><br>
                                Pembayaran dianggap sah setelah dana dari pembeli telah diterima di rekening bank resmi
                                milik/atas nama VICA.
                                <br>
                                <i>
                                    Payment is deemed valid after the funds from the buyer have been received in the
                                    official
                                    bank account owned / in the name of VICA.
                                </i>
                                <p>
                                    <li class="stylebold"> Tentang pembatalan pembelian</li>
                                </p>
                                Barang/produk yang sudah dibeli, baik dengan cara pembayaran tunai atau cicilan, tidak
                                dapat
                                dibatalkan begitu saja. Dan jika benar terjadi pembatalan atau gagal bayar, maka
                                konsekuensi
                                bagi pembeli adalah denda dengan pemotongan sebesar 60% (enam puluh persen) dari jumlah
                                yang
                                sudah dibayarkan.<br>
                                Untuk itu, pihak VICA wajib mengembalikan sisa dana pembayaran ke pihak pembeli
                                selambat-lambatnya dalam waktu 6 (enam) hari kerja.
                                <br><br>
                                <p class="stylebold"> About cancellation of purchases</p>
                                <i>Goods / products that have been purchased, either by cash or in installments, cannot
                                    be
                                    canceled just like that. And if it is true that there is a cancellation or default,
                                    then the
                                    consequence for the buyer is a fine with a deduction of 60% (sixty percent) of the
                                    amount
                                    already paid.<br>
                                    For this reason, VICA is obliged to return the remaining payment funds to the buyer
                                    at the
                                    latest within 6 (six) working days.</i>
                                <p>
                                    <li class="stylebold">
                                        Tentang pengiriman dan asuransi barang/produk.</li>
                                </p>
                                Setelah pembayaran dari pembeli dianggap lunas dan sah sesuai ketentuan, maka dalam
                                waktu
                                tidak lebih dari 24 jam, pihak VICA wajib memberitahukan secara resmi pada pihak pemilik
                                barang/produk dan pihak pembeli.
                                <br><br>
                                <p class="stylebold">About shipping and insurance of goods / products</p>
                                <i>
                                    After the payment from the buyer is considered in full and legal according to the
                                    provisions, then in no more than 24 hours, the VICA is obliged to officially notify
                                    the
                                    owner of the goods / product and the buyer.
                                </i>
                                <br><br>
                                Pengiriman barang/produk dilaksanakan langsung oleh pihak pemilik atas kesepakatan
                                dengan
                                pembeli dalam waktu tidak lebih dari 2 (dua) hari kerja, terhitung sejak pemberitahuan
                                resmi
                                dari pihak VICA.<br>
                                <i><br>
                                    Delivery of goods / products is carried out directly by the owner on an agreement
                                    with the
                                    buyer within 2 (two) working days, starting from the official notification from
                                    VICA.
                                </i>
                                <br><br>
                                Barang/produk harus dikirim menggunakan perusahaan jasa pengiriman barang yang
                                professional
                                dan berstandar internasional.
                                <br><br>
                                <i>
                                    Goods / products must be sent using a professional freight forwarder and
                                    international
                                    standard.
                                </i>
                                <br><br>
                                Barang/produk yang dikirim harus diasuransikan.
                                <br><br>
                                <i>Goods / products sent must be insured.</i>
                                <br><br>
                                Barang/produk yang dikirim harus sesuai dengan apa yang ditawarkan di laman resmi Situs
                                VICA
                                Online yang secara sah data dan spesifikasinya diberikan oleh pihak pemilik
                                barang/produk
                                kepada pihak VICA.
                                <br><br>
                                <i>
                                    The goods / products sent must be in accordance with what is offered on the official
                                    of the
                                    VICA Web Online, where data and specifications are legally provided by the owner of
                                    the
                                    goods / products to VICA.
                                </i>
                                <br><br>
                                Ketidak sesuaian barang/produk yang dikirim oleh pihak pemilik ke pihak pembeli,
                                merupakan
                                tidakan melawan hokum.
                                Hal tersebut sepenuhnya menjadi tanggung jawab pihak pemilik barang/produk.
                                <br><br>
                                <i>
                                    The non-conformity of goods / products sent by the owner to the buyer is an act
                                    against the
                                    law.
                                    This is entirely the responsibility of the owner of the goods / product.
                                </i>
                                <br><br>
                                Segala biaya pengiriman dan biaya asuransi menjadi tanggungan sepenuhnya oleh pihak
                                pembeli
                                yang telah dibayar lunas sebelum barang/produk dikirim.
                                <br><br>
                                </i>
                                All shipping costs and insurance costs are fully borne by the buyer who has been paid in
                                full before the goods / products are shipped.
                                </i>
                            </ul>
                        </div>

                        <br>
                        <div>
                            <input class="form-check-input" name="test" type="checkbox" id="checkagree" required
                                style="margin-left:20px;" checked = "false"> I agree to the
                            <b>terms of
                                condition</b>
                        </div>
                    </div>




                    <div class="modal-footer">
                        <input type="button" class="btn btn-info" value="Continue" onclick="submitterm()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <input type="hidden" value="<?php echo $expired; ?>" id="expired">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 bhoechie-tab-container">
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item active text-center">
                            <h4 class="glyphicon glyphicon-info-sign"></h4><br />Info Cicilan
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="glyphicon glyphicon-user"></h4><br /> Info Profil
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="glyphicon glyphicon-time"></h4><br /> <span id="timer"> Timer </span>
                        </a>
                        <!-- <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-home"></h4><br/>Hotel
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-cutlery"></h4><br/>Restaurant
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-credit-card"></h4><br/>Credit Card
                </a> -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                    <!-- flight section -->
                    <div class="bhoechie-tab-content active">
                        <h1>Info Cicilan</h1>

                        <h4>Total Cicilan</h4>
                        <form method="POST" enctype='multipart/form-data' id="formbuatuser">
                            <div class="form-group">
                                <table id="table_id" class="table table-striped table-bordered"
                                    style="width:98%; text-align:center; vertical-align: middle;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Cicilan Ke</th>
                                            <th>Nominal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for($i = 0 ; $i < count($arr); $i++)
                                    {
                                        $j = 1;
                                        ?>
                                        <tr>
                                            <td><?php echo $arr[$i]['cicilanke'];?></td>
                                            <td><?php echo number_format($arr[$i]['nominalcicilan']);?></td>

                                            <?php if($arr[$i]['statuscicilan'] == "Belum Lunas")
                                            {
                                                
                                            ?>
                                            <th class="text-danger"> <span class="glyphicon glyphicon-remove-sign">
                                                </span> &nbsp<?php echo $arr[$i]['statuscicilan']; ?></th>

                                            <?php 
                                        }
                                        else{
                                            ?>
                                            <th class="text-success"> <span class="glyphicon glyphicon-check">
                                                </span> &nbsp<?php echo $arr[$i]['statuscicilan']; ?></th>'
                                            <?php
                                        }
                                        ?>
                                            <td>

                                                <?php if($arr[$i]['statuscicilan'] == "Belum Lunas"){
                                                    ?>
                                                    <a href="testpaypal.php?kode=<?=$arr[$i]['iddetail']?>" class="btn btn-success"
                                                    style="width:100%;">Bayar</a>
                                                <?php
                                                    }
                                                    else{
                                                        echo '';
                                                    }
                                                    ?>
                                            </td>
                                        </tr>

                                        <?php
                                        $j++;
                                    }
                                        ?>
                                    </tbody>
                                </table>
                            </div>


                        </form>
                    </div>


                    <!-- train section -->
                    <div class="bhoechie-tab-content">
                        <h1>Buat Kode Unik</h1>
                        <h3>Pilih data user yang akan dibuatkan kode</h3>
                        <div class="form-group">
                            <b>
                                <h4>Nama User</h4>
                            </b>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="text" class="form-control input-lg" name="nomorcvc"
                                    onkeypress="return isNumberKey(event)" value="<?php echo $namauser;?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <b>
                                <h4>Email User</h4>
                            </b>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="text" class="form-control input-lg" name="email"
                                    onkeypress="return isNumberKey(event)" value="<?php echo $email;?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <b>
                                <h4>Telp User</h4>
                            </b>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="text" class="form-control input-lg" name="telp"
                                    onkeypress="return isNumberKey(event)" value="<?php echo base64_decode($notelp);?>"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <b>
                                <h4>Jenis Kartu</h4>
                            </b>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="text" class="form-control input-lg" name="email"
                                    onkeypress="return isNumberKey(event)" value="<?php echo $jeniskartu;?>" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- hotel search -->
                    <div class="bhoechie-tab-content">
                        <center>
                            <h1 class="glyphicon glyphicon-time" style="font-size:12em;color:#55518a"></h1>
                            <h2 style="margin-top: 0;color:#55518a">Remaining Time</h2>
                            <h3 style="margin-top: 0;color:#55518a"><span id="time">-</span></h3>
                        </center>
                    </div>
                    <div class="bhoechie-tab-content">
                        <center>
                            <h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
                            <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                            <h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
                        </center>
                    </div>
                    <div class="bhoechie-tab-content">
                        <center>
                            <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
                            <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                            <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    }
    else if($resultcheck == "none"){
        echo "<script> Swal.fire({
            icon: 'error',
            title: 'Token is not exists',
            allowOutsideClick: false,
            text: 'Token tidak ditemukan ',
        }).then(function() {
            window.location.href = 'home.php';
        });  
    </script>";
    
    }
    else{
        
        echo "<script> Swal.fire({
            icon: 'error',
            title: 'Token Expired',
            allowOutsideClick: false,
            text: 'Token telah expired',
        }).then(function() {
            window.location.href = 'home.php';
        });  
      </script>";
    }
 }
 else{
     echo "<script> Swal.fire({
        icon: 'error',
        title: 'No Token Detected',
        allowOutsideClick: false,
        text: 'Tidak ada token terdeteksi',
    }).then(function() {
        window.location.href = 'home.php';
    });  
</script>";
 }
?>
</body>

</html>
<script>
    $('.checkagree').prop('checked', false);
    $("#termcondition").modal({
        show: false,
        backdrop: 'static',
        keyboard: false
    });

    $("#modalkartu").modal({
        show: true,
        backdrop: 'static',
        keyboard: false
    });
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    };

    function submitterm() {
        var idusersekarang = $("#iduser").val();
        var check = $("#checkagree");

        // alert(idusersekarang);
        // $("#termcondition").modal('hide');$("#modalkartu").modal('hide');
            if ($("#checkagree").prop("checked") == true) {
                console.log("Checkbox is checked.");
                Swal.fire(
                            'HELLO',
                            'Selamat Datang di Member Indovica',
                            'success'
                        )
                request = $.ajax({
                    url: "admin.php",
                    type: "POST",
                    data: {
                        iduser: idusersekarang,
                        tipe: "submitterm"
                    },
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        Swal.fire(
                            'HELLO',
                            'Welcome to vica membership',
                            'success'
                        )
                        $("#termcondition").modal('hide');
                        $("#modalkartu").modal('hide');

                    },
                    
                });
            } else if ($("#checkagree").prop("checked") == false) {
                console.log("Checkbox is unchecked.");
                Swal.fire({
                    icon: 'info',
                    title: "Confirmation",
                    text: "Please thick the agreement first",
                })
            }
       
        

    };


    function check() {
        var inputanuser = $("#nokartulogin").val();
        var nokartu = $("#datakartu").val();
        if (inputanuser == "") {
            Swal.fire({
                icon: 'info',
                title: "Field is empy",
                text: "Silahkan isi nomor kartu",
            })
        } else {
            if (inputanuser == nokartu) {
                $("#modalkartu").modal('hide');
                $("#termcondition").modal('show');

            } else {

                Swal.fire({
                    icon: 'error',
                    title: "Card number doesn't matched",
                    text: "Kartu tidak cocok",
                })
            }
        }

    }


    var request;
    $(document).ready(function () {
        var test = $("#fotopassport").required = true;
        $("#fotokartu").required = true;

        // $('#table_id').DataTable({
        //     'columnDefs': [{
        //             "targets": 0, // your case first column
        //             "className": "text-center",
        //             "width": "4%"
        //         },
        //         {
        //             "targets": 1,
        //             "className": "text-center",
        //         },
        //         {
        //             "targets": 2,
        //             "className": "text-center",
        //         },
        //         {
        //             "targets": 3,
        //             "className": "text-center",
        //         },
        //     ],
        // });

        // 		Swal.fire({
        // 				title: "Card Confirmation",
        // 				text: "Masukkan 4 digit belakang nomor kartu anda",
        //                 html: `<input type="text" maxlength = "4" id="empatnomorkartu" class="swal2-input" placeholder="Masukkan 4 digit nomor kartu" onkeypress="return isNumberKey(event)">`,
        //                 confirmButtonText: 'Sign in',
        // 				type: "input",
        // 				closeOnConfirm: false,
        //                 allowOutsideClick: false,
        // 				animation: "slide-from-top",
        // 				preConfirm: () => {
        //     const login = Swal.getPopup().querySelector('#empatnomorkartu').value
        //     if (!login ) {
        //       Swal.showValidationMessage(`Please enter 4 digit card`)
        //     }
        //     return { login: login }
        //   }
        // }).then((result) => {
        //   Swal.fire(`
        //     Login: ${result.value.login}
        //   `.trim())
        // });


        $("#formbuatuser").on('submit', function (e) {
            e.preventDefault()

            var month = $('#expiredmonth').val();
            var year = $('#expiredyear').val();
            var today, someday;
            today = new Date();
            someday = new Date();
            someday.setFullYear(year, month, 1);

            if (someday < today) {
                Swal.fire({
                    icon: 'error',
                    title: 'Card Expired',
                    text: "Card Has Expired",
                })
            } else {

                var $form = $(this);

                // $inputs.prop("disabled", true);

                // Fire off the request to /form.php
                request = $.ajax({
                    url: "admin.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data == "Sukses") {
                            Swal.fire(
                                'Created Successfully!',
                                'Akun Berhasil Dibuat',
                                'success'
                            )
                            $('#formbuatuser').trigger("reset");
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error while creating account',
                                text: "Akun gagal dibuat, error: " + data,
                            })
                        }
                    },
                });

                // Callback handler that will be called on success
                request.done(function (response, textStatus, jqXHR) {
                    // Log a message to the console
                    console.log(response);

                });

                // Callback handler that will be called on failure
                request.fail(function (jqXHR, textStatus, errorThrown) {
                    // Log the error to the console
                    console.error(
                        "The following error occurred: " +
                        textStatus, errorThrown
                    );
                });

                // Callback handler that will be called regardless
                // if the request failed or succeeded	
                request.always(function () {
                    // Reenable the inputs
                    // $inputs.prop("disabled", false);
                });
            }

        });

        function test() {
            alert("woi");
        }



        var mydate = $("#expired").val();
        var countDownDate = new Date(mydate).getTime();

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";
            document.getElementById("time").innerHTML = minutes + "m " + seconds + "s ";
            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "EXPIRED";
                document.getElementById("time").innerHTML = "EXPIRED";
                // setTimeout(function(){

                //      }, 5000);
                Swal.fire({
                    icon: 'error',
                    title: 'Timeout',
                    allowOutsideClick: false,
                    text: "Waktu anda telah habis, silahkan hubungi admin untuk token baru",

                }).then(function () {
                    window.location.href = "home.php";
                });
            }
        }, 1000);
    });
</script>