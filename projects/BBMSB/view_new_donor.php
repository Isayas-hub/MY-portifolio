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
						<b>List of Donors those need Appointment</b>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_donors">
					

				</a></span>
					</div>
					<div class="card-body">

						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<td class="">Information</th>
               								<th class="">Woreda</th>
									<th class="">Kebele</th>
									<th class="">Blood Type</th>
									<th class="">Gender</th>
									<th class="">Age</th>
									<th class="">Phone</th>
									<th class="">Email</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$regdonors = $conn->query("SELECT * FROM regdonors");
								while($row=$regdonors->fetch_assoc()):
										
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <p>Name:<b><?php echo ucwords($row['firstname']) ?></b></p>
										 <p>Father: <b><?php echo ucwords($row['lastname']) ?></b></p>
									      	 <p>Gfather:<b><?php echo ucwords($row['middlename']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['woreda'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['kebele'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['bloodtype'] ?></b></p>
									</td>
									<td class="">			
										 <p> <b><?php echo $row['gender'] ?></b></p>
									</td>
									<td class="">			
										 <p> <b><?php echo $row['age'] ?></b></p>
									</td>
									<td class="">			
										 <p> <b><?php echo $row['phone'] ?></b></p>
									</td>
								    <td class="">			
										 <p> <b><?php echo $row['email'] ?></b></p>
									</td>
									
									<td class="text-center">

										<a href="appointment.html" title="Home">Appoint</a>
										<a href="recdelete.html" title="Home">Delete</a>
										
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
		uni_modal("New Donor","manage_viewnewdonor.php","mid-large")
		
	})
	$('.edit_new_donor').click(function(){
		uni_modal("Manage donor Details","manage_viewnewdonor.php?id="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.delete_new_donor').click(function(){
		_conf("Are you sure to delete this donor?","delete_viewnewdonor ",[$(this).attr('data-id')])
	})
	
	function delete_new_donor($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_new_donor',
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