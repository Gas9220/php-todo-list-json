<?php
$todos = file_get_contents(__DIR__.'/todos.json');
header('Content-Type: application/json');
?>