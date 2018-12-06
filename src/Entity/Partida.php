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
}
