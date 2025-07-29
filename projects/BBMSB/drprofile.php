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
						<b>Here is Your Profile</b>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_announce">
					<i class="fa fa-plus"></i> 
				</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover" border="1">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">First Name</th>
									<th class="">Last Name</th>
									<th class="">Email</th>
																		<th class="">Your Password</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$i = 1;
								$createacc = $conn->query("SELECT * FROM createacc where order by firstname asc ");
								while($row=$createacc->fetch_assoc()):
                      							
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
																	
									<td class="">
										 <p> <b><?php echo ucwords($row['firstname']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['lastname']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['email']; ?></b></p>
									</td>
									
									<td class="">
										 <p> <b><?php echo $row['password']; ?></b></p>
									</td>
								
									
									<td class="text-center">
										<a href="answer_commenthtml.html" title="Home">Respond</a>
 										
										<button class="btn btn-sm btn-outline-danger delete_viewcomment" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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
	
	$('#new_announce').click(function(){
		uni_modal("New Announcement","manage_announce.php","mid-large")
		
	})
	$('.edit_viewcomment').click(function(){
		uni_modal("Manage announce Details","manage_viewcomment.php?id="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.delete_viewcomment').click(function(){
		_conf("Are you sure to delete this Announcement?","delete_viewcomment",[$(this).attr('data-id')])
	})
	
	function delete_viewcomment($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_viewcomment',
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