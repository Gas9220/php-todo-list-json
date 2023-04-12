<?php
$todos = file_get_contents(__DIR__ . '/todos.json');
$new_todo = isset($_POST['newTodo']) ? $_POST['newTodo'] : NULL;
$newValue = isset($_POST['done']) ? $_POST['done'] : NULL;


if ($new_todo !== NULL && $new_todo !== '') {
    $todos = json_decode($todos, true);
    $todos[] = [
        "text" => $new_todo,
        "done" => false
    ];

    $todos = json_encode($todos);
    file_put_contents(__DIR__ . '/todos.json', $todos);
}

if ($newValue !== null) {
    $todos = json_decode($todos, true);
    $todos[$newValue]['done'] = !$todos[$newValue]['done'];

    $todos = json_encode($todos);
    file_put_contents(__DIR__ . '/todos.json', $todos);
}

header('Content-Type: application/json');

echo $todos;
