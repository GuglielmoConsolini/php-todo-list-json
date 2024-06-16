<?php

//leggo il file json dal disco
$datiTodos = file_get_contents("dati.json");

//controllo di avere il necessario per creare un nuovo utente
if( isset($_POST["task"]) ) {

  //converto il json in un array associativo php
  $todos = json_decode($datiTodos, true);

  //creo un nuovo studente
  $newTask = [
    "task" => $_POST["task"],
    
  ];

  //pusho lo studente appena creato nel mio array
  $todos[] = $newTask;

  //converto tutto l'array in un json
  $datiTodos = json_encode($todos);

  //scrivo il json su disco
  file_put_contents("dati.json", $datiTodos);

} else {
  //se non ho tutto il necessario... niente, restituisco la lista inalterata
  //in realtà sarebbe preferibile dare un'errore ma ai fini del nostro esercizio va bene così
}

//Setto l'header
header('Content-Type: application/json');

//restituisco il nuovo json con il contenuto aggiornato del file
echo $datiTodos;