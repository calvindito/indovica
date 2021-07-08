
<?php
include '../../connection.php';
include '../header.php' ;

$currency = mysqli_query($conn,"SELECT * from currency");
?>

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - currency</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
				<div class="d-flex justify-content-center">
                    <button  data-toggle="modal" data-target="#modalPush" onclick="add()" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="icon-plus3"></i></b> Update Currency</button>
                 
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Currency</span>
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
						<h5 class="card-title">Data Currency</h5>
				
					</div>

					<div class="card-body">
                    <div class="table-responsive">
						<table class="table " id="data">
							<thead>
                                <tr>
                                    <th>No</th>
                                    <th>Currency</th>
                                    <th>Nominal (IDR)</th>
                                    <th>Simbol</th>
                                </tr>
							</thead>
							<tbody>
                            <?php
                            $no = 0;
                            while($data = mysqli_fetch_assoc($currency)){
                                $no++;
                                ?>
								<tr>
                                    <td><?=$no?></td>
                                    <td><?=$data['name']?></td>
                                    <td><?=number_format($data['nominal'])?></td>
                                    <td><?=$data['simbol']?></td>
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
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Form Currency</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<form id="form_input" method="POST">
								<div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
											<div class="col-sm-12">
												<label>Currency</label>
												<select name="currency" id="currency" class="form-control">
                                                  
                                                    <option value="EURO">EURO</option>
                                                    <option value="USD">USD</option>
                                                </select>
											</div>
										</div>
									</div>
                                    <div class="form-group">
                                        <div class="row">
											<div class="col-sm-12" >
												<label>Nominal (IDR)</label>
												
                                                    <input type="text" class="form-control" name="nominal" id="nominal">
                                                
											</div>
										</div>
									</div>    
									<div class="form-group">
                                        <div class="row">
											<div class="col-sm-12" >
												<label>Simbol</label>
                                                    <input type="text" class="form-control" name="simbol" id="simbol">
											</div>
										</div>
									</div>    
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<a href="#" class="btn bg-primary" id="btn_tambah" onclick="tambah()">Submit form</a>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /vertical form modal -->

<?php include '../footer.php' ?>
<script>    

$('#data').DataTable({});
function tambah() {
    var data2 = $('#form_input').serialize();
      $.ajax({
         url: 'tambah.php',
         type: 'POST',
         dataType: 'JSON',
         data: data2,
         success: function(response) {
            if(response == 200) {
               Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Currency Updated',
                  showConfirmButton: false,
                  timer: 1000
               }).then(function() {
                  window.location = "index.php";
                });
            } else {
               Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Currency not updated',
                  showConfirmButton: false,
                  timer: 1000
               }).then(function() {
                  window.location = "index.php";
                });
            }
         }
      });
   }

</script>
