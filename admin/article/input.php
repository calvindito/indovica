
<?php
include '../../connection.php';
include '../header.php' ;

if(isset($_GET['kode'])){
    $kode = $_GET['kode'];
    $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM article where id = $kode"));
    $date = $row['date'];
    $title = $row['title'];
    $author = $row['author'];
    $content = $row['content'];
    echo "<script>  $(document).ready(function() {
        $('#id_article').val('".$kode."');
        $('#date').val('".$date."');
        $('#title').val('".$title."');
        $('#author').val('".$author."');
     });</script>";
}
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
                
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Input Article</span>
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
                <h5 class="card-title">Article</h5>
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
                <form action="add.php" method="post">
                    <div class="form-group">
                        <div class="row">
						    <div class="col-sm-6">
							    <label>Date</label>
                                <input type="text" hidden id="id_article" name="id_article">
								<input type="date"  name="date" id="date" class="form-control" required >
							</div>
                            <div class="col-sm-6">
								<label>Author</label>
								<input type="text" placeholder="Author" name="author" id="author" class="form-control" required >
							</div>
						</div>
					</div> 
                    <div class="form-group">
                        <div class="row">
						    <div class="col-sm-6">
							    <label>Title</label>
								<input type="text"  name="title" id="title" class="form-control" required>
							</div>
                            <div class="col-sm-6">
							    <label>Tumbnail</label>
								<input type="file"  name="tumbnail" id="tumbnail" class="form-control" required>
							</div>
                            
						</div>
					</div>               
                    <div class="mb-3">
                        <textarea name="editor-full" id="editor-full" rows="4" cols="4">
                           <?php if(isset($content)){ echo $content; };?>
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