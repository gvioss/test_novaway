<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Film
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true, nullable=false)
     */
    private $isan;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $release_date;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $duration;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resume;

    /**
     * @ORM\ManyToOne(targetEntity="Director", inversedBy="Films")
     * @ORM\JoinColumn(name="director_id", referencedColumnName="id")
     */
    private $Director;

    /**
     * @ORM\ManyToMany(targetEntity="Format", inversedBy="Films")
     * @ORM\JoinTable(
     *     name="FormatToFilm",
     *     joinColumns={@ORM\JoinColumn(name="film_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="format_id", referencedColumnName="id", nullable=false)}
     * )
     */
    private $Formats;

    /**
     * @ORM\ManyToMany(targetEntity="Actor", inversedBy="Films")
     * @ORM\JoinTable(
     *     name="ActorHasFilm",
     *     joinColumns={@ORM\JoinColumn(name="film_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="actor_id", referencedColumnName="id", nullable=false)}
     * )
     */
    private $Actors;
}