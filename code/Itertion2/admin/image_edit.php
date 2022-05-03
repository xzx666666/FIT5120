<?php
include_once ("../database.php");
$id=$_GET['id'];
$sql="select * from ko_base where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$sql2="select * from ko_habitat";
$result2=mysqli_query($con,$sql2);
$habitat=mysqli_fetch_all($result2,MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>KoBears</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
<?php include_once("header.php");?>
		<!-- Sidebar -->
		<?php include_once("sidebar.php");?>
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Images</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="image_list.php">Koalas Images</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Edit Image</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Edit</div>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label for="email2">Image</label>
										<div><img src="../<?=$row['image']?>" width="100"></div>
									</div>
									<div class="form-group">
										<label for="image_id">ID</label>
										<input type="email" class="form-control" id="image_id" placeholder="Enter Email" value="<?=$row['id']?>"  readonly >
									</div>
									<div class="form-group">
										<label for="description">Description</label>
										<textarea name="description" id="description" class="form-control"><?=$row['description']?></textarea>
									</div>
					
									<div class="form-group">
										<label for="exampleFormControlSelect1">Habitat</label>
										<select class="form-control" name="habitat" id="habitat">
											<?php foreach($habitat as $k=>$v){ ?>
												<option value="<?=$v['id']?>"><?=$v['title']?></option>
											<?php }?>
										</select>
									</div>
									<div class="form-group">
										<label for="like">Like</label>
										<input type="text" class="form-control" id="like" placeholder="like" value="<?=$row['like']?>"   >
									</div>
									<div class="form-check">
										<label>Status</label><br/>
										<label class="form-radio-label">
											<input class="form-radio-input" type="radio" name="status" value="0"  <?php echo  $row['status']==0?"checked":""; ?> >
											<span class="form-radio-sign">Pending</span>
										</label>
										<label class="form-radio-label ml-3">
											<input class="form-radio-input" type="radio" name="status" value="1" <?php echo  $row['status']==1?"checked":""; ?> >
											<span class="form-radio-sign">Adopt</span>
										</label>
										<label class="form-radio-label ml-3">
											<input class="form-radio-input" type="radio" name="status" value="2"<?php echo  $row['status']==2?"checked":""; ?> >
											<span class="form-radio-sign">Refuse</span>
										</label>
									</div>

									
								</div>
								<div class="card-action">
									<button class="btn btn-success" onclick="postForm();">Submit</button>
								</div>
							</div>
						
						</div>
					
					</div>
				</div>
			</div>
			
		</div>
		
		
	</div>
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Azzara JS -->
	<script src="assets/js/ready.min.js"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="assets/js/setting-demo.js"></script>
</body>
</html>
<script src="https://cdn.bootcdn.net/ajax/libs/layer/3.5.1/layer.js"></script>
<script type="text/javascript">
	
	function postForm(){
		var id=$("#image_id").val();
		var description=$("#description").val();
		var habitat=$("#habitat").val();
		var like=$("#like").val();
		var status=$("input[name='status']:checked").val();
		$.post("../ajax.php?do=updateImage",{id:id,description:description,habitat:habitat,like:like,status:status},function(res){
			layer.msg("Success");
		});
		
	}
	
</script>