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
						<b>List of Announcements</b>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_announcementn">
					<i class="fa fa-plus"></i> New Entry 
				</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Announcement num</th>
									<th class="">Announcement Title</th>
									<th class="">Blood Type</th>
									<th class="">Organized By</th>
									<th class="">Requirements</th>
									<th class="">Address</th>
									<th class="">Date</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$i = 1;
								$announce = $conn->query("SELECT * FROM announce order by address asc ");
								while($row=$announce->fetch_assoc()):
                      							
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
										
									<td class="">
										 <p> <b><?php echo ucwords($row['announceid']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['title']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['blood_group'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['organized']; ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['requirement']; ?></b></p>
									</td>
									<td class="">
										 <p><b><?php echo $row['address']; ?></b></p>
									</td>
									<td class="">
										 <p><b><?php echo $row['date']; ?></b></p>
									</td>
									
									<td class="text-center">
<a href="recdeleteann.html" title="Home">Delete</a>
										
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
	
	$('#new_announcementn').click(function(){
		uni_modal("New Announcement","manage_announcementn.php","mid-large")
		
	})
	$('.edit_announcementn').click(function(){
		uni_modal("Manage announcement Details","manage_announcementn.php?id="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.delete_announcementn').click(function(){
		_conf("Are you sure to delete this Announcement?","delete_announcementn",[$(this).attr('data-id')])
	})
	
	function delete_announcementn($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_announcementn',
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