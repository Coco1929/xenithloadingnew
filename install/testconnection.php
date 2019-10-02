<?php

if(isset($_POST['host']) && isset($_POST['db']) && isset($_POST['user'])) {
		$flag = true;
		
		try {
			$dsn = 'mysql:host=' . $_POST['host'] . ';dbname=' . $_POST['db'];

            $dbo = new PDO($dsn, $_POST['user'], (isset($_POST['password']) ? $_POST['password'] : ""));
		} catch(Exception $e) {
			$flag = false;
		}
		
		
        echo json_encode([
            'connection' => $flag
        ]);
} else {
 echo json_encode([
            'connection' => false
        ]);
}
		?>