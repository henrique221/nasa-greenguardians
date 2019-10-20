<?php

namespace App\Repository;

use App\Entity\Propriedade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Propriedade|null find($id, $lockMode = null, $lockVersion = null)
 * @method Propriedade|null findOneBy(array $criteria, array $orderBy = null)
 * @method Propriedade[]    findAll()
 * @method Propriedade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropriedadeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Propriedade::class);
    }

    // /**
    //  * @return Propriedade[] Returns an array of Propriedade objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Propriedade
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
