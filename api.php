<?php

//leggo il file json dal disco
$datiTodos = file_get_contents("dati.json");


//se ho i dati per aggiungere uno studente...
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
    
}


header('Content-Type: application/json');

echo $datiTodos;