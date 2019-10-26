<?php

namespace App\Repository;

use App\Entity\Produtor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Produtor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produtor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produtor[]    findAll()
 * @method Produtor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProdutorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produtor::class);
    }

    public function save(Produtor $produtor)
    {
        $em = $this->getEntityManager();
        $em->beginTransaction();
        $em->merge($produtor);
        $em->commit();
        $em->flush();
    }
    // /**
    //  * @return Produtor[] Returns an array of Produtor objects
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
    public function findOneBySomeField($value): ?Produtor
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
