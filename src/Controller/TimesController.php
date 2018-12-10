<?php

namespace App\Controller;

use App\Entity\Time;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TimesController extends AbstractController
{
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * @Route("/times", name="times")
     * @Template("times/index.html.twig")
     */
    public function index()
    {
        $times = $this->entityManager->getRepository(Time::class)->findAll();

        return [
            'times' => $times
        ];
    }
}
