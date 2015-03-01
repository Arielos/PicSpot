<?php
/**
 * Created by PhpStorm.
 * User: Ittai
 * Date: 1/3/2015
 * Time: 7:51 PM
 */
include_once 'IDBEntity.php';

class Spot implements IDBEntity{
    private $id;
    private $coordinates;
    private $name;
    private $description;
    private $tips;
    private $dateCreated;
    private $creatorId;

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
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param $lng
     * @param $lat
     */
    public function setCoordinates($lng,$lat)
    {
        $this->coordinates = array('lng'=>$lng,'lat'=>$lat);
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
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return mixed
     */
    public function getCreatorId()
    {
        return $this->creatorId;
    }

    /**
     * @param mixed $creatorId
     */
    public function setCreatorId($creatorId)
    {
        $this->creatorId = $creatorId;
    }


    function getAssociationArray()
    {
        $assoArr = array();

        if($this->id !== null)
        {
            $assoArr['id'] = $this->id;
        }
        if($this->coordinates !== null)
        {
            $assoArr['coordinates'] = $this->coordinates['lng'].",".$this->coordinates['lat'];
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
        if($this->dateCreated !== null)
        {
            $assoArr['date_created'] = $this->dateCreated;
        }
        if($this->creatorId !== null)
        {
            $assoArr['creator_id'] = $this->creatorId;
        }

        return $assoArr;
    }

    static function getEntityName()
    {
        return "spot";
    }
}