<?php

	$longopts  = array(
		"host:",
		"user:",
		"password:",
		"database:"
	);

	$shortopts = "h:u:p:d:";

	$options = getopt($shortopts, $longopts);

	$host = NULL;
	$user = NULL;
	$password = NULL;
	$database = NULL;

	// Si el numero de argumentos es correcto
	if( $argc == 5 || $argc == 9 ){
		
		// Verificamos la opcion HOST
		if( isset($options['h']) )
			$host = $options['h'];
		if( isset($options['host']) )
			$host = $options['host'];
		// Verificamos la opcion USER
		if( isset($options['u']) )
			$user = $options['u'];
		if( isset($options['user']) )
			$user = $options['user'];
		// Verificamos la opcion PASSWORD
		if( isset($options['p']) )
			$password = $options['p'];
		if( isset($options['password']) )
			$password = $options['password'];
		// Verificamos la Opcion DATABASE
		if( isset($options['d']) )
			$database = $options['d'];
		if( isset($options['database']) )
			$database = $options['database'];

		// Si estan definidas todas la variables necesarias
		if( $host && $user && $password && $database ){
			$conexion = new mysqli($host, $user, $password, $database);

			$result = mysqli_query($conexion,
			" SELECT DISTINCT table_name, constraint_name".
		  	" FROM information_schema.key_column_usage".
		  	" WHERE constraint_schema = '$database'".
		  	" AND referenced_table_name IS NOT NULL");
			while($row = mysqli_fetch_assoc($result)) {
				mysqli_query($conexion,
					"ALTER TABLE '$row[table_name]'"." DROP FOREIGN KEY '$row[constraint_name]'")
				or die(mysqli_error());
				mysqli_close($conexion);
			}
		}
	}else{
		print "Usage: php ".$argv[0]." [All Options]\n\n";
		print "Options: (Order doesn't Matter)\n";
		print "\t-h <IP Address>\n";
		print "\t-d <DB>\n";
		print "\t-u <UserName>\n";
		print "\t-p <Password>\n";
		print "\n\n";
		print "Example: php ".$argv[0]." -d DatabaseName -h 127.0.0.1 -p password -u username\n";
		print "Example: php ".$argv[0]." -d=DatabaseName -h=127.0.0.1 -p=password -u=username\n";
		print "Example: php ".$argv[0]." --database DatabaseName --host 127.0.0.1 --password password --user username\n";
		print "Example: php ".$argv[0]." --database=DatabaseName --host=127.0.0.1 --password=password --user=username\n";
	}
	return 0;
?>