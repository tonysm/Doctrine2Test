<?php

namespace Application\Controllers;

/**
* @author Luiz Messias <tonyzrp@gmail.com>
*/
class FrontController
{
	private static $defaults = array(
		'controller' => 'Index',
		'action' => 'index'
	);

	/**
	 * seleciona o controller que executará a requisição
	 * controller default: IndexController
	 * action default: indexAction
	 * 
	 * @param array $request array $_GET
	 * @return void
	 */
	public static function dispatch( $request )
	{
		$defaults = array_merge(self::$defaults, $request);

		$controller = ucfirst($defaults['controller']) . "Controller";
		$action = $defaults['action'] . "Action";

		try {
			
			$controllerNS = "\\Application\\Controllers\\{$controller}";

			$pageController = new $controllerNS();

			$pageController->execute($action);

		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}
}