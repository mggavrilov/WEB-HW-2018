<?php

    function showForm() {
        header("Location: electives.html");
        exit;
    }
    
    if (empty($_POST['name']) || empty($_POST['lecturer']) || empty($_POST['description']) || empty($_POST['group']) || empty($_POST['credits'])) {
        showForm();
    }
    
    $name = $_POST['name'];
    $lecturer = $_POST['lecturer'];
    $description = $_POST['description'];
    $group = $_POST['group'];
    $credits = $_POST['credits'];
    
    if(!is_string($name) || strlen($name) > 150) {
        showForm();
    }
    
    if(!is_string($lecturer) || strlen($lecturer) > 200) {
        showForm();
    }
    
    if(!is_string($description) || strlen($description) < 10) {
        showForm();
    }
    
    //Normally, this array of IDs would come from the database, so this script, as well as the form,
    //know what electives there are and their corresponding IDs.
    //We're working without a database right now, so I'm just hard coding some values.
    $dbGroups = array(1 => 'М',
        2 => 'ПМ',
        3 => 'ОКН',
        4 => 'ЯКН'
    );
    
    if(!is_string($group) || !isset($dbGroups[$group])) {
        showForm();
    }
    
    if(!is_numeric($credits) || round($credits) != $credits || $credits < 1) {
        showForm();
    }
    
    $newElective = array('name' => $name,
        'lecturer' => $lecturer,
        'description' => $description,
        'group' => $dbGroups[$group],
        'credits' => (int)$credits
    );
    
    echo "<pre>";
    print_r($newElective);
    echo "</pre>";

?>