<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM announce where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
}
?>
<div class="container-fluid">
	<form action="" id="manage_announcementn">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>" required>
		<div class="form-group">
			<label for="" class="control-label">Announcement ID/num</label>
			<input type="text" class="form-control" name="announceid"  value="<?php echo isset($announceid) ? $announceid :'' ?>" required='true' maxlength="10">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Announcement Title</label>
			<input type="text" class="form-control" name="title"  value="<?php echo isset($title) ? $title :'' ?>" required='true'>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Blood Group</label>
			<textarea cols="30" rows = "1" required="true" name="blood_group" class="form-control"><?php echo isset($blood_group) ? $blood_group :'' ?></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Organized BY</label>
			<input type="email" class="form-control" name="organized"  value="<?php echo isset($organized) ? $organized :'' ?>" required='true' maxlength="20">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Requirement</label>
			<input type="text" class="form-control" name="requirement"  value="<?php echo isset($requirement) ? $requirement :'' ?>" required='true'>
		</div>
		<div class="form-group">
	        	<label for="" class="control-label">Address</label>
			<input type="text" class="form-control" name="address"  value="<?php echo isset($address) ? $address :'' ?>" required='true'>	
		</div>
		<div class="form-group">
			<label for="" class="control-label">Date</label>
			<input type="date" class="form-control" name="date"  value="<?php echo isset($date) ? $date :'' ?>" required='true'>
		</div>
	</form>
</div>
<script>
	
	$('#manage_announcementn').submit(function(e){
		e.preventDefault()
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_announcementn',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully saved.",'success')
						setTimeout(function(){
							location.reload()
						},1000)
				}
			}
		})
	})
</script>