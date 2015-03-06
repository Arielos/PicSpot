<?php

include_once 'IDBEntity.php';
include_once 'InputChecker.php';

class Picture implements IDBEntity
{
    private $id;
    private $name;
    private $filename;
    private $date_created;
    private $uploader_id;
    private $spot_id;

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
        InputChecker::isNonNegativeInteger($id, "Picture id must not be null and must be a non-negative integer.");
        $this->id = $id;
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
        $name = htmlentities($name,ENT_HTML5);
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param mixed $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
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
    public function getUploaderId()
    {
        return $this->uploader_id;
    }

    /**
     * @param $uploader_id
     * @throws exception
     */
    public function setUploaderId($uploader_id)
    {
        InputChecker::isNonNegativeInteger($uploader_id, "Picture uploader_id must not be null and must be a non-negative integer.");
        $this->uploader_id = $uploader_id;
    }

    /**
     * @return mixed
     */
    public function getSpotId()
    {
        return $this->spot_id;
    }

    /**
     * @param $spot_id
     * @throws exception
     */
    public function setSpotId($spot_id)
    {
        InputChecker::isPositiveInteger($spot_id, "Picture spot_id must not be null and must be a positive integer.");
        $this->spot_id = $spot_id;
    }

    function getAssociationArray()
    {
        $assoArr = array();

        if($this->id !== null)
        {
            $assoArr['id'] = $this->id;
        }
        if($this->name !== null)
        {
            $assoArr['name'] = $this->name;
        }
        if($this->filename !== null)
        {
            $assoArr['filename'] = $this->filename;
        }
        if($this->date_created !== null)
        {
            $assoArr['date_created'] = $this->date_created;
        }
        if($this->uploader_id !== null)
        {
            $assoArr['uploader_id'] = $this->uploader_id;
        }
        if($this->dateCreated !== null)
        {
            $assoArr['date_created'] = $this->dateCreated;
        }
        if($this->spot_id !== null)
        {
            $assoArr['spot_id'] = $this->spot_id;
        }

        return $assoArr;
    }
}