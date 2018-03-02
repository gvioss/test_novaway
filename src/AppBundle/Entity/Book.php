<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Book
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
    private $isnb;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $release_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $page_number;

    /**
     * 
     */
    private $page_numer;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resume;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="Books")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $Author;


    /**
     * @return mixed
     */
    public function getIsnb()
    {
        return $this->isnb;
    }

    /**
     * @param mixed $isnb
     */
    public function setIsnb($isnb)
    {
        $this->isnb = $isnb;
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
    public function getPageNumber()
    {
        return $this->page_number;
    }

    /**
     * @param mixed $page_number
     */
    public function setPageNumber($page_number)
    {
        $this->page_number = $page_number;
    }

    /**
     * @return mixed
     */
    public function getPageNumer()
    {
        return $this->page_numer;
    }

    /**
     * @param mixed $page_numer
     */
    public function setPageNumer($page_numer)
    {
        $this->page_numer = $page_numer;
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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->Author;
    }

    /**
     * @param mixed $Author
     */
    public function setAuthor($Author)
    {
        $this->Author = $Author;
    }
}