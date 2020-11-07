<?php
	$data = json_decode($_POST['data']);
	if(isset($data->username) && isset($data->password)) {
		//should also validate user input here
		echo "Успешна регистрация.";
	}
?>