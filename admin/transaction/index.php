
<?php
include '../../connection.php';
include '../header.php' ;

$transaction = mysqli_query($conn,"SELECT transaction.*, customer.fullname, address.address from transaction join customer on customer.id = customer_id join address on address.id = address_id");
?>

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Transaction</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
				<div class="d-flex justify-content-center">
                    <!-- <button  data-toggle="modal" data-target="#modalPush" onclick="add()" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="icon-plus3"></i></b> Add Transaction</button>
                  -->
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Transaction</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area -->
	<div class="content">
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Data Transaction</h5>
					</div>

					<div class="card-body">
                    <div class="table-responsive">
						<table class="table " id="data">
							<thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Address</th>
                                    <th>Total</th>
                                    <th>#</th>
                                </tr>
							</thead>
							<tbody>
                            <?php
                            $no = 0;
                            while($data = mysqli_fetch_assoc($transaction)){
                                $no++;
                                $id = $data['id'];
                                ?>
								<tr>
                                    <td><?=$no?></td>
                                    <td><?=$data['date']?></td>
                                    <td><?=$data['fullname']?></td>
                                    <td><?=$data['address']?></td>
                                    <td><?=number_format($data['total'])?></td>
                                    <td><a href="detail.php?id=<?=$id?>"><button class="btn btn-primary btn-sm" >Detail</button></a> <button class="btn btn-danger btn-sm"  onclick="hapus()" >Hapus</button></td>
								</tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>

					
                </div>
    </div>


<!-- Vertical form modal -->
<div id="modalPush" class="modal fade" tabindex="-1" >
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Form Product</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<form id="form_input" method="POST">
								<div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
											<div class="col-sm-12">
												<label>Transaction name</label>
												<input type="text" placeholder="Transaction name" name="name" id="name" class="form-control" >
                                                <input type="text" id="id" name="id" hidden>
											</div>
										</div>
									</div>
                                    <div class="form-group">
                                        <div class="row">
											<div class="col-sm-12" >
												<label>Owner</label>
												<div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-success" type="button" onclick="addOwner()"><i class="icon-plus3"></i></button>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="" aria-label="" id="owner1" name="owner[]" aria-describedby="basic-addon1">
                                                </div>
                                                <div id="div_owner">
                                                </div>
											</div>
										</div>
									</div>                       
								</div>

								<div class="modal-footer">
                                    <input type="text" hidden name="jml" value="1" id="jml">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <a href="#" type="button" class="btn btn-warning" id="btn_edit" onclick="submit_edit()" style="display:none;"  onclick="simpan_edit()">Save</button>
									<a href="#" class="btn bg-primary" id="btn_tambah" onclick="tambah()">Submit form</a>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /vertical form modal -->

<?php include '../footer.php' ?>
<script>    

$("#data").DataTable();
var jml = $('#jml').val();
jml++;
function addOwner(){
    var html = '<div class="input-group mb-3 " id="no'+jml+'">'
                    +'<div class="input-group-prepend">'
                        +'<button class="btn btn-warning" type="button" ><i class="icon-minus3"></i></button>'
                        +'</div>'
                    +'<input type="text" class="form-control" placeholder="" aria-label="" name="owner[]" aria-describedby="basic-addon1">'
                                                +'</div>';
$('#div_owner').append(html);
}

function tambah() {
    var data2 = $('#form_input').serialize();
      $.ajax({
         url: 'tambah.php',
         type: 'POST',
         dataType: 'JSON',
         data: data2,
         success: function(response) {
            if(response.status == 200) {
               Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: response.message,
                  showConfirmButton: false,
                  timer: 1000
               }).then(function() {
                  window.location = "index.php";
                });
            } else {
               Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: response.message,
                  showConfirmButton: false,
                  timer: 1000
               }).then(function() {
                  window.location = "index.php";
                });
            }
         }
      });
   }

   function submit_edit() {
    var data2 = $('#form_input').serialize();
      $.ajax({
         url: 'edit.php',
         type: 'POST',
         dataType: 'JSON',
         data: data2,
         success: function(response) {
            if(response.status == 200) {
               Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: response.message,
                  showConfirmButton: false,
                  timer: 1000
               }).then(function() {
                  window.location = "index.php";
                });
            } else {
               Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: response.message,
                  showConfirmButton: false,
                  timer: 1000
               }).then(function() {
                  window.location = "index.php";
                });
            }
         }
      });
   }

function edit(id,nama,owner){
    $('#btn_tambah').hide();
    $('#btn_edit').show();
    $('#name').val(nama);
    $('#id').val(id);
    $('#div_owner').html('');
    var data = owner.split(',');
    var row = '';
    $('#owner1').val(data[0]);
    var jml = $('#jml').val();

    if(data.length > 1){
        jml++;
        for(var i =1; i<data.length; i++){
            row += '<div class="input-group mb-3" id="no'+jml+'">'
                    +'<div class="input-group-prepend">'
                    +'<button class="btn btn-warning" type="button" ><i class="icon-minus3"></i></button>'
                    +'</div>'
                    +'<input type="text" class="form-control" placeholder="" aria-label="" name="owner[]" aria-describedby="basic-addon1" value="'+data[i]+'">'
                    +'</div>';
        }
        $('#div_owner').append(row);  
    }
}

function add(){
    $('#btn_tambah').show();
    $('#btn_edit').hide();
}

function hapus(id) {
    swal.fire({
        title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
      }).then(function(isConfirm) {
        
         if(isConfirm.value){
            $.ajax({
               url: 'hapus.php?id=' + id,
               type: 'GET',
               dataType: 'JSON',
               success: function(response) {
                  if(response.status == 200) {
                     swal.fire({
                        position: 'center',
                        type: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1000
                     }).then(function() {
                         window.location = "index.php";
                        });
                  } else {
                    swal.fire({
                        position: 'center',
                        type: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1000
                     }).then(function() {
                        window.location = "index.php";
                        });
                  }
               }
            });
         }
      });
   }
</script>
