<html>
	<head>
		<title>PHP CRUD</title>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	</head>
	<body>
		<?php require_once 'process.php'; ?>

		<?php 
		
		if(isset($_SESSION['message'])): ?>
	
		<div class="alert alert-<?=$_SESSION['msg_type']?>">


		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
		</div>
		<?php endif ?>
		<div class="container">
		<?php
			$mysqli = new mysqli('localhost', 'root', '', 'activitiesdatabase') or die(mysqli_error($mysqli));
			$result = $mysqli->query("SELECT * FROM activities") or die($mysqli->error);	
		?>
		
		<div class="row justify-content-center">
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Street</th>
						<th>City</th>
						<th>County</th>
						<th>State</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<?php
while($row = $result->fetch_assoc()):
				?>
		<tr>
			<td><?php echo $row['Name']; ?></td>
	<td><?php echo $row['Street']; ?></td>
	<td><?php echo $row['City']; ?></td>
	<td><?php echo $row['County']; ?></td>
	<td><?php echo $row['State']; ?></td>
	<td>
		<a href="index.php?edit=<?php echo $row['ID']; ?>"
			class="btn btn-info">Edit</a>
		<a href="process.php?delete=<?php echo $row['ID']; ?>"
			class="btn btn-danger">Delete</a>
	</td>
		</tr>
	<?php endwhile; ?>
			</table			
		</div>
		<?php

			function pre_r($array){
			echo'<pre>';
			print_r($array);
			echo'</pre>';
		}
		?>
		<div class="row justify-content-center">
		<form action="process.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter the Activity">
			</div>
			<div class="form-group">
			<label>Street</label>
			<input type="text" name="street" class="form-control" value="<?php echo $street; ?>" placeholder="Enter the Street">
			</div>
			<div class="form-group">
			<label>City</label>
			<input type="text" name="city" class="form-control" value="<?php echo $city; ?>" placeholder="Enter the City">
			</div>
			<div class="form-group">
			<label>County</label>
			<input type="text" name="county" class="form-control" value="<?php echo $county; ?>" placeholder="Enter the County">
			</div>
			<div class="form-group">
			<label>State</label>
			<input type="text" name="state" class="form-control" value="<?php echo $state; ?>" placeholder="Enter the State">
			</div>
			<div class="form-group">
			<?php
			if($update == true):
			?>
				<button type="submit" class="btn btn-primary" name="update">Update</button>
			<?php else: ?>
			<button type="submit" class="btn btn-primary" name="save">Save</button>
			<?php endif; ?>
			</div>
			
		</form>
		</div>
	</body>
