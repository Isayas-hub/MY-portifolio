
<?php include('db_connect.php');?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">	
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->
			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
<hr align="center">
<table>
<tr>
<td><img src="images/blood.png" width="1000" height="140"></td>
<td><img src="images/blood-donor111.jpg" width="1000" height="140"></td>
<td><img src="images/img5.jpg" width="1000" height="140"></td>
<td><img src="images/imga.jpg" width="1000" height="140"></td>
<td><img src="images/banner2.jpg" width="1000" height="140"></td>
<td><img src="images/banner3.jpg" width="1000" height="140"></td>
<td><img src="images/banner3.png" width="1000" height="140"></td>
<td><img src="images/img.jpg" width="1000" height="140"></td>
<td><img src="images/img1.jpg" width="1000" height="140"></td>
<td><img src="images/img2.jpg" width="1000" height="140"></td>
<td><img src="images/logo1.png" width="2000" height="140"></td>
<td><img src="images/logo.jpg" width="2000" height="140"></td>
</tr>
</table>
<hr>		
<h1 align='right'>YOU NEED BLOOD? 
<a href="requestform.html" title="Home">Click Here</a></h1>

<marquee color='red'><b><h1>Here you can Visit Blood Donars and also You can donate to save life! To DONATE go to home & click Donate link</h1></b></marquee>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_donor"/>
				</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover" border='1'>
							
								<tr>
									<th class="text-center">No</th>
									<th class="">Donor Full Name</th>
									<th class="">Blood Group</th>
									<th class="">Email</th>
									<th class="">Contact #</th>
									<th class="">Address</th>
									<th class="">Donation Date & Time</th>
									<th class="text-center">Action</th>
								</tr>
							
							<tbody>
								<?php 
								$i = 1;
								$donors = $conn->query("SELECT * FROM donors order by name asc ");
								while($row=$donors->fetch_assoc()):		
								?>
								<tr>
									<td class=""><?php echo $i++ ?></td>
									<td class="">
										 <p> <b><?php echo ucwords($row['name']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['blood_group'] ?></b></p>
									</td>
									<td class="">
										 <b><?php echo $row['email']; ?></td>
										<td class=""> <b><?php echo $row['contact']; ?></td>
										<td class=""> <b><?php echo $row['address']; ?>
									</td>
									<td>&nbsp;&nbsp;&nbsp
										<p> <b><?php echo $row['date_created'] ?></b></p>&nbsp;&nbsp;&nbsp
									</td>
									<td class="text-center">&nbsp;&nbsp;&nbsp
										<!--<button class="btn btn-sm btn-outline-primary edit_donor" type="button" data-id="<?php echo $row['id'] ?>" >Request</button>-->
										&nbsp;&nbsp;&nbsp<a class="nav-link" href="index.php">Go To Home</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	
</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	
	$('#new_donor').click(function(){
		uni_modal("New Donor","manage_donor.php","mid-large")
		
	})
	$('.edit_donor').click(function(){
		uni_modal("Manage donor Details","manage_donor.php?id="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.delete_donor').click(function(){
		_conf("Are you sure to delete this donor?","delete_donor",[$(this).attr('data-id')])
	})
	
	function delete_donor($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_donor',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>