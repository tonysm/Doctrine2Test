<?php

namespace Application\Controllers;

use Application\Entities\Pessoa as Pessoa;

/**
* @author Luiz Messias <tonyzrp@gmail.com>
*/
class PessoaController extends PageController
{
	public function indexAction()
	{
		$em = $GLOBALS['em'];

		$query = $em->createQuery('select p from Application\Entities\Pessoa p');

		$this->pessoas = $query->getResult();
	}

	public function editarAction()
	{
		$id = (int) isset($_GET['id']) ? $_GET['id'] : 0;

		$em = $GLOBALS['em'];

		$pessoa = $em->find('Application\Entities\Pessoa', $id);

		$this->pessoa = empty($pessoa) ? new Pessoa() : $pessoa;
	}

	public function saveAction()
	{
		$id = (int) isset($_POST['id']) ? $_POST['id'] : 0;
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$dataNascimento = $_POST['dataNascimento'];

		$em = $GLOBALS['em'];

		$pessoa = $em->find('Application\Entities\Pessoa', $id);
		$pessoa = empty($pessoa) ? new Pessoa() : $pessoa;

		$pessoa->setNome($nome);
		$pessoa->setEmail($email);
		$pessoa->setDataNascimento($dataNascimento);

		$em->persist($pessoa);

		$msg = "Pessoa cadastrada com sucesso!";

		try {
			$em->flush();
		} catch (Exception $e) {
			$msg = "Ocorreu um erro: " . $e->getMessage();
		}

		$this->mensagem = $msg;
	}

	public function excluirAction()
	{
		$id = (int) isset($_GET['id']) ? $_GET['id'] : 0;
		$em = $GLOBALS['em'];

		$pessoa = $em->find('Application\Entities\Pessoa', $id);

		$em->remove($pessoa);

		$msg = "Pessoa excluída com sucesso!";

		try {
			$em->flush();
		} catch (Exception $e) {
			$msg = "Ocorreu um erro: " . $e->getMessage();
		}

		$this->mensagem = $msg;
	}
}