<?php		/* Opening php tag */
$servername = "teamfive30.cf0kv0kre6z4.us-east-2.rds.amazonaws.com";	/* Our database information */
$username = "teamfive30";	/ *I kept both the username and password the same during database creation to make things easier */
$password = "teamfive30";
$dbname = "Employee_User_Database";

/* Establish connection */
$conn = mysqli_connect($servername, $username, $password, $dbname);

/* Check if connection is made */
if (!$conn) {
	die("Connection to database failed: " . mysqli_connect_error());
}

echo "Connection to database successful";

/* To make a query to retrieve employee name from the database */
$EmployeeName = $_POST['searchName'];		/* The 'searchName' is the name of whatever html function on the page that is using the search function. 
							Example is shown in the sample html above */

$result = mysqli_query($conn, "SELECT FirstName, Lastname FROM Employees
    WHERE FirstName LIKE '%{$EmployeeName}%' OR LastName LIKE '%{$EmployeeName}%'");		/* Begins SQL query */ 

if (mysqli_num_rows($result) > 0) {
	while ($row = $mysqli_fetch_array($result)) {		/* This outputs the results */
	echo "<br> Name: ". $row["LastName"]. ", ". $row["FirstName"]  . "<br>";
	}
} 
else {
	echo "0 results found";
}

mysqli_close($conn);		/* To end connection to database. Required to prevent unauthorized access.*/
?>     <---/* Closing php tag */