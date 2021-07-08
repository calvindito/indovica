
<?php
include '../../connection.php';
include '../header.php' ;

if(isset($_GET['kode'])){
    $kode = $_GET['kode'];
    $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM config where type = 'contact'"));
   
    $title_eng = $row['title_eng'];
    $title_ind = $row['title_ind'];
    $content_eng = $row['english'];
    $content_ind = $row['indonesia'];
    echo "<script>  $(document).ready(function() {
        $('#title_eng').val('".$title_eng."');
        $('#title_ind').val('".$title_ind."');
        $('#title_eng').val('".$title_eng."');
        $('#editor_eng').val('".$content_eng."');
        $('#editor_ind').val('".$content_ind."');
     });</script>";
}
?>

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Contact</h4>
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
                    <span class="breadcrumb-item active">Form Contact</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area -->
	<div class="content">

        <!-- CKEditor default -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Contact</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <p class="mb-3"></p>
                <form action="add.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
						    <div class="col-sm-6">
							    <label>Title (ENGLISH)</label>
                                <input type="text" value="Contact"  name="title_eng" id="title_eng" class="form-control" required>
                                <input type="text" hidden value="contact" id="type" name="type">
                            </div>
                            <div class="col-sm-6">
							    <label>Judul (INDONESIA)</label>
								<input type="text" value="Kontak"  name="title_ind" id="title_ind" class="form-control" required>
							</div>
                            
						</div>
					</div>
                    
                    <div class="mb-3">
                        <label for="">English</label>
                        <textarea name="editor-eng" id="editor-eng" class="ckeditor"  rows="4" cols="4">
                           <?php if(isset($content_eng)){ echo $content_eng; };?>
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Indonesia</label>
                        <textarea name="editor-ind" class="ckeditor" id="editor-ind" rows="4" cols="4">
                           <?php if(isset($content_ind)){ echo $content_ind; };?>
                        </textarea>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn bg-teal-400">Submit form <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>

    <?php
include '../footer.php';

?>