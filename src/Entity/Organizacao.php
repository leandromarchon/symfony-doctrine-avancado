<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrganizacaoRepository")
 */
class Organizacao
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
     * @var Campeonato
     * @ORM\OneToMany(targetEntity="App\Entity\Campeonato", mappedBy="organizacao")
     */
    private $campeonatos;

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
     * @return Campeonato
     */ 
    public function getCampeonatos()
    {
        return $this->campeonatos;
    }

    /**
     * @param Campeonato $campeonatos
     * @return self
     */ 
    public function setCampeonatos(Campeonato $campeonatos)
    {
        $this->campeonatos = $campeonatos;
        return $this;
    }
}
