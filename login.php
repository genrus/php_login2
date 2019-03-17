<?php
session_start();
include 'db_con.php';


//Check if the post variables 'user' and 'pass' are set, and if they're not, set the local variables to 'not_valid'.
//This is to differentiate the two behaviours that this script might accomodate.
//In the first scenario, being the $_POST variables not set, we need the user to insert them into our form below.
//In the second scenario the variables are set and therefore we need to check the credentials on the database.

if(!isset($_POST['user']) || !isset($_POST['pass']))
{
	$usern = 'not_valid';
	$passw = 'not_valid';
}
else
{
	$usern = $_POST['user'];
	$passw = $_POST['pass'];
}

//BINARY 
//This is the query to check the user credentials:

$query = mysqli_query($connessione_al_server, "SELECT * FROM cred_utenti WHERE username = '".$usern."'COLLATE latin1_general_cs AND password = '".$passw."' COLLATE latin1_general_cs;");

//If the resulting query has 1 row, it means the credentials inserted are correct and our user can be logged into our site.
//Or else, the script checks if there is any data in our POST variable. If there is, it means that the authentication failed. 
//If there wasn't any, just show the form to prompt the user to insert the credentials.

if (mysqli_num_rows($query) == 1)
{
	//Found the user in the database, setting SESSION variables and heading to index.php.
	$_SESSION['user'] = $usern;
	$_SESSION['pass'] = $passw;
	//This message is to be seen on the index.php page, so we set the session variable 'message' to the message we want to print.
	$_SESSION['message'] = 'You successfully logged into this site!'; 
    $_SESSION['logged_in'] = true;
    header('Location: index.php');
    exit;
}
else 
{

	if(!empty($_POST))
	{
		//POST isn't empty, so the credentials must be wrong.
		echo("Something went wrong with the authentication<br/>");
	}
	//The form below refreshes the page, setting the post variables to the credentials inserted by the user

    ?>

    <form method="POST">
    Username: <input name="user" type="text"><br>
    Password: <input name="pass" type="text"><br><br>
    <input type="submit" value="submit">
    </form>

    <?php
}