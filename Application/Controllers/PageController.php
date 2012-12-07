<?php

namespace Application\Controllers;

/**
* @author Luiz Messias <tonyzrp@gmail.com>
*/
abstract class PageController
{
	protected $viewAttributes = array();

	public function __get($prop)
	{
		return $viewAttributes[$prop];
	}

	public function __set($prop, $value)
	{
		$this->viewAttributes[$prop] = $value;
	}
	
	/**
	 * responsável por executar a action do controller e, logo em seguida,
	 * chamar a view que será exibida.
	 * 
	 * @param string $action nome do método a ser executado
	 * @return void
	 */
	public function execute($action)
	{
		$this->$action();

		$path = str_replace('Controllers', 'Views', __DIR__);

		// convertendo Application\Controllers\NomeController -> nome
		$controller = str_replace("Application\\Controllers\\", '', get_class($this));
		$controller = strtolower(str_replace('Controller', '', $controller));

		// convertendo nomeAction -> nome.phtml
		$view = str_replace('Action', '', $action) . ".phtml";

		require_once $path . "/{$controller}/{$view}";



	}
}