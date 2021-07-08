<?php
include '../connection.php';
include 'header.php';

$vendor_id = $_SESSION['id'];
$accepted = mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(*) as jumlah from product where status='accepted' "));

$rejected = mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(*) as jumlah from product where status='rejected'"));

$sold = mysqli_fetch_assoc(mysqli_query($conn,"SELECT sum(qty) as jumlah from product join transaction_detail on product_id = product.id where status='accepted' "));
?>

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Dashboard</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area -->
	<div class="content">

        <!-- Main charts -->
        <div class="row">
            <div class="col-lg-4">
                <!-- Members online -->
                <div class="card bg-teal-400">
                    <div class="card-body">
                        <div class="d-flex">
                            <h3 class="font-weight-semibold mb-0"><?=$accepted['jumlah']?></h3>
                        </div>
                        
                        <div>
                            Product Accepted
                            <div class="font-size-sm opacity-75"></div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div id="members-online"></div>
                    </div>
                </div>
                <!-- /members online -->

                </div>

                <div class="col-lg-4">

                <!-- Current server load -->
                <div class="card bg-pink-400">
                    <div class="card-body">
                        <div class="d-flex">
                            <h3 class="font-weight-semibold mb-0"><?=$rejected['jumlah']?></h3>
                            <div class="list-icons ml-auto">
                                
                            </div>
                        </div>
                        
                        <div>
                            Product Rejected
                            <div class="font-size-sm opacity-75"></div>
                        </div>
                    </div>

                    <div id="server-load"></div>
                </div>
                <!-- /current server load -->

                </div>

                <div class="col-lg-4">

                <!-- Today's revenue -->
                <div class="card bg-blue-400">
                    <div class="card-body">
                        <div class="d-flex">
                            <h3 class="font-weight-semibold mb-0"><?=$sold['jumlah']?></h3>
                            <div class="list-icons ml-auto">
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                        
                        <div>
                            Product Sold
                            <div class="font-size-sm opacity-75"></div>
                        </div>
                    </div>

                    <div id="today-revenue"></div>
                </div>
                <!-- /today's revenue -->

            </div>
        </div>
        <div class="row">
					<div class="col-xl-12">

						<!-- Traffic sources -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Transaction</h6>
								<div class="header-elements">
									<div class="form-check form-check-right form-check-switchery form-check-switchery-sm">
										<label class="form-check-label">
											Live update:
											<input type="checkbox" class="form-input-switchery" checked data-fouc>
										</label>
									</div>
								</div>
							</div>

							<div class="card-body py-0">
								
							</div>

							<div class="chart position-relative" id="traffic-sources" style="min-height:240px"></div>
						</div>
						<!-- /traffic sources -->

					</div>


        </div>
        <div>


<?php include 'footer.php' ?>