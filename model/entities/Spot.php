<?php
/**
 * Created by PhpStorm.
 * User: Ittai
 * Date: 1/3/2015
 * Time: 7:51 PM
 */
include_once 'IDBEntity.php';

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
     * @param mixed $id
     */
    public function setId($id)
    {
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
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
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
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
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
     * @param mixed $creator_id
     */
    public function setCreatorId($creator_id)
    {
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