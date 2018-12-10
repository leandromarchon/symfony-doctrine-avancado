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

    public function getClassificacao(Campeonato $campeonato)
    {
        $sql = 
        "select
            t.id as time_id,
            t.nome as time_nome,
            t.brasao as time_brasao,
            p.id as partida_id,
            p.descricao,
            p.time_casa_id,
            p.time_visitante_id,
            p.placar_casa,
            p.placar_visitante,
            c.nome as campeonato,
            case
                t.id
                when p.time_casa_id then sum(p.placar_casa)
                when p.time_visitante_id then sum(p.placar_visitante)
            end as gols_sofridos,
            case
                t.id
                when p.time_casa_id then sum(p.placar_visitante)
                when p.time_visitante_id then sum(p.placar_casa)
            end as gols_pro,
            (case t.id
                when p.time_casa_id then sum(p.placar_visitante)
                when p.time_visitante_id then sum(p.placar_casa)
             end - case t.id
                when p.time_casa_id then sum(p.placar_casa)
                when p.time_visitante_id then sum(p.placar_visitante)
             end) as gols_saldo,
            case
                when
                    t.id = p.time_casa_id
                then
                    case
                        when p.placar_casa > p.placar_visitante then sum(3)
                        when p.placar_casa < p.placar_visitante then sum(0)
                        else sum(1)
                    end
                when
                    t.id = p.time_visitante_id
                then
                    case
                        when p.placar_visitante > p.placar_casa then sum(3)
                        when p.placar_visitante < p.placar_casa then sum(0)
                        else sum(1)
                    end
            end as pontos
        from
            time t
        inner join
            partida p on t.id = p.time_casa_id or
            t.id = p.time_visitante_id
        inner join
            campeonato c on p.campeonato_id = c.id
        where
            c.id = :campeonato
        group by
            t.nome
        order by
            pontos desc, gols_saldo desc, gols_pro desc
        ";

        return $this->getEntityManager()->getConnection()->executeQuery($sql, [':campeonato' => $campeonato->getId()])->fetchAll(\PDO::FETCH_OBJ);
    }
}
