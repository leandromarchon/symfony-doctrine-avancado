<?php

namespace App\Controller;

use App\Entity\Campeonato;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CampeonatosController extends AbstractController
{
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * @Route("/campeonatos", name="campeonatos")
     * @Template("campeonatos/index.html.twig")
     */
    public function index()
    {
        $campeonatos = $this->entityManager->getRepository(Campeonato::class)->getAllCampeonatos();
        
        return [
            'campeonatos' => $campeonatos
        ];
    }
}
