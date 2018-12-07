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
     * @var Organizacao;
     * @ORM\ManyToOne(targetEntity="App\Entity\Organizacao", inversedBy="filhos")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $pai;

    /**
     * @var Organizacao
     * @ORM\OneToMany(targetEntity="App\Entity\Organizacao", mappedBy="pai")
     */
    private $filhos;

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

    /**
     * @return Organizacao
     */ 
    public function getPai()
    {
        return $this->pai;
    }

    /**
     * @param Organizacao
     * @return self
     */ 
    public function setPai(Organizacao $pai)
    {
        $this->pai = $pai;
        return $this;
    }

    /**
     * @return Organizacao
     */ 
    public function getFilhos()
    {
        return $this->filhos;
    }

    /**
     * @param Organizacao $filhos
     * @return self
     */ 
    public function setFilhos(Organizacao $filhos)
    {
        $this->filhos = $filhos;
        return $this;
    }
}
