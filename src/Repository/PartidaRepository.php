<?php

namespace App\Repository;

use App\Entity\Time;
use App\Entity\Partida;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Partida|null find($id, $lockMode = null, $lockVersion = null)
 * @method Partida|null findOneBy(array $criteria, array $orderBy = null)
 * @method Partida[]    findAll()
 * @method Partida[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartidaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Partida::class);
    }

    public function getPartidasPorTime(Time $time)
    {
        $query = $this->createQueryBuilder('p')
                ->innerJoin('p.campeonato', 'c')
                ->innerJoin('App\Entity\Time', 't', 'WITH', 't.id = p.time_casa OR t.id = p.time_visitante')
                ->where('t.id = :id')
                ->setParameter('id', $time)
                ->getQuery();

        return $query->getResult();
    }

    public function getPartidaPorData()
    {
        $query = $this->createQueryBuilder('p');

        $query->where($query->expr()->between('p.data_partida', ':data_inicio', ':data_fim'));
        $query->setParameter('data_inicio', '2018-01-10 00:00:00');
        $query->setParameter('data_fim', '2018-01-15 23:59:59');

        return $query->getQuery()->getResult();
    }
}
