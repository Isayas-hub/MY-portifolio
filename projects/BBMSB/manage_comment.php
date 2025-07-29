<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM comment where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
}
?>
<div class="container-fluid">
	<form action="" id="manage-comment">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="" class="control-label">First Name</label>
			<input type="text" class="form-control" name="firstname"  value="<?php echo isset($firstname) ? $firstname :'' ?>" required='true'>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Last Name</label>
			<textarea cols="30" rows = "2" required="true" name="lastname" class="form-control"><?php echo isset($lastname) ? $lastname :'' ?></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">User Type</label>
			<input type="email" class="form-control" name="usertype" maxlength="15" value="<?php echo isset($usertype) ? $usertype :'' ?>" required='true'>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Email #</label>
			<input type="text" class="form-control" name="email" maxlength="10"  pattern="[0-9]+" value="<?php echo isset($email) ? $email :'' ?>" required='true'>
		</div>
<div class="form-group">
			<label for="" class="control-label">Message #</label>
			<input type="text" class="form-control" name="feedback" maxlength="10"  pattern="[0-9]+" value="<?php echo isset($feedback) ? $feedback :'' ?>" required='true'>
		</div>
		
	</form>
</div>
<script>
	
	$('#manage-comment').submit(function(e){
		e.preventDefault()
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_comment',
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