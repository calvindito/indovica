<?php
    require 'exception.php';
    require 'design.php';
?>

<html>

<head>
    <style>
        .modal {
            text-align: center;
            padding: 0 !important;
        }

        .modal:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -4px;
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <!-- Trigger the modal with a button -->
    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

    <!-- Modal -->

    <!-- Modal -->

    
    <form action="admin.php" method="POST" id='formadmin' style = "z-index:1;">
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login Admin</h5>

                    </div>
                    <div class="modal-body">

                        <input type="hidden" name='tipe' value="matchlogin">
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <div>
                                <input type="text" class="form-control input-lg" name="username" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <div>
                                <input type="password" class="form-control input-lg" name="password" value="" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Masuk">
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- <div id="myModal" class="modal fade" role="dialog" >
        <div class="modal-dialog ">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" >&times;</button>
                    <h4 class="modal-title">Masukkan Kode Unik</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Kode Unik</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="email" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" >Masuk</button>
                </div>
            </div>

        </div>
    </div> -->
</body>

</html>
<script>
    var request;
    $("#exampleModalCenter").modal({
        backdrop: 'static',
        keyboard: false
    });
    $('.alert').hide();
    $("#close").click(function () {
        $("#exampleModalCenter").modal('show');
    });
    $("#formadmin").submit(function (event) {
                event.preventDefault();
                if (request) {
                    request.abort();
                }
                var $form = $(this);
                var $inputs = $form.find("input, select, button, textarea");
                var serializedData = $form.serialize();
                $inputs.prop("disabled", true);

                // Fire off the request to /form.php
                request = $.ajax({
                    url: "admin.php",
                    type: "post",
                    data: serializedData
                });

                // Callback handler that will be called on success
                request.done(function (response, textStatus, jqXHR) {
                    // Log a message to the console
                    if(response == "sukses")
                    {
                      

                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successfully',
                            allowOutsideClick: false,
                            text: 'Password Matched',
                        }).then(function() {

                            window.post = function() {
                              return fetch("homeadmin.php", {method: "POST", body:{status:"loginok"} });
                            }
                            post();
                            window.location.href = "homeadmin.php" ;
                        });  
                        
                    }
                    else{
                        Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: "User Not Found",
                        })
                    }
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
                    $inputs.prop("disabled", false);
                });
            });
            
            
</script>