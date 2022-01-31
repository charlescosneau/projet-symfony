<?php

namespace App\Repository;

use App\Classe\Search;
use App\Entity\Items;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Items|null find($id, $lockMode = null, $lockVersion = null)
 * @method Items|null findOneBy(array $criteria, array $orderBy = null)
 * @method Items[]    findAll()
 * @method Items[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Items::class);
    }

    /**
    * @return Items[] Returns an array of Items objects
    */
    public function findAllOrderByNewest()
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.publishedAt IS NOT NULL')
            ->orderBy('q.publishedAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }



//    /**
//     * Requête qui permet de récupérer les produits en fonction de la recherche de l'utilisateur
//     * @return Items[]
//     */
//    public function findWithSearch(Search $search)
//    {
//        $query = $this
//            ->createQueryBuilder('a')
//            ->select('t', 'a')
//            ->join('a.tags', 't');
//
//        if(!empty($search->tags)){
//            $query = $query
//                ->andWhere('t.id IN (:tags)')
//                ->setParameter('tags', $search->tags);
//        }
//
//        if(!empty($search->string)){
//            $query = $query
//                ->andWhere('a.name LIKE :string')
//                ->setParameter('string', "%{$search->string}%");
//        }
//        return $query->getQuery()->getResult();
//    }


    /*
    public function findOneBySomeField($value): ?Items
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
