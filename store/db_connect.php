
	
	
	<?php
$dblocation = "localhost"; // Имя сервера
$dbuser = "root";          // Имя пользователя
$dbpasswd = "";            // Пароль
$dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
if (!$dbcnx) // Если дескриптор равен 0 соединение не установлено
{
  echo("<P>В настоящий момент сервер базы данных не доступен, поэтому 
           корректное отображение страницы невозможно.</P>");
  exit();
}
?>
	
	
	//function connect_to_db(){
		//$server = "localhost";
	//	$username = "root";
	//	$password = "";
	//	$dbname = "slingsait";
	//	$conn = @mysql_connect($server,$username,$password)
		
	//	pg_connect("host=$server,
		//user=$username, password=$password,
		//dbname=$dbname");	
		
//		if(!$conn){
		//	echo "Unable to connect to database";
		//	return 0;
	//	}
	//	else{
	//		return $conn;
	//	}
	};
//?>
