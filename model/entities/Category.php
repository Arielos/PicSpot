<?php

include_once '/../IDBEntity.php';
include_once '/../InputChecker.php';

class Category implements  IDBEntity
{
    private $id;
    private $name;

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
        InputChecker::isNonNegativeInteger($id, "Category id must not be null and must be a non-negative integer.");
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
     * @param $name
     * @throws exception
     */
    public function setName($name)
    {
        InputChecker::isWhollyAlphabetic($name, "Category name must not be empty/null and must only consist of alphabetic characters.");
        $name = htmlentities($name,ENT_HTML5);
        $this->name = $name;
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

        return $assoArr;
    }
}