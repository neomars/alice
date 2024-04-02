<?php

namespace App\Repository;

use App\Entity\Outputformat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Outputformat>
 *
 * @method Outputformat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Outputformat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Outputformat[]    findAll()
 * @method Outputformat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OutputformatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Outputformat::class);
    }

//    /**
//     * @return Outputformat[] Returns an array of Outputformat objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Outputformat
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
