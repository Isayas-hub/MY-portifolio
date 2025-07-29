
<table style="background-image:url(images1/bgtable.jpg); font-size:24px">
<tr>
<td>It is now </td>
<td>&nbsp;</td>
<td>
<script type="text/javascript">
<!--
var currentTime = new Date()
var month = currentTime.getMonth() + 1
var day = currentTime.getDate()
var year = currentTime.getFullYear()
document.write(month + "/" + day + "/" + year)
//-->
</script>
&nbsp;
<script type="text/javascript">
<!--
var currentTime = new Date()
var hours = currentTime.getHours()
var minutes = currentTime.getMinutes()
if (minutes < 10){
minutes = "0" + minutes
}
document.write(hours + ":" + minutes + " ")
if(hours > 11){
document.write("PM")
} else {
document.write("AM")
}
//-->
</script>
</td></tr>
</table>



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
                         NEW ANNOUNCEMENTS 
</p></h1>




						<marquee><b><h1>Please be ready to DONATE on the specified date</h1></b></marquee>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_donor"/>
				</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover" border='1'>
							
								<tr>
									<th class="text-center">No</th>
									<th class="">Announcement Num</th>
									<th class="">Title</th>
									<th class="">Blood Group</th>
									<th class="">Organized By:</th>
									<th class="">Requirements</th>
									<th class="">Address/Place</th>
									<th class="">Collection Date</th>
									<th class="text-center">Action</th>
								</tr>
							
						
								<?php 
								$i = 1;
								$donors = $conn->query("SELECT * FROM announce order by address asc ");
								while($row=$donors->fetch_assoc()):		
								?>
								<tr>
									<td class=""><?php echo $i++ ?></td>
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
										 <p> <b><?php echo ucwords($row['organized']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['requirement']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['address']) ?></b></p>
									</td>
									
									<td>&nbsp;&nbsp;&nbsp
										<p> <b><?php echo $row['date'] ?></b></p>&nbsp;&nbsp;&nbsp
									</td>
									<td class="text-center">&nbsp;&nbsp;&nbsp
										<!--<button class="btn btn-sm btn-outline-primary edit_donor" type="button" data-id="<?php echo $row['id'] ?>" >Request</button>-->
										&nbsp;&nbsp;&nbsp<a class="nav-link" href="home-Copy1.html"></button>
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