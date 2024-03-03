<?php

namespace App\Repository;

use App\Entity\InformationAnimal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InformationAnimal>
 *
 * @method InformationAnimal|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationAnimal|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationAnimal[]    findAll()
 * @method InformationAnimal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationAnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InformationAnimal::class);
    }

    //    /**
    //     * @return InformationAnimal[] Returns an array of InformationAnimal objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('i.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?InformationAnimal
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
