
<?php
include '../../connection.php';
include '../header.php' ;

$article = mysqli_query($conn,"SELECT * from article");
?>

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Article</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
				<div class="d-flex justify-content-center">
                     <a href="input.php"><button class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="icon-plus3"></i></b> Add Product</button></a>
                
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">article</span>
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
						<h5 class="card-title">Data article</h5>
						<div class="header-elements">
                        
	                	</div>
					</div>

					<div class="card-body">
                   

					<div class="table-responsive">
						<table class="table table-striped table-bordered display nowrap w-100" id="data">
							<thead class="bg-danger text-center ">
								<tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Author</th>
                                    <th>Action</th>
								</tr>
							</thead>
                                <?php $no=1; while($data = mysqli_fetch_assoc($article)){
                                        $id_article = $data['id'];
                                    ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$data['title']?></td>
                                        <td><?=$data['date']?></td>
                                        <td><?=$data['author']?></td>
                                        <td>
                                        <a href="input.php?kode=<?=$id_article?>"><button type="button"  class="btn btn-primary btn-sm">Update</button></a>
                                        <button type="button" onclick="hapus(<?=$id_article?>)" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                <?php $no++; } ?>
							<tbody>

                            </tbody>
                        </table>
                    </div>
                                </div>
                </div>
    </div>

<?php include '../footer.php' ?>
<script>
    $('#data').DataTable({});
    
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
               url: 'delete.php?id=' + id,
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