<?php     //connessione al nostro database
	$connessione_al_server=mysqli_connect("localhost","root","");  // url, login e password
	if(!$connessione_al_server){
		exit;//die ('Non riesco a connettermi: errore '.mysqli_error()); // questo apparirà solo se ci sarà un errore
	}
 
	$db_selected=mysqli_select_db($connessione_al_server, "db_utenti_prova"); // dove io ho scritto "prova" andrà inserito il nome del db
	if(!$db_selected){
		exit;//die ('Errore nella selezione del database: errore '.mysqli_error()); // se la connessione non andrà a buon fine apparirà questo messaggio
	}
?>