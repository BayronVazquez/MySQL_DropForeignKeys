# MySQL_DropForeignKeys
Script de linea de comandos escrito en PHP que elimina las refencias de todas las tablas en una base de datos en un SGDB MySQL o MariaDB.

El uso del Scrip es Simple, basta con ejecutarlo desde una linea de comandos y muestra las opciones que
deben ser especificadas (pasadas como argumentos) para ser ejecutado exitosamente.

```php DropForeignKeys.php ```

El cual dara una salida como la siguiente:

```
Usage: php DropForeignKeys.php [All Options]
Options: (Order doesn't Matter)
	-h <IP Address>
	-d <DB>
	-u <UserName>
	-p <Password>

Example: php DropForeignKeys.php -d DatabaseName -h 127.0.0.1 -p password -u username
Example: php DropForeignKeys.php -d=DatabaseName -h=127.0.0.1 -p=password -u=username
Example: php DropForeignKeys.php --database DatabaseName --host 127.0.0.1 --password password --user username
Example: php DropForeignKeys.php --database=DatabaseName --host=127.0.0.1 --password=password --user=username
```

Muestra que se deben especificar 4 Opciones obligatorias para poder establecer conexion con MySQL ademas 
muestra algunos ejemplos de la manera correcta de ejecutar el script. Si el script se ejecuta de manera 
correcta no imprime nada en pantalla de lo contrario muestra el error que ha ocurrido.
