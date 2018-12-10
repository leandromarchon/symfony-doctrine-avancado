<?php

namespace App\Controller;

use App\Entity\Time;
use App\Entity\Partida;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PartidasController extends AbstractController
{
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * @Route("/partidas", name="partidas")
     * @Template("partidas/index.html.twig")
     */
    public function index()
    {
        $partidas = $this->entityManager->getRepository(Partida::class)->findAll();
        
        return [
            'partidas' => $partidas
        ];
    }

    /**
     * @param Time $time
     * @Route("/partidas/listar-por-time/{id}", name="listar-partidas")
     * @Template("partidas/listar-por-time.html.twig")
     * @return array
     */
    public function partidasPorTime(Time $time)
    {
        $partidas = $this->entityManager->getRepository(Partida::class)->getPartidasPorTime($time);
        
        return [
            'partidas' => $partidas,
            'time' => $time
        ];
    }
}
