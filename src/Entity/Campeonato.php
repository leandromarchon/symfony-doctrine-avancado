<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CampeonatoRepository")
 */
class Campeonato
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
     * @var Organizacao
     * @ORM\ManyToOne(targetEntity="App\Entity\Organizacao", inversedBy="campeonatos")
     */
    private $organizacao;

    /**
     * @var Time
     * @ORM\ManyToMany(targetEntity="App\Entity\Time", inversedBy="campeonatos")
     * @ORM\JoinTable(name="campeonato_time")
     */
    private $times;

    /**
     * @var Partida
     * @ORM\OneToMany(targetEntity="App\Entity\Partida", mappedBy="campeonato")
     */
    private $partidas;

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
     * @return Organizacao
     */ 
    public function getOrganizacao()
    {
        return $this->organizacao;
    }

    /**
     * @param Organizacao $organizacao
     * @return self
     */ 
    public function setOrganizacao(Organizacao $organizacao)
    {
        $this->organizacao = $organizacao;
        return $this;
    }

    /**
     * @return Time
     */ 
    public function getTimes()
    {
        return $this->times;
    }

    /**
     * @param Time $times
     * @return self
     */ 
    public function setTimes(Time $times)
    {
        $this->times = $times;
        return $this;
    }

    /**
     * @return Partida
     */ 
    public function getPartidas()
    {
        return $this->partidas;
    }

    /**
     * @param Partida $partidas
     * @return self
     */ 
    public function setPartidas(Partida $partidas)
    {
        $this->partidas = $partidas;
        return $this;
    }
}
