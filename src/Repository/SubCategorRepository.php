<?php

namespace App\Repository;

use App\Entity\SubCategor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SubCategor|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubCategor|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubCategor[]    findAll()
 * @method SubCategor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubCategorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SubCategor::class);
    }

    // /**
    //  * @return SubCategor[] Returns an array of SubCategor objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SubCategor
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
