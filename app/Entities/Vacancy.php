<?php

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Carbon\Carbon;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\VacancyRepository")
 * @ORM\Table(name="vacancies")
 * @ORM\HasLifecycleCallbacks
 */
class Vacancy
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(name="title", type="string")
     */
    protected $title;

    /**
     * @ORM\Column(name="content", type="text")
     */
    protected $content;

    /**
     * @ORM\Column(name="category_id", type="integer")
     */
    protected $category_id;

    /**
     * @ORM\Column(name="location", type="string")
     */
    protected $location;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updated_at;

    public function __construct($title, $content, $categoryId, $location, $createdAt = null)
    {
        $this->title = $title;
        $this->content = $content;
        $this->category_id = $categoryId;
        $this->location = $location;
        $this->created_at = $createdAt ?: Carbon::now();
        $this->updated_at = Carbon::now();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($value)
    {
        $this->content = $value;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoryId($value)
    {
        $this->category_id = $value;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($value)
    {
        $this->location = $value;
    }

    public function getCreatedAt()
    {
        return $this->created_at->format('F d, Y');
    }

    public function setCreatedAt($value)
    {
        $this->created_at = $value;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at->format('F d, Y');
    }

    public function setUpdatedAt()
    {
        $this->updated_at = Carbon::now();
    }
    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updated_at = Carbon::now();
    }
}
