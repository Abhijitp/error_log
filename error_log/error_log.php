<?php
error_reporting(E_ALL);
include('db_connect.php');
function myCustomHandler($errNo, $errStr = null, $errFile = null, $errLine = null) {
	$obj = Database::getInstance();
	$db = $obj->getConnection();
	//create the error_log table if it does not exist
	$createQuery = "CREATE TABLE `error_log` (`id` int(11) NOT NULL AUTO_INCREMENT, `error_type` varchar(255) DEFAULT NULL, `error_string` varchar(255) DEFAULT NULL, `error_file` varchar(255) DEFAULT NULL, `error_line` varchar(255) DEFAULT NULL, `log_time` datetime DEFAULT NULL, PRIMARY KEY (`id`) ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
	$db->exec($createQuery);
	
	$query = "INSERT INTO error_log (error_type, error_string, error_file, error_line, log_time) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $db->prepare($query);
	if(is_int($errNo)) {
		switch ($errNo) {
			case E_NOTICE:
			case E_USER_NOTICE:
			case E_STRICT:
				$stmt->execute(array("NOTICE", $errStr, $errFile, $errLine));
				break;
			case E_DEPRECATED:
			case E_USER_DEPRECATED:
				$stmt->execute(array("DEPRECATED", $errStr, $errFile, $errLine));
				break;
			case E_WARNING:
			case E_USER_WARNING:
				$stmt->execute(array("WARNING", $errStr, $errFile, $errLine));
				break;
			case E_ERROR:
			case E_USER_ERROR:
				$stmt->execute(array("FATAL", $errStr, $errFile, $errLine));
				exit("FATAL error $errStr at $errFile:$errLine");

			default:
				break;
		}
	} else {
		$stmt->execute(array("EXCEPTION", $errNo->getMessage() . " " . $errNo->getCode() . " " . $errNo->getTraceAsString(), $errNo->getFile(), $errNo->getLine()));
	}
	//we can also configure it to send emails and also can log the error in php log file
	//error_log("Error: [$errNo] $errStr",1, "someone@example.com","From: webmaster@example.com");
}
//calling custom error handler for both errors and exceptions.
set_error_handler("myCustomHandler");
set_exception_handler('myCustomHandler');