
<?php
include '../../connection.php';
include '../header.php' ;

$category = mysqli_query($conn,"SELECT * from category");
?>

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Product</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
				<div class="d-flex justify-content-center">
                    <!-- <button  data-toggle="modal" data-target="#modalPush" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="icon-plus3"></i></b> Add Product</button>
                 -->
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Product</span>
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
						<h5 class="card-title">Data Product</h5>
						<div class="header-elements">
                            <select name="filter_status" id="filter_status" class="custom-select" onchange="loadDataTable()">
                                <option value="">All</option>
                                <option value="1">Accept</option>
                                <option value="2">Rejected</option>
                            </select>
	                	</div>
					</div>

					<div class="card-body">
                    </div>

					<div class="table-responsive">
						<table class="table table-striped table-bordered display nowrap w-100" id="data">
							<thead class="bg-danger text-center ">
								<tr>
                                    <th>No</th>
                                    <th>Picture</th>
                                    <th>Vendor</th>
                                    <th>Name</th>
									<th>Categories</th>
									<th>Owner</th>
                                    <th>Year</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th></th>
								</tr>
							</thead>
							<tbody>

                            </tbody>
                        </table>
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

							<form id="form_input">
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
                                            <label>Picture :</label><br>
                                                <div class="row">
                                                    <div class="col-sm-12" id="view_images">
                                                        
                                                    </div>
                                                    <!--<div class="col-sm-4">-->
                                                    <!--    <img id="previewImg1" src="../../global_assets/images/logo3.png" alt="" width="150px" height="100px"><br>-->
                                                       
                                                    <!--</div>-->
                                                    <!--<div class="col-sm-4">-->
                                                    <!--    <img id="previewImg2" src="../../global_assets/images/logo3.png" alt="" width="150px" height="100px"><br>-->
                                                       
                                                    <!--</div>-->
                                                    <!--<div class="col-sm-4">-->
                                                    <!--    <img id="previewImg3" src="../../global_assets/images/logo3.png" alt="" width="150px" height="100px"><br>-->
                                                       
                                                    <!--</div>-->
                                                </div>
                                                
                                                
											</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
											<div class="col-sm-6">
												<label>Vendor</label>
												<input type="text" placeholder="Kopyov" name="vendor" id="vendor" class="form-control" readonly>
											</div>
                                            <div class="col-sm-6">
												<label>Email</label>
												<input type="text" placeholder="Kopyov" name="email" id="email" class="form-control" readonly>
											</div>
										</div>
									</div>
                                    <div class="form-group">
                                        <div class="row">
											<div class="col-sm-6">
												<label>Phone</label>
												<input type="text" placeholder="Kopyov" name="phone" id="phone" class="form-control" readonly>
											</div>
                                            <div class="col-sm-6">
												<label>Adress</label>
												<textarea name="address" id="address" cols="30" rows="5" readonly class="form-control"></textarea>
											</div>
										</div>
									</div>
                                    <div class="form-group">
                                        <div class="row">
											<div class="col-sm-12">
												<label>Product name</label>
												<input type="text" placeholder="Kopyov" name="name" id="name" class="form-control" readonly>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>Categories</label><br>
                                                <input type="text" placeholder="Kopyov" name="category" id="category" class="form-control" readonly>
											</div>
                                            <div class="col-sm-6">
												<label>Owner</label>
                                                <input type="text" placeholder="Kopyov" name="owner" id="owner" class="form-control" readonly>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-4">
												<label>Size</label>
												<input type="text" name="size" placeholder="Size" class="form-control" id="size" readonly>
											</div>

											<div class="col-sm-4">
												<label>Year</label>
												<input type="text" placeholder="Year" name="year" class="form-control" id="year" readonly>
											</div>

											<div class="col-sm-4">
												<label>Material</label>
												<input type="text" placeholder="Material" name="material" class="form-control" id="material" readonly>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-4">
												<label>Technique</label>
												<input type="text" placeholder="Technique" name="technique" class="form-control" id="technique" readonly>
												
											</div>

											<div class="col-sm-4">
												<label>Price</label>
												<input type="text" name="price" placeholder="Price"  class="form-control" id="price" readonly>
												
											</div>
                                            <div class="col-sm-4">
												<label>Currency</label>
                                                <input type="text" name="currency" placeholder="Price"  class="form-control" id="currency" readonly>
											</div>
										</div>
									</div>
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="">Description</label>
                                                <textarea name="description" class="form-control" id="description" cols="30" rows="7" readonly></textarea>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
											<div class="col-sm-12">
												<label>Status</label>
												<select name="status" id="status" class="form-control" onchange="changeHarga(this.value)">
                                                    <option value="">--Choose--</option>
                                                    <option value="accepted">Accepted</option>
                                                    <option value="rejected">Rejected</option>
                                                </select>
											</div>
										</div>
									</div>
                                    <div id="tampil">

                                    </div>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-warning" id="btn_edit" style="display:none;">Save</button>
									<button type="submit" class="btn bg-primary" id="btn_tambah" onclick="tambah()">Submit form</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /vertical form modal -->

<?php include '../footer.php' ?>
<script>    
function previewFile(id){
        var file = $("#foto"+id).get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg"+id).attr("src", reader.result);
  
            }
 
            reader.readAsDataURL(file);
        }
}
 $(function() {
      loadData();
   });

function change_owner(owner){
    if(owner == "Contemporary"){
        var data = ['Direct Artist','Individual','Company','Collector','Art Gallery'];
        
    }else{
        var data = ['Individual','Company','Collector','Antique Shops']
    }
    var row = '';
        for(var i =0; i<data.length; i++){
            row += '<div class="form-check form-check-inline">'
                        +'<label class="form-check-label">'
                        +'<input type="radio" class="form-check-input" name="owner" value="'+data[i]+'" >'
                        + data[i] +' </label> </div>';
        }
        $('#owner').html('');
        $('#owner').html(row);
}
function loadData() {
      $("#data").DataTable({
         processing: true,
         deferRender: true,
         serverSide: true,
         destroy: true,
         iDisplayInLength: 10,
         scrollX: true,
         order: [[0, 'asc']],
         ajax: { url: 'load_data.php' },
         columns: [
            { name: 'id', searchable: false, className: 'text-center align-middle' },
            { name: 'foto', searchable: false, className: 'text-center align-middle' },
            
            { name: 'vendor',className: 'text-center align-middle' },
            { name: 'name', className: 'text-center align-middle' },
            { name: 'categories', className: 'text-center align-middle' },
            { name: 'owner', searchable: false, className: 'text-center align-middle' },
            { name: 'year', searchable: false, className: 'text-center align-middle' },
            { name: 'price', searchable: false, className: 'text-center align-middle' },
            { name: 'status', searchable: false, className: 'text-center align-middle' },
            { name: 'action', searchable: false, orderable: false, className: 'text-center align-middle' }
         ]
      });
   }
   function toEdit() {
      $('#btn_batal').show();
      $('#btn_edit').show();
      $('#btn_tambah').hide();
      $('#modalPush').modal('show');
   }
   function detail(id,status) {
       if(status == 2){
    html = '<div class="form-group">'
                        +'<div class="row">'
						+'<div class="col-sm-6">'
						+'<label>Profit (%)</label>'
                        +'<select name="profit" id="profit" class="form-control" onchange="changeprofit(this.value)">'
                        +'<option value="20">20%</option>'
                        +'<option value="30">30%</option>'
                        +'<option value="40">40%</option>'
                        +'<option value="50">50%</option>'
                        +'<option value="60">60%</option>'
                        +'<option value="70">70%</option>'
                        +'<option value="80">80%</option>'
                        +'<option value="90">90%</option>'
                        +'<option value="100">100%</option>'
                        +'<option value="110">110%</option>'
                        +'<option value="120">120%</option>'
                        +'<option value="130">130%</option>'
                        +'<option value="140">140%</option>'
                        +'<option value="150">150%</option>'
                        +'<option value="160">160%</option>'
                        +'<option value="170">170%</option>'
                        +'<option value="180">180%</option>'
                        +'<option value="190">190%</option>'
                        +'<option value="200">200%</option>'
                        +'</select>'
                        +'</div>'
                        +'<div class="col-sm-6">'
						+'<label>Public Price</label>'
                        +'<input type="text" name="public_price" id="public_price" class="form-control" required>'
						+'</div></div></div>';
            $('#tampil').html(html);
       }else{
        $('#tampil').html('');
       }
      toEdit();
      $.ajax({
         url: 'detail.php?id=' + id,
         type: 'GET',
         dataType: 'JSON',
         success: function(response) {
            var foto = response.image;
            var url = '';
          
            foto = foto.split(',');
            
                for(var i = 0; i<foto.length;i++){
                    url = '../../global_assets/images/foto_produk/'+foto[i];
                    $('#view_images').append('<img src="'+url+'" width="150px" height="100px" > &nbsp;&nbsp;');
                }
            
            $('#vendor').val(response.fullname);
            $('#email').val(response.email);
            $('#phone').val(response.phone);
            $('#address').val(response.address);
            $('#name').val(response.name);
            $('#category').val(response.category_name);
            $('#owner').val(response.owner);
            $('#size').val(response.size);
            $('#year').val(response.year);
            $('#material').val(response.material);
            $('#technique').val(response.teknik);
            $('#price').val(response.price);
            $('#currency').val(response.currency);
            $('#description').val(response.description);
            $('#public_price').val(response.public_price);
            $('#profit').val(response.profit);
            
            
            $('#btn_edit').attr('onclick', 'edit(' + id + ')');
         }
      });
   }

   function changeHarga(val){
  
       if(val == 'accepted'){
    
        html = '<div class="form-group">'
                        +'<div class="row">'
						+'<div class="col-sm-6">'
						+'<label>Profit (%)</label>'
                        +'<select name="profit" id="profit" class="form-control" onchange="changeprofit(this.value)">'
                        +'<option value="20">20%</option>'
                        +'<option value="30">30%</option>'
                        +'<option value="40">40%</option>'
                        +'<option value="50">50%</option>'
                        +'<option value="60">60%</option>'
                        +'<option value="70">70%</option>'
                        +'<option value="80">80%</option>'
                        +'<option value="90">90%</option>'
                        +'<option value="100">100%</option>'
                        +'<option value="110">110%</option>'
                        +'<option value="120">120%</option>'
                        +'<option value="130">130%</option>'
                        +'<option value="140">140%</option>'
                        +'<option value="150">150%</option>'
                        +'<option value="160">160%</option>'
                        +'<option value="170">170%</option>'
                        +'<option value="180">180%</option>'
                        +'<option value="190">190%</option>'
                        +'<option value="200">200%</option>'
                        +'</select>'
                        +'</div>'
                        +'<div class="col-sm-6">'
						+'<label>Public Price</label>'
                        +'<input type="text" name="public_price" id="public_price" class="form-control" required>'
						+'</div></div></div>';
   
            $('#tampil').html(html);
       }else{
            $('#tampil').html('');
       }
   }

   function changeprofit(val){
       var harga = $('#price').val();

       profit = (parseInt(harga) * parseInt(val) / 100) + parseInt(harga);
       $('#public_price').val(profit);
   }

   
   function edit(id) {
      $.ajax({
         url: 'edit.php?id=' + id,
         type: 'POST',
         dataType: 'JSON',
         data: new FormData($('#form_input')[0]),
         cache: false,
         processData: false,
         contentType: false,
         beforeSend: function() {
            $('#btn_batal').attr('disabled', false);
            $('#btn_edit').attr('disabled', false);

         },
         success: function(response) {
            
            $('#btn_batal').attr('disabled', false);
            $('#btn_edit').attr('disabled', false);
            if(response.status == 200) {
               success();
               Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: response.message,
                  showConfirmButton: false,
                  timer: 1000
               });
            } else {
               Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: response.message,
                  showConfirmButton: false,
                  timer: 1000
               });
            }
         }
      });
   }

   function success() {
      batal();
      $('#data').DataTable().ajax.reload(null, false);
   }
   function batal() {
      $('#btn_batal').hide();
      $('#btn_edit').hide();
      $('#btn_tambah').show();
      $('#modalPush').modal('hide');
      reset();
    }
    
     function reset() {
      $('#form_input').trigger('reset');
   }



   function tambah() {
      $.ajax({
         url: 'tambah.php',
         type: 'POST',
         dataType: 'JSON',
         data: new FormData($('#form_input')[0]),
         cache: false,
         processData: false,
         contentType: false,
         beforeSend: function() {
            $('#btn_tambah').attr('disabled', true);
         },
         success: function(response) {
            $('#btn_tambah').attr('disabled', false);
            if(response.status == 200) {
               success();
               Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: response.message,
                  showConfirmButton: false,
                  timer: 1000
               });
            } else {
               Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: response.message,
                  showConfirmButton: false,
                  timer: 1000
               });
            }
         }
      });
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
               url: 'destroy.php?id=' + id,
               type: 'GET',
               dataType: 'JSON',
               success: function(response) {
                  if(response.status == 200) {
                     $('#data').DataTable().ajax.reload(null, false);
                     swal.fire({
                        position: 'center',
                        type: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1000
                     });
                  } else {
                    swal.fire({
                        position: 'center',
                        type: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1000
                     });
                  }
               }
            });
         }
      });
   }

</script>
