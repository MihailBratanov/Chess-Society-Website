<?php 
/**
TODO: 

4. get events by name
5. get event in time period
5. make a user participant in event

6. create tournamnets 


*/

global $db;

function createNewUser($firstName, $lastName, $membership, $email, $username, $password){
	$sql = "INSERT INTO Memebrs ";
	$sql .= "(first_name, last_name, memebrship, email, username, pass)";
	$sql .= "VALUES (".$firstName.",".$lastName.",".$memebrship.",".$email.",".$username.",".$hashedPass.")" ;

	mysqli_query($db, $sql);
}

//get the Full name, gender, DOB of a user passing the username 
function getUserPersonalDetails($username){
	$sql = "SELECT first_name, last_name, gender, DOB ";
	$sql .= "FROM Members WHERE username ='".$username."'";

	$result = mysqli_query($db, $sql);

	return $result;
}

//get user rating
function getUserElo ($username){
	$sql = "SELECT elo_rating ";
	$sql .= "FROM Members WHERE username ='".$username."'";

	$result = mysqli_query($db, $sql);

	return $result;
}

//get user membership
function getUserMembership ($username){
	$sql = "SELECT membership ";
	$sql .= "FROM Members WHERE username ='".$username."'";

	$result = mysqli_query($db, $sql);

	return $result;
}

function createEvent($name, $loc, $event_date, $publish_date){
	$sql = "INSERT INTO Events";
	$sql .= "(name, location, event_date, publish_date)";
	$sql .= 'VALUES ( "'.$name . '", ' . $loc . '", ' . $event_date . '", ' . $publish_date . '")';

	mysqli_query($db, $sql);
}

// get events between specific time period
function getEventsBetweenDates($date){
	$sql = "SELECT * FROM Events";
	$sql .= 'WHERE "' . $date . '" BETWEEN event_date AND publish_date';

	$result = mysqli_query($db, $sql);

	return $result;
}

// get events between specific time period
function getEventsByName($date){
	$sql = "SELECT * FROM Events";
	$sql .= 'WHERE "' . $date . '" BETWEEN event_date AND publish_date';

	$result = mysqli_query($db, $sql);

	return $result;
}


 ?>