<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    /**
     *Récuperer les produits du spotLight
     * Uniquement les 5 derniers
     * Trier par ordre décroissant
     */
    public function findBySpotlight()
    {
        return $this->createQueryBuilder('a')
            ->where('a.spotlight = 1')
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     *Récuperer les produits à la position speciale
     * Uniquement les 5 derniers
     * Trier par ordre décroissant
     */
    public function findBySpecial()
    {
        return $this->createQueryBuilder('a')
            ->where('a.special = 1')
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     *Récuperer les 5 derniers produits insérés en bd
     */
    public function findByLatest()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * Recuperer les articles du spotlight
     * Uniquement les 5 derniers
     * Trier par ordre decroissant
     */

    public function findByPromotion()
    {
        return $this->createQueryBuilder('a')
            ->where('a.promotion = 1')
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult()
            ;
    }

    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Produit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
