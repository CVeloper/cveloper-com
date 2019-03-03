<?php

namespace App\Repository;

use App\Entity\DevTech;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DevTech|null find($id, $lockMode = null, $lockVersion = null)
 * @method DevTech|null findOneBy(array $criteria, array $orderBy = null)
 * @method DevTech[]    findAll()
 * @method DevTech[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DevTechRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DevTech::class);
    }

    // /**
    //  * @return DevTech[] Returns an array of DevTech objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DevTech
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
