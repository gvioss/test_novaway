<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Format
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(nullable=true)
     */
    private $label;

    /**
     * @ORM\ManyToMany(targetEntity="Film", mappedBy="Formats")
     */
    private $Films;
}