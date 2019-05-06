<?php

namespace App\Repository;

use App\Entity\FormuleService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FormuleService|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormuleService|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormuleService[]    findAll()
 * @method FormuleService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormulesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FormuleService::class);
    }

    // /**
    //  * @return FormuleService[] Returns an array of FormuleService objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormuleService
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
