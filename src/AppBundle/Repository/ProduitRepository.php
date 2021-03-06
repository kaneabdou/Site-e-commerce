<?php

namespace AppBundle\Repository;

/**
 * ProduitRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitRepository extends \Doctrine\ORM\EntityRepository
{
    public function getLastProduits()
    {
        $loQuery = $this->createQueryBuilder('p')
                        ->select('p.name, p.price, p.dateAtCreate')
                        ->setMaxResults('10')
                        ->getQuery()
                        ->getResult();
        return $loQuery;
    }
}
