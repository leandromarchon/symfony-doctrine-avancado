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

    // /**
    //  * @return Campeonato[] Returns an array of Campeonato objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Campeonato
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
