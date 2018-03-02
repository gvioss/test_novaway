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

    /**
     * @return mixed
     */
    public function getIsan()
    {
        return $this->isan;
    }

    /**
     * @param mixed $isan
     */
    public function setIsan($isan)
    {
        $this->isan = $isan;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->release_date;
    }

    /**
     * @param mixed $release_date
     */
    public function setReleaseDate($release_date)
    {
        $this->release_date = $release_date;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * @param mixed $resume
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
    }

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->Director;
    }

    /**
     * @param mixed $Director
     */
    public function setDirector($Director)
    {
        $this->Director = $Director;
    }

    /**
     * @return mixed
     */
    public function getFormats()
    {
        return $this->Formats;
    }

    /**
     * @param mixed $Formats
     */
    public function setFormats($Formats)
    {
        $this->Formats = $Formats;
    }

    /**
     * @return mixed
     */
    public function getActors()
    {
        return $this->Actors;
    }

    /**
     * @param mixed $Actors
     */
    public function setActors($Actors)
    {
        $this->Actors = $Actors;
    }
}