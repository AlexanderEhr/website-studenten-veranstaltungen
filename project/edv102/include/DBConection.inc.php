<?php
		
		$dsn = 'mysql:host=localhost;port=3306;dbname=edv102';
		$user = 'root';
		$pwd = '';
		
		try {
			$db = new PDO($dsn, $user, $pwd, [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES => false,
			]);
			$db->exec('USE edv102');
		} catch(PDOException $e) {
			header('Location: wartung.php');
			die;
		}

?>