<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @return Product[] Returns an array of Product objects
     */
    public function findByCategorySlugAndPriceLessThan(string $slug = null, int $priceLessThan = null): array
    {
        $qb = $this->createQueryBuilder('p')
            ->setMaxResults(5);

        if ($slug) {
            $this->addCategorySlugFilter($qb, $slug);
        }

        if ($priceLessThan) {
            $this->addPriceLessThanFilter($qb, $priceLessThan);
        }

        return $qb->getQuery()->getResult();
    }

    private function addCategorySlugFilter(QueryBuilder $qb, string $slug)
    {
        $qb->join('p.category', 'c')
            ->andWhere('c.slug = :slug')
            ->setParameter('slug', $slug);
    }

    private function addPriceLessThanFilter(QueryBuilder $qb, string $price)
    {
        $qb->andWhere('p.price <= :price')
            ->setParameter('price', $price);
    }
}
