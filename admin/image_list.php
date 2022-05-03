<?php
include_once ("../database.php");
$id=$_GET['id'];
$sql="select * from ko_base";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
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
						<h4 class="page-title">Koalas Images</h4>
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
								<a href="#">Koalas Images</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Images List</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Images List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>ID</th>
													<th>Image</th>
													<th>Habitat</th>
													<th>Description</th>
													<th>Date</th>
													<th>Like</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>ID</th>
													<th>Image</th>
													<th>Habitat</th>
													<th>Description</th>
													<th>Date</th>
													<th>Like</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php foreach($row as $k =>$v){?>
													<tr>
														<td><?=$v['id']?></td>
														<td><img src="../<?=$v['image']?>" width="100" height="100"></td>
														<td><?=$v['habitat']?></td>
														<td><?=$v['description']?></td>
														<td><?=$v['up_time']?></td>
														<td><?=$v['like']?></td>
														<td>
															<?php
																if($v['status']==0){echo '<button class="btn btn-xs btn-warning" >Pending</button>';}
																if($v['status']==1){echo '<button class="btn btn-xs btn-success" >Adopt</button>';}
																if($v['status']==2){echo '<button class="btn btn-xs btn-danger" >Refuse</button>';}
															?>
														</td>
														<td>
<div class="form-button-action">

														
												<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
													<a href="image_edit.php?id=<?=$v['id']?>"><i class="fa fa-edit"></i></a>
												</button>
												<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="delData(<?=$v['id']?>,'ko_base')">
													<i class="fa fa-times"></i>
												</button>
											</div>
														</td>
													</tr>
												<?php }?>
											</tbody>
										</table>
									</div>
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
	<!-- Datatables -->
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Azzara JS -->
	<script src="assets/js/ready.min.js"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="assets/js/setting-demo.js"></script>
	<script src="https://cdn.bootcdn.net/ajax/libs/layer/3.5.1/layer.js"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
</body>
</html>
<script type="text/javascript">
	// $.ajax({
	// 	url:"../ajax.php?do=getImagesList",
	// 	success:function(res){
	// 		var data=$.parseJSON(res);
	// 		var html="";
	// 		for(var i=0;i<data.length;i++){
	// 			var statusBtn="";
	// 			if(data[i]['status']==1){
	// 				statusBtn=`<button type="button" data-toggle="tooltip" title="" class="btn  btn-success btn-xs" data-original-title="Edit Task">adopt</button>`;
	// 			}else if(data[i]['status']==2){
	// 				statusBtn=`<button type="button" data-toggle="tooltip" title="" class="btn  btn-danger btn-xs" data-original-title="Edit Task">reject</button>`;
	// 			}else{
	// 				statusBtn=`<button type="button" data-toggle="tooltip" title="" class="btn  btn-warning btn-xs" data-original-title="Edit Task">pending</button>`;
	// 			}
	// 			html=html+`
	// 				<tr>
	// 												<td>`+data[i]['id']+`</td>
	// 												<td><img src="../`+data[i]['image']+`" width="100" height="120" ></td>
	// 												<td>`+data[i]['description']+`</td>
	// 												<td>`+data[i]['up_time']+`</td>
	// 												<td>`+data[i]['like']+`</td>
	// 												<td>`+statusBtn+`</td>
	// 												<td><div class="form-button-action">

														
	// 														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
	// 															<a href="image_edit.php?id=`+data[i]['id']+`"><i class="fa fa-edit"></i></a>
	// 														</button>
	// 														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="delData(`+data[i]['id']+`,'ko_base')">
	// 															<i class="fa fa-times"></i>
	// 														</button>
	// 													</div></td>
	// 											</tr>;
	// 			`
	// 		}
	// 		$("tbody").html(html);
	// 	}
	// });

	function delData(id,db){
		layer.confirm("Are you sure to delete?",{
			title:"warning",
			btn:['Confirm','Cancel'],
		},function(){
			$.post("../ajax.php?do=delData",{id:id,db:db},function(res){
				console.log(res);
				location.reload();
			});
		});
		
	}
</script>