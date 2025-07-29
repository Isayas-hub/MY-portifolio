<?php include('db_connect.php');?>
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
						<b>List of Donors</b>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_donor">
					<img src="images/blood-donor.jpg" alt="Blood Donot" style="border:1px #000 solid" class="img-fluid" />
				</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Donor</th>
									<th class="">Blood Group</th>
									<th class="">Information</th>
									<th class="">Previuos Donation</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
								<?php 
								$i = 1;
								$donors = $conn->query("SELECT * FROM donors order by name asc ");
								while($row=$donors->fetch_assoc()):
									$prev  = $conn->query("SELECT * FROM donors where id = 1 and id = ".$row['id']." order by date(date_created) desc limit 1 ");
									$prev = $prev->num_rows > 0 ? $prev->fetch_array()['date_created'] : '';	
								?>
				
						<h3><?php echo htmlentities($result->name);?>
						</h3>
					</table>
<div class="card-body">
<table class="table table-bordered">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo htmlentities($result->id);?></td>
      </tr>
      <tr>
        <td>Blood Group</td>
        <td><?php echo htmlentities($result->blood_group);?></td>
      </tr>
      <tr>
        <td>Donor Name.</td>
        <td><?php echo htmlentities($result->name);?></td>
      </tr>
         <tr>
        <td>Information</td>
        <td class="">
			<p>Address: <b><?php echo $row['address']; ?></b></p>
			<p>Contact #: <b><?php echo $row['contact']; ?></b></p>
			<p>Email: <b><?php echo $row['email']; ?></b></p>
		</td>
     		 </tr>
               <tr>
        <td>Date</td>
        <td><?php echo htmlentities($result->date_created);?></td>
      </tr>
    </tbody>
</table>
</div>
