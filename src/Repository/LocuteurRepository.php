<?php

namespace App\Repository;

use App\Entity\Locuteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Locuteur>
 *
 * @method Locuteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Locuteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Locuteur[]    findAll()
 * @method Locuteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocuteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Locuteur::class);
    }

//    /**
//     * @return Locuteur[] Returns an array of Locuteur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Locuteur
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
