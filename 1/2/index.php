<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Web технологии домашна работа №1.2</title>
	</head>
	<body>
        <?php
            require_once 'PageHelper.php';
            
        	$data = array(
        		'webgl' => array('title' => 'Компютърна графика с WebGL',
        						'description' => '...',
        						'lecturer' => 'доц. П. Бойчев'),
        		'go' => array('title' => 'Програмиране с Go',
        					'description' => '...',
        					'lecturer' => 'Николай Бачийски')
        	);
        	
        	echo PageHelper::showNav($data, 'webgl');
        	
        	if(isset($_GET['page'])) {
        		echo PageHelper::showPage($data, $_GET['page']);
        	}
        ?>
	</body>
</html>