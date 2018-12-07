<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartidaRepository")
 */
class Partida
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
    private $descricao;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $placar_visitante;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $placar_casa;

    /**
     * @var datetime
     * @ORM\Column(type="datetime")
     */
    private $data_partida;

    /**
     * @var Campeonato
     * @ORM\ManyToOne(targetEntity="App\Entity\Campeonato")
     */
    private $campeonato;

    /**
     * @var Time
     * @ORM\ManyToOne(targetEntity="App\Entity\Time", inversedBy="partidas_casa")
     */
    private $time_casa;

    /**
     * @var Time
     * @ORM\ManyToOne(targetEntity="App\Entity\Time", inversedBy="partidas_visitante")
     */
    private $time_visitante;

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
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return self
     */ 
    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return integer
     */ 
    public function getPlacar_visitante()
    {
        return $this->placar_visitante;
    }

    /**
     * @param integer $placar_visitante
     * @return self
     */ 
    public function setPlacar_visitante($placar_visitante)
    {
        $this->placar_visitante = $placar_visitante;
        return $this;
    }

    /**
     * @return integer
     */ 
    public function getPlacar_casa()
    {
        return $this->placar_casa;
    }

    /**
     * @param integer $placar_casa
     * @return self
     */ 
    public function setPlacar_casa($placar_casa)
    {
        $this->placar_casa = $placar_casa;
        return $this;
    }

    /**
     * @return datetime
     */ 
    public function getData_partida()
    {
        return $this->data_partida;
    }

    /**
     * @param datetime $data_partida
     * @return self
     */ 
    public function setData_partida(datetime $data_partida)
    {
        $this->data_partida = $data_partida;
        return $this;
    }

    /**
     * @return Campeonato
     */ 
    public function getCampeonato()
    {
        return $this->campeonato;
    }

    /**
     * @param Campeonato $campeonato
     * @return self
     */ 
    public function setCampeonato(Campeonato $campeonato)
    {
        $this->campeonato = $campeonato;
        return $this;
    }

    /**
     * @return Time
     */ 
    public function getTime_casa()
    {
        return $this->time_casa;
    }

    /**
     * @param Time $time_casa
     * @return self
     */ 
    public function setTime_casa(Time $time_casa)
    {
        $this->time_casa = $time_casa;
        return $this;
    }

    /**
     * @return Time
     */ 
    public function getTime_visitante()
    {
        return $this->time_visitante;
    }

    /**
     * @param Time $time_visitante
     * @return self
     */ 
    public function setTime_visitante(Time $time_visitante)
    {
        $this->time_visitante = $time_visitante;
        return $this;
    }
}
