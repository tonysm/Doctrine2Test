# Projeto de teste do Doctrine2

Para testar o Doctrine2, fiz esse projeto.

## Criação do banco de dados

Usar o command do próprio doctrine para geração do banco de dados:

criar um arquivo __doctrine.php__ com o conteúdo:

	<?php

	define('DS', DIRECTORY_SEPARATOR);
	define('PS', PATH_SEPARATOR);

	set_include_path(__DIR__ . PS . __DIR__ . DS . "Doctrine" . PS . get_include_path());

	require "bin" . DS . "doctrine-pear.php";
