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
     * @var Campeonato
     * @ORM\ManyToMany(targetEntity="App\Entity\Campeonato", mappedBy="times")
     */
    private $campeonatos;

    /**
     * @var Partida
     * @ORM\OneToMany(targetEntity="App\Entity\Partida", mappedBy="time_casa")
     */
    private $partidas_casa;

    /**
     * @var Partida
     * @ORM\OneToMany(targetEntity="App\Entity\Partida", mappedBy="time_visitante")
     */
    private $partidas_visitante;

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
     * @return Partida
     */ 
    public function getPartidas_casa()
    {
        return $this->partidas_casa;
    }

    /**
     * @param Partida $partidas_casa
     * @return self
     */ 
    public function setPartidas_casa(Partida $partidas_casa)
    {
        $this->partidas_casa = $partidas_casa;
        return $this;
    }

    /**
     * @return Partida
     */ 
    public function getPartidas_visitante()
    {
        return $this->partidas_visitante;
    }

    /**
     * @param Partida $partidas_visitante
     * @return self
     */ 
    public function setPartidas_visitante(Partida $partidas_visitante)
    {
        $this->partidas_visitante = $partidas_visitante;
        return $this;
    }
}
