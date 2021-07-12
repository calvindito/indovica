<?php
    require 'exception.php';
    require 'design.php';
?>

<html>

<head>
     <link rel="icon" href="logo/logovica.png">
    <style>
        body{
            background-color:#DE6262;
        }
    </style>
    <title>Authentication Private Server</title>
</head>

<body>
    <!-- Trigger the modal with a button -->
    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

    <!-- Modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <img src="logo/logovica.png" style="max-width:150px;float:right;">
                <label class="control-label" style = "color:#a33c34; float:left;margin-left:20px;margin-top:20px;font-size:20px;" >Vica Member</label>
                </div>
                <form method="POST" enctype='multipart/form-data' id="formloginuser">
                    <div class="modal-body">
                        <div class="form-group" style = "padding-left:20px;padding-right:20px;">
                         
                        <!-- <label class="control-label" style = "color:#a33c34;" >Please enter the unique code</label> -->
                       
                            <div>
                            <br>
                                <input type="text" class="form-control input-lg"  name="token" value="" id = "mytoken" placeholder = "Masukkan Kode Unik" style = "font-size:15px;" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit"  value="Login"  style = "margin-right:20px; background-color:#731f18; color:white; padding:5px; border-radius:10px; width:100px;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    $("#exampleModalCenter").modal({
        backdrop: 'static',
        keyboard: false
    });
    $("#close").click(function () {
        $("#exampleModalCenter").modal('show');
    });

    $("#formloginuser").on('submit', function (e) {
            e.preventDefault();
            var token = $('#mytoken').val();
            $.ajax({
                url: "generatetoken/checktoken.php",
                type: "POST",
                data: {
                    token: token
                },
                success: function (data) {
                    // alert(data);
                    if (data == "sukses") {
                        
                        Swal.fire({
						icon: 'success',
                        allowOutsideClick: false,
						title: 'Token Valid!',
						text: "Selamat Datang",
					    }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "dashboard.php?token=" + token ;
                            }
                        });  

                        
                    }
                    else if(data == "none")
                    {
                        Swal.fire({
						icon: 'error',
						title: 'Token tidak ditemukan',
						text: "Token tidak ditemukan di database, silahkan mencoba token lain"
					    })
                    }
                    else{
                        Swal.fire({
						icon: 'error',
						title: 'Token Error',
						text: "Error : " + data,
					})

                    }

                }

            });
        });
      
            
</script>