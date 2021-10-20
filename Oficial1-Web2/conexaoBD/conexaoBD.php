<?php

// Conexão com o Banco de Dados

/** O nome do banco de dados*/
define('DB_NAME', 'Livraria');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Adicionando as credenciais do banco */
$conexao = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>