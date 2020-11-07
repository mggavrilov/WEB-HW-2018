<?php

    require_once('Database.php');

    function showForm($params = null) {
        header("Location: electives_form.php" . ($params ? "?$params" : ""));
        exit;
    }
    
    $db = new Database();
    
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        if(isset($_GET['id']) && (int)$_GET['id'] > 0) {
            $id = (int)$_GET['id'];
            
            $elective = $db->getElective($id);
            
            $params = "";
            $counter = 0;
            
            foreach($elective as $key => $value) {
                if($counter++) {
                    $params .= "&";
                }
                
                $params .= "$key=$value";
            }
            
            showForm($params);
        }
        else {
            showForm();
        }
    }
    else if($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        
        $params = "";
        
        if(isset($_POST['id']) && (int)$_POST['id'] > 0) {
            $id = (int)$_POST['id'];
            $save['id'] = $id;
            
            $counter = 0;
            
            foreach($save as $key => $value) {
                if($counter++) {
                    $params .= "&";
                }
                
                $params .= "$key=$value";
            }
        }
        
        $db->saveElective($save);
        
        showForm($params);
    }

?>