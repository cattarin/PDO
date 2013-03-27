<?php

define('HOST', 'localhost');
define('DB_NAME', 'pdo');
define('USER', 'root');
define('PASS', '');

$dsn = 'mysql:host='.HOST.';dbname='.DB_NAME;

try {
    $bd = new PDO($dsn,USER,PASS);
    $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//    echo 'CONECTADO!!!';
} catch (Exception $e) {
    echo htmlentities('Houve algum erro com a conexão com o Banco de dados: '. $e->getMessage());    
}

?>
