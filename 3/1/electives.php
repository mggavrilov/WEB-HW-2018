<?php

    require_once('Database.php');

    function showForm() {
        header("Location: electives.html");
        exit;
    }
    
    if (empty($_POST['title']) || empty($_POST['lecturer']) || empty($_POST['description'])) {
        showForm();
    }
    
    $title = $_POST['title'];
    $lecturer = $_POST['lecturer'];
    $description = $_POST['description'];
    
    if(!is_string($title) || strlen($title) > 128) {
        showForm();
    }
    
    if(!is_string($lecturer) || strlen($lecturer) > 128) {
        showForm();
    }
    
    if(!is_string($description) || strlen($description) > 1024) {
        showForm();
    }
    
    $save = array('title' => $title,
                  'description' => $description,
                  'lecturer' => $lecturer);
    
    $db = new Database();
    
    $db->saveElective($save);
    
    showForm();

?>