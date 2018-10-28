<?php

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Carbon\Carbon;

/**
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */
class Category
{
    public static $allowedForRead = ['id', 'title'];
    public static $allowedForWrite = ['title'];
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
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updated_at;

    public function __construct($title)
    {
        $this->title = $title;
        $this->created_at = Carbon::now();
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

    public function setTitle($title)
    {
        $this->title = $title;
    }

}
