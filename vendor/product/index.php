
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
                    <button  data-toggle="modal" data-target="#modalPush" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="icon-plus3"></i></b> Add Product</button>
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
					    <div class="table-responsive">
						<table class="table table-striped table-bordered display nowrap w-100" id="data">
							<thead class="bg-danger text-center ">
								<tr>
                                    <th>No</th>
                                    <th>Picture</th>
                                    <th>Name</th>
									<th>Categories</th>
									<th>Owner</th>
                                    <th>Material</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>#</th>
								</tr>
							</thead>
							<tbody>

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

							<form id="form_input">
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
                                                    <label>Picture :</label><br>
                                                     <div id="preview" class="preview">
                                                        </div>       
                                                    <input type="file" class="form-control" multiple name="foto[]" id="foto"   >
                                                </div>
											</div>
                                        </div>
                               
									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>Categories</label><br>
                                                <?php while($row = mysqli_fetch_assoc($category)){
                                                    $category_id = $row['id'];
                                                    $category_name = $row['name'];
                                                    $category_owner = $row['owner'];
                                                    ?>
												<div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="category" id="category<?=$category_id?>" value="<?=$category_id?>" onclick="change_owner('<?=$category_owner?>','<?=$category_name?>')" >
                                                        <?=$category_name?>
                                                    </label>
                                                </div>
                                                <?php } ?>
											</div>
										</div>
									</div>
                                    <div class="form-group">
                                        <div class="row">
											<div class="col-sm-12">
												<label id="nameproduct">Product name</label>
												<input type="text" placeholder="" name="name" id="name" class="form-control">
											</div>
										</div>
									</div>
                                    <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>Owner</label><br>
                                                <div id="owner">
                                                  
                                                </div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-4">
												<label>Size</label>
												<input type="text" name="size" placeholder="Size" class="form-control" id="size">
											</div>

											<div class="col-sm-4" id="tahun">
												<label>Year</label>
												<input type="text" placeholder="Year" name="year" class="form-control" id="year">
											</div>

											<div class="col-sm-4">
												<label>Material</label>
												<input type="text" placeholder="Material" name="material" class="form-control" id="material">
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-4" id="teknik">
												<label>Technique</label>
												<input type="text" placeholder="Technique" name="technique" required class="form-control" id="technique">
												
											</div>

											<div class="col-sm-4">
												<label>Price</label>
												<input type="text" name="price" placeholder="Price" required  class="form-control" id="price">
												
											</div>
                                            <div class="col-sm-4">
												<label>Currency</label>
                                                <select name="currency" id="currency" class="form-control">
                                                    <option value="IDR">IDR</option>
                                                    <option value="Euro">Euro</option>
                                                    <option value="USD">USD</option>
                                                </select>
											</div>
										</div>
									</div>
                                    <div class="form-group"> 
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="">Description</label>
                                                <textarea name="description"required class="form-control" id="description" cols="30" rows="7"></textarea>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                        <div class="row">
                                           <div class="form-check col-md-12" >
												<label class="form-check-label">
									                    <input type="checkbox" required class="form-check-input-styled-success" data-fouc name="agree"> I understand and agree with the
													<a target = '_blank' href="term.php">Terms & Conditions</a> 
													</label>
									    </div>

                                        </div>
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

 $(function() {
      loadData();
      
        $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img width="150px" height="100px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#foto').on('change', function() {
        imagesPreview(this, 'div.preview');
    });
})
   });

function change_owner(owner,category){

     if(category == "Vintage"){
       $('#teknik').hide(); 
       $('#nameproduct').html('Types of goods');
     }else if(category == "Small & Medium Enterprise"){
        $('#teknik').hide();
        $('#tahun').hide();
        
       $('#nameproduct').html('Types of goods');

     }else{
        $('#teknik').show();
        $('#tahun').show();
       $('#nameproduct').html('Painting Title');
     }
    data = owner.split(',');
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
            { name: 'name', className: 'text-center align-middle' },
            { name: 'categories', className: 'text-center align-middle' },
            { name: 'owner', searchable: false, className: 'text-center align-middle' },
            { name: 'material', searchable: false, className: 'text-center align-middle' },
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
   function detail(id) {
   
      toEdit();
      $.ajax({
         url: 'detail.php?id=' + id,
         type: 'GET',
         dataType: 'JSON',
         success: function(response) {
            var foto = response.image;
            foto = foto.split(',');
            for(var i = 0; i<foto.length;i++){
                $("#previewImg"+i).attr("src", '../../global_assets/images/foto_produk/'+foto[i]);
            }
            if(response.category_name == "Contemporary"){
                var data = ['Direct Artist','Individual','Company','Collector','Art Gallery'];
                
            }else{
                var data = ['Individual','Company','Collector','Antique Shops']
            }

            var row = '';

            for(var i =0; i<data.length; i++){
                row += '<div class="form-check form-check-inline">'
                            +'<label class="form-check-label">'
                            +'<input type="radio" class="form-check-input" name="owner" value="'+data[i]+'" id="'+data[i].replace(/ /g, "")+'">'
                            + data[i] +' </label> </div>';
            }
            if(response.category_name== "Vintage"){
                $('#teknik').hide(); 
                $('#nameproduct').html('Types of goods');
            }else if(response.category_name == "Small & Medium Enterprise"){
                $('#teknik').hide();
                $('#tahun').hide();
                $('#nameproduct').html('Types of goods');
            }else{
                $('#teknik').show();
                $('#tahun').show();
                $('#nameproduct').html('Painting Title');
            }
            $('#owner').html('');
            $('#owner').html(row);
            var owner = response.owner;
            $('#'+owner.replace(/ /g, "")).attr('checked','checked');
        
            $('#name').val(response.name);
            $('#category'+response.category_id).attr('checked','chacked');
            $('#size').val(response.size);
            $('#year').val(response.year);
            $('#material').val(response.material);
            $('#technique').val(response.teknik);
            $('#price').val(response.price);
            $('#currency').val(response.currency);
            $('#description').val(response.description);
            $('#btn_edit').attr('onclick', 'edit(' + id + ')');
            console.log(id);
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
