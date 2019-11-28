
<?php
	require_once('dbCredentials.php');

	function db_connect(){
		$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if($connection === false){
		    die("ERROR: Could not connect. " . mysqli_connect_error());
		}

		return $connection;
	}

	function db_disconnect($dbIn){
		if(isset($connection)){
			mysqli_close($dbIn);
		}
	}	
?>