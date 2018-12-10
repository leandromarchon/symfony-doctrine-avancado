<?php

namespace App\Repository;

use App\Entity\Campeonato;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Campeonato|null find($id, $lockMode = null, $lockVersion = null)
 * @method Campeonato|null findOneBy(array $criteria, array $orderBy = null)
 * @method Campeonato[]    findAll()
 * @method Campeonato[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampeonatoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Campeonato::class);
    }

    public function getAllCampeonatos()
    {
        return $this->createQueryBuilder('c')
                    ->innerJoin('c.organizacao', 'o')
                    ->getQuery()
                    ->getResult();
    }
}
