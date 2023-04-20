<?php

namespace App\Repository;

use App\Entity\Item;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Item>
 *
 * @method Item|null find($id, $lockMode = null, $lockVersion = null)
 * @method Item|null findOneBy(array $criteria, array $orderBy = null)
 * @method Item[]    findAll()
 * @method Item[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    public function save(Item $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Item $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    public function findType(string $item_type, $loops,bool $includeUnavailableProducts = false)
//    {
//        foreach ($loops as $row) {
//            $sql = '
//SELECT * FROM item i
//WHERE i.item_type = :item_type
//ORDER BY i.item_name ASC
//';
//            $result = mysqli_query($conn, $sql);
//            $datas = array();
//            if(mysqli_num_rows($result) > 0){
//                while($row = mysqli_fetch_assoc($result)){
//                    $datas=[] = $row;
//                }
//            }
//            $resultSet = $stmt->executeQuery(['item_type' => $item_type]);
//
//        }
//
//        return $resultSet->fetchAllAssociative();
//    }


    public function findType(string $item_type, $loops,bool $includeUnavailableProducts = false)
    {
        foreach ($loops as $row) {
            $conn = $this->getEntityManager()->getConnection();

            $sql = '
SELECT * FROM item i
WHERE i.item_type = :item_type
ORDER BY i.item_name ASC
';
            $stmt = $conn->prepare($sql);
            $resultSet = $stmt->executeQuery(['item_type' => $item_type]);

        }

        return $resultSet->fetchAllAssociative();
    }

//    public function findItem(string $item_type,bool $includeUnavailableProducts = false)
//    {
//            $conn = $this->getEntityManager()->getConnection();
//
//            $sql = '
//SELECT * FROM item i
//WHERE i.item_collection IS NOT :item_type
//';
//            $stmt = $conn->prepare($sql);
//            $resultSet = $stmt->executeQuery(['item_type' => $item_type]);
//
//        return $resultSet->fetchAllAssociative();
//    }

//    public function findType(string $item_type, $loops,bool $includeUnavailableProducts = false)
//    {
//        foreach ($loops as $row) {
//            $qb = $this->createQueryBuilder('p')
//                ->where('p.item_type = :item_type')
//                ->setParameter('item_type', $loops)
//                ->orderBy('p.item_name', 'ASC');
//
////        if (!$includeUnavailableProducts) {
////            $qb->andWhere('p.available = TRUE');
////        }
//
//            $query = $qb->getQuery();
////        $item = $query->getResult();
//        }
//
//        return $query->execute();
//    }


    public function findColour(string $item_colour, bool $includeUnavailableProducts = false)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.item_colour = :item_colour')
            ->setParameter('item_colour', $item_colour)
            ->orderBy('p.item_name', 'ASC');

//        if (!$includeUnavailableProducts) {
//            $qb->andWhere('p.available = TRUE');
//        }

        $query = $qb->getQuery();
//        $item = $query->getResult();
        return $query->execute();
    }



//    /**
//     * @return Item[] Returns an array of Item objects
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

//    public function findOneBySomeField($value): ?Item
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
