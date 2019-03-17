<?php

	session_start();
	include 'db_con.php';

/* 
	The user has clicked on 'Register an account', now we need to register the credentials and then the user can login.
	We'll have a register form with POST method that redirects onto the same page where we'll grad the info and register them into our db.
	If the credentials are not successfully inserted, we prompt the user to try again (via a message in session).
	If the credentials are inserted successfully, we redirect the user to our login page.
	todo: Confirmation of account via email.
*/

	if(!empty($_POST))
	{
		//If POST is not empty it means the user has already inserted info into the form.
		//Now we need to check whether the info is valid or else.
		//Then we'll insert them into our database and after that we'll redirect the user to login.php.
		echo("Prova<br/>");
	}
	else
	{
		//If POST is empty, show the registration form
		?>

		<h2>Registration form</h2><br/>
		<form method="POST">
			Username: <input type="text" name="user"><br/>
			Email: <input type="email" name="email"><br/>
			Password: <input type="text" name="pass"><br/>
			<input type="submit" value="Submit">
		</form>

		<?php
	}