<?php
session_start();
include 'header.php';
if(!isset($_GET['kode'])){
    echo '<script>document.location.href="index.php"</script>';
} else {

$kode = $_GET['kode'];
$article = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from article where id = $kode"));
$date=date_create($article['date']);
$new = mysqli_query($conn,"SELECT * FROM article where id != $kode order by id asc limit 3 ");
}
?>
    <!-- Page Title
		============================================= -->
	
    <!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<div class="row gutter-40 col-mb-80">
						<!-- Post Content
						============================================= -->
						<div class="postcontent col-lg-9 order-lg-last">

							<div class="single-post mb-0">

								<!-- Single Post
								============================================= -->
								<div class="entry clearfix">

									<!-- Entry Title
									============================================= -->
									<div class="entry-title">
										<h2>This is a Standard post with a Preview Image</h2>
									</div><!-- .entry-title end -->

									<!-- Entry Meta
									============================================= -->
									<div class="entry-meta">
										<ul>
											<li><i class="icon-calendar3"></i> <?=date_format($date,"d F Y");?></li>
											<li><a href="#"><i class="icon-user"></i> <?=$article['author'];?></a></li>
											<li><a href="#"><i class="icon-camera-retro"></i></a></li>
										</ul>
									</div><!-- .entry-meta end -->

									<!-- Entry Image
									============================================= -->
									<div class="entry-image">
										<a href="#"><img src="global_assets/images/tumbnail/<?=$article['tumbnail']?>" style="max-height: 400px" alt="Blog Single"></a>
									</div><!-- .entry-image end -->

									<!-- Entry Content
									============================================= -->
									<div class="entry-content mt-0">
									<?=$article['content']?>
									</div>
								</div><!-- .entry end -->

						

								<div class="related-posts row posts-md col-mb-30">

									
								</div>


							</div>

						</div><!-- .postcontent end -->

						<!-- Sidebar
						============================================= -->
						<div class="sidebar col-lg-3">
							<div class="sidebar-widgets-wrap">


                            <div class="widget clearfix">

                                <h4>Recent Posts</h4>
                                <div class="posts-sm row col-mb-30" id="post-list-sidebar">
                                    <?php while($row = mysqli_fetch_assoc($new)){
                                        $date2=date_create($row['date']);
                                        $id = $row['id'];?>
                                    <div class="entry col-12">
                                        <div class="grid-inner row no-gutters">
                                            <div class="col-auto">
                                                <div class="entry-image">
                                                    <a href="article.php?kode=<?=$id?>"><img src="global_assets/images/tumbnail/<?=$row['tumbnail']?>" alt="Image" style="max-height:60px;max-width:60px"></a>
                                                </div>
                                            </div>
                                            <div class="col pl-3">
                                                <div class="entry-title">
                                                    <h4><a href="article.php?kode=<?=$id?>"><?=$row['title']?></a></h4>
                                                </div>
                                                <div class="entry-meta">
                                                    <ul>
                                                        <li><?=date_format($date2,"d F Y");?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                </div>

                                </div>


							
							</div>
						</div><!-- .sidebar end -->
					</div>

				</div>
			</div>
		</section><!-- #content end -->
<?php include 'footer.php' ?>