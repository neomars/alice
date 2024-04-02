<?php

namespace App\Repository;

use App\Entity\Highlightwords;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Highlightwords>
 *
 * @method Highlightwords|null find($id, $lockMode = null, $lockVersion = null)
 * @method Highlightwords|null findOneBy(array $criteria, array $orderBy = null)
 * @method Highlightwords[]    findAll()
 * @method Highlightwords[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HighlightwordsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Highlightwords::class);
    }

//    /**
//     * @return Highlightwords[] Returns an array of Highlightwords objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Highlightwords
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
