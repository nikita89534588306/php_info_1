<?php
	require_once 'settingDB.php';

	//подключение к MySQL
	$connestion = new mysqli($host, $user, $pass, $data);
	if($connestion->connect_error) die('Error connection');

	// запрос данных
	$dataUsers = $connestion->query("SELECT * FROM users");
	if(!$dataUsers) die('No data users');

	$valueUsers = $dataUsers->num_rows;
	for ($numberUser=0; $numberUser<$valueUsers; ++$numberUser){
		[$id, $name, $age, $login] = $dataUsers->fetch_array(MYSQLI_NUM);
		echo "User name: " . $name .'. Login: ' . $login . '<br/>';
	}
	$dataUsers->close(); 	//закрыть запрос 
	$connestion->close();	//закрыть сессию соединения
?>