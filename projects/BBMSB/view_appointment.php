




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


<style>
/* (A) BLINKING KEYFRAMES */
@keyframes blinkingB {
  0% { color: blue; }
  100% { color: red; }
}
/* (B) ATTACH BLINKING KEYFRAMES TO TEXT */
#demoB {
  font-size: 1.3em; font-weight: 1000;
  animation: blinkingB 2s infinite;
}
</style><h1>
<p id="demoB" align="center">
                         APPOINTMENT DATE
</p></h1>




						<marquee><b><h1>This is Your Appointment Date</h1></b></marquee>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_donor"/>
				</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover" border='1'>
							
								<tr>
									<th class="text-center">No</th>
					
									<th class="">Email</th>
									<th class="">Date of this Message is Written</th>
									<th class="">Date of your Appointment:</th>
									<th class="">Detail Information</th>
									<th class="text-center">Action</th>
								</tr>
							
						
								<?php 
								$i = 1;
								$appointment = $conn->query("SELECT * FROM appointment1");
								while($row=$appointment->fetch_assoc()):		
								?>
								<tr>

									<td class=""><?php echo $i++ ?></td>
									
									<td class="">
										 <p> <b><?php echo ucwords($row['email']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['message_date'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['assigned_date']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['feedback']) ?></b></p>
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