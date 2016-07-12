	<?Php
	include('../db_connect.php');
	$obj = Database::getInstance();
	$db = $obj->getConnection();
	?>
	<?php
	if(isset($_POST['errorName'])) {
		if($_POST['errorName'] != '') {
			$stmt = $db->query("SELECT * FROM error_log WHERE error_type='".$_POST['errorName']."'");
		} else {
			$stmt = $db->query("SELECT * FROM error_log");
		}
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="#" onClick="getErrors('');">
						<h3 class="panel-title"><i class="fa fa-money fa-fw"></i>All Errors</h3>
					</a>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th><?php echo "Error Type"; ?></th>
									<th><?php echo "Error String"; ?></th>
									<th><?php echo "Error File"; ?></th>
									<th><?php echo "Error Line"; ?></th>
									<th><?php echo "Error Time"; ?></th>
									<th><?php echo "Update";?></th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($data as $errorRows) {
								?>
								<tr>
									<td><?php echo $errorRows['error_type']; ?></td>
									<td><?php echo $errorRows['error_string']; ?></td>
									<td><?php echo $errorRows['error_file']; ?></td>
									<td><?php echo $errorRows['error_line']; ?></td>
									<td><?php echo $errorRows['log_time']; ?></td>
									<td><a class="btn btn-block btn-default" id="complete" href="#" onclick="issueResolved('<?php echo $errorRows['id']; ?>');">Mark as Resolved</a>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	<?php 
	} else if(isset($_POST['errorId'])){
		if($_POST['errorId'] != '') {
			$stmt = $db->query("DELETE FROM error_log WHERE id='".$_POST['errorId']."'");
			echo "Done";
		}
	}
	?>