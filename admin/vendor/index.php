
<?php
include '../../connection.php';
include '../header.php' ;

$category = mysqli_query($conn,"SELECT * from adminonline where role='vendor'");
?>

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Vendor</h4>
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
                    <span class="breadcrumb-item active">Vendor</span>
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
      <h5 class="card-title">Data Vendor</h5>
         <div class="header-elements">

         </div>
      </div>

      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered display nowrap" id="data" style="width:100%;">
               <thead class="bg-dark">
                  <tr>
                     <th>No</th>
                     <th>Name</th>
                     <th>Phone</th>
                     <th>Email</th>
                     <th>Address</th>
                     <th>Bank</th>
                     <th>Account Number</th>
                  </tr>
               </thead>
            </table>
         </div>
      </div>
   </div>
</div>


<?php include '../footer.php' ?>
<script>    

 $(function() {
      loadData();
   });

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
            { name: 'fullname', className: 'text-center align-middle' },
            { name: 'phone', className: 'text-center align-middle' },
            { name: 'email', searchable: false, className: 'text-center align-middle' },
            { name: 'address', searchable: false, className: 'text-center align-middle' },
            { name: 'bank', searchable: false, className: 'text-center align-middle' },
            
            { name: 'rekening', searchable: false, className: 'text-center align-middle' }
         ]
      });
   }
</script>
