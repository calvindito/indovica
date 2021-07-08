
<?php
include '../../connection.php';
include '../header.php' ;

$content = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from config where type ='term-mutlak'"));
?>

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Terms and Conditions</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
				<div class="d-flex justify-content-center">
                   </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Terms and Conditions</span>
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
						<h5 class="card-title">Terms and Conditions</h5>
						<div class="header-elements">
                            <select name="filter_status" id="filter_bahasa" class="custom-select" onchange="loadBahasa()">
                                
                                <option value="eng">ENGLISH</option>
                                <option value="indo">INDONESIA</option>
                            </select>
	                	</div>
					</div>

					<div class="card-body">
					    <div id="eng" >
					        <p><?php echo $content['english']?></p>
					    </div>
					    
					     <div id="ind" style="display:none" >
					        <p><?php echo $content['indonesia']?></p>
					    </div>
					    
				
                    </div>

					
                </div>
    </div>


<?php include '../footer.php' ?>
<script>    
function loadBahasa(){
  
    var bahasa = $('#filter_bahasa').val();
    
    if(bahasa == 'indo'){
        $('#ind').show();
        $('#eng').hide();
    }else{
        $('#eng').show();
        $('#ind').hide();
    }
}

</script>
