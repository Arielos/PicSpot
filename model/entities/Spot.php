<?php

include_once 'IDBEntity.php';
include_once 'InputChecker.php';

class Spot implements IDBEntity
{
    private $id;
    private $longitude;
    private $latitude;
    private $name;
    private $description;
    private $tips;
    private $date_created;
    private $creator_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @throws exception
     */
    public function setId($id)
    {
        InputChecker::isPositiveInteger($id, "Spot id must not be null and must be a positive integer.");
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param $longitude
     * @throws exception
     */
    public function setLongitude($longitude)
    {
        InputChecker::isNumeric($longitude, "Spot longitude must not be null and must be a numeric expression.");
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param $latitude
     * @throws exception
     */
    public function setLatitude($latitude)
    {
        InputChecker::isNumeric($latitude, "Spot latitude must not be null and must be a numeric expression.");
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTips()
    {
        return $this->tips;
    }

    /**
     * @param mixed $tips
     */
    public function setTips($tips)
    {
        $this->tips = $tips;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param mixed $date_created
     */
    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
    }

    /**
     * @return mixed
     */
    public function getCreatorId()
    {
        return $this->creator_id;
    }

    /**
     * @param $creator_id
     * @throws exception
     */
    public function setCreatorId($creator_id)
    {
        InputChecker::isPositiveInteger($creator_id, "Spot creator_id must not be null and must be a positive integer.");
        $this->creator_id = $creator_id;
    }

    function getAssociationArray()
    {
        $assoArr = array();

        if($this->id !== null)
        {
            $assoArr['id'] = $this->id;
        }
        if($this->longitude !== null)
        {
            $assoArr['longitude'] = $this->longitude;
        }
        if($this->latitude !== null)
        {
            $assoArr['latitude'] = $this->latitude;
        }
        if($this->name !== null)
        {
            $assoArr['name'] = $this->name;
        }
        if($this->description !== null)
        {
            $assoArr['description'] = $this->description;
        }
        if($this->tips !== null)
        {
            $assoArr['tips'] = $this->tips;
        }
        if($this->date_created !== null)
        {
            $assoArr['date_created'] = $this->date_created;
        }
        if($this->creator_id !== null)
        {
            $assoArr['creator_id'] = $this->creator_id;
        }

        return $assoArr;
    }
}