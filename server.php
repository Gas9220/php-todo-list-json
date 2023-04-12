<?php
$todos = file_get_contents(__DIR__.'/todos.json');
$new_todo = isset($_POST['newTodo']) ? $_POST['newTodo'] : NULL;

if($new_todo !== NULL){
    $todos = json_decode($todos, true);
    $todos[] = [
        "text" => $new_todo,
        "done" => false
    ];

 $todos = json_encode($todos);
 file_put_contents(__DIR__.'/todos.json', $todos);
}

header('Content-Type: application/json');

echo $todos;
?>