<?php

namespace Application\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="pessoas")
*/
class Pessoa
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 */
	private $id;
	/**
	 * @ORM\Column(type="string")
	 */
	private $nome;
	/**
	 * @ORM\Column(type="string")
	 */
	private $email;
	/**
	 * @ORM\Column(type="date", name="data_nascimento")
	 */
	private $dataNascimento;

	public function __construct()
	{
		$this->dataNascimento = \DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setDataNascimento($dataNascimento)
	{
		$data = \DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
		// yyyy-mm-dd
		if(preg_match('/^\d{4}-\d{1,2}-\d{1,2}$/', $dataNascimento)) {
			$data = \DateTime::createFromFormat('Y-m-d', $dataNascimento);
		}
		// dd/mm/yyyy
		if(preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $dataNascimento)) {
			$data = \DateTime::createFromFormat('d/m/Y', $dataNascimento);
		}

		$this->dataNascimento = $data;
	}

	public function getDataNascimento()
	{
		return $this->dataNascimento->format('d/m/Y');
	}
}