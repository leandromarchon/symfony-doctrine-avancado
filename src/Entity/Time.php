<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TimeRepository")
 */
class Time
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $escudo;

    /**
     * @var string
     * @ORM\Column(type="boolean")
     */
    private $ativo = 1;

    /**
     * @return mixed
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return self
     */ 
    public function setNome(string $nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */ 
    public function getEscudo()
    {
        return $this->escudo;
    }

    /**
     * @param string $escudo
     * @return self
     */ 
    public function setEscudo(string $escudo)
    {
        $this->escudo = $escudo;
        return $this;
    }
}
