<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * BookRepository
 *
 */
class BookRepository extends EntityRepository {

    /*
     * Retourne les 5 derniers livres ajoutés.
     */
    public function getLastFiveBooks()
    {
        return $this->findBy(
                [],
                ['id' => 'DESC'],
                5
            );
    }

}