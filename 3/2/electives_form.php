<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="electives.css">
		<title>Web технологии домашна работа №3</title>
	</head>
	<body>
		<h1>Добавяне на избираеми дисциплини</h1>
		<form action="electives.php" method="post" class="electivesForm">
			<?php if(isset($_GET['id'])): ?>
			<input type="hidden" name="id" value="<?= $_GET['id']; ?>">
			<?php endif; ?>
			
			<label for="title">Име на дисциплина:</label>
			<input type="text" name="title" id="title" maxlength="128" value="<?= (isset($_GET['title']) ? $_GET['title'] : "") ?>" required>
			
			<label for="lecturer">Преподавател:</label>
			<input type="text" name="lecturer" id="lecturer" maxlength="128" value="<?= (isset($_GET['lecturer']) ? $_GET['lecturer'] : "") ?>" required>
			
			<label for="description">Описание:</label>
			<textarea name="description" id="description" rows="5" cols="22" maxlength="1024" required><?= (isset($_GET['description']) ? $_GET['description'] : "") ?></textarea>
			
			<input type="submit" value="Изпрати">
		</form>
	</body>
</html>