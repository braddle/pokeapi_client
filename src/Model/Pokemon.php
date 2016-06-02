<?php

namespace Braddle\PokeApi\Model;

class Pokemon
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $baseExperience;

    /**
     * @var integer
     */
    private $height;

    /**
     * @var boolean
     */
    private $isDefault;

    /**
     * @var integer
     */
    private $sortOrder;

    /**
     * @var integer
     */
    private $weight;

    public function __construct($id, $name, $baseExperience, $height, $isDefault, $sortOrder, $weight)
    {
        $this->id = $id;
        $this->name = $name;
        $this->baseExperience = $baseExperience;
        $this->height = $height;
        $this->isDefault = $isDefault;
        $this->sortOrder = $sortOrder;
        $this->weight = $weight;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return integer
     */
    public function getBaseExperience()
    {
        return $this->baseExperience;
    }

    /**
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return boolean
     */
    public function isDefaultForSpecies()
    {
        return $this->isDefault;
    }

    /**
     * @return integer
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }
}
