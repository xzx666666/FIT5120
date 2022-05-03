
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
						<h4 class="page-title">Habitat</h4>
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
								<a href="Habitat_list.php">Habitat</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Add Habitat</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Add Habitat</div>
								</div>
								<div class="card-body">
									<div class="form-group" style="display: none;">
										<label for="exampleFormControlFile1">id</label>
										<input type="text" class="form-control" id="id" value="<?=$row['id']?>">
									</div>
									<div class="form-group">
										<label for="exampleFormControlFile1">Name</label>
										<input type="text" class="form-control" id="title" value="<?=$row['title']?>">
									</div>
									<div class="form-group">
										<label for="image_id">longitude</label>
										<input type="text" class="form-control" id="longitude" placeholder="Enter longitude" value="<?=$row['longitude']?>" >
									</div>
									<div class="form-group">
										<label for="image_id">latitude</label>
										<input type="text" class="form-control" id="latitude" placeholder="Enter latitude" value="<?=$row['latitude']?>" >
									</div>
									<div class="form-group">
										<label for="description">Description</label>
										<textarea name="description" id="description" class="form-control" ><?=$row['description']?></textarea>
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

		var formData = new FormData();
		formData.append("description",$("#description").val());
		formData.append("title",$("#title").val());
		formData.append("longitude",$("#longitude").val());
		formData.append("latitude",$("#latitude").val());
		formData.append("id",$("#id").val());


		$.ajax({
			type:"POST",
			url:"../ajax.php?do=addHabitat",
			data:formData,
			contentType: false,
            processData: false,
			success:function(res){
				console.log(res);
				if(res=="success"){
					layer.alert("uploaded successfully",{
						title:"message",
						btn:"Confirm"
					},function(){
						location.href="Habitat_list.php";
					});
					
				}
			}

		});
	}
	
</script>