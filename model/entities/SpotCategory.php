<?php

include_once '/../IDBEntity.php';
include_once '/../InputChecker.php';

class SpotCategory implements IDBEntity
{
    private $spot_id;
    private $category_id;

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
        InputChecker::isNonNegativeInteger($spot_id, "SpotCategoryVote spot_id must not be null and must be a non-negative integer.");
        $this->spot_id = $spot_id;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param $category_id
     * @throws exception
     */
    public function setCategoryId($category_id)
    {
        InputChecker::isNonNegativeInteger($category_id, "SpotCategoryVote category_id must not be null and must be a non-negative integer.");
        $this->category_id = $category_id;
    }

    function getAssociationArray()
    {
        $assoArr = array();

        if($this->spot_id !== null)
        {
            $assoArr['spot_id'] = $this->spot_id;
        }
        if($this->category_id !== null)
        {
            $assoArr['category_id'] = $this->category_id;
        }

        return $assoArr;
    }
}