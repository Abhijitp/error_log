<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Error Log Board</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<?Php
	include('../db_connect.php');
	$obj = Database::getInstance();
	$db = $obj->getConnection();
	?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Error Log</a>
            </div>
            <!-- Top Menu Items -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="charts.php"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
										<?php
										$stmt = $db->query('SELECT id FROM error_log WHERE error_type="WARNING"');
										$row_count = $stmt->rowCount();
										echo $row_count;
										?>
										</div>
                                        <div>Warnings!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" onClick="getErrors('WARNING');">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
										<?php
										$stmt = $db->query('SELECT id FROM error_log WHERE error_type="NOTICE"');
										$row_count = $stmt->rowCount();
										echo $row_count;
										?>
										</div>
                                        <div>Notice!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#"  onClick="getErrors('NOTICE');">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
										<?php
										$stmt = $db->query('SELECT id FROM error_log WHERE error_type="FATAL"');
										$row_count = $stmt->rowCount();
										echo $row_count;
										?>
										</div>
                                        <div>Fatal Error!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" onClick="getErrors('FATAL');">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                    </div>
                                    <div class="col-xs-9 text-right">
										<div class="huge">
										<?php
										$stmt = $db->query('SELECT id FROM error_log WHERE error_type="EXCEPTION"');
										$row_count = $stmt->rowCount();
										echo $row_count;
										?>
										</div>
                                        <div>Exceptions!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" onClick="getErrors('EXCEPTION');">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row" id="allData">
					<?php
					$stmt = $db->query("SELECT * FROM error_log");
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
												</td>
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
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	<script>
		function getErrors(errorName) {
			$.post( "getError.php", { errorName: errorName}).done(function( data ) {
				$("#allData").html(data);
			});
		}
		function issueResolved(errorId) {
			$.post( "getError.php", { errorId: errorId}).done(function( data ) {
				$.post( "getError.php", { errorName: ''}).done(function( data ) {
					$("#allData").html(data);
				});
			});
		}
	</script>
</body>

</html>
