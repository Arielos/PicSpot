<?php
/**
 * Created by PhpStorm.
 * User: Ittai
 * Date: 3/3/2015
 * Time: 2:16 PM
 */
include_once 'IDBEntity.php';

class SpotCategoryVote implements IDBEntity
{
    private $user_id;
    private $spot_id;
    private $category_id;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getSpotId()
    {
        return $this->spot_id;
    }

    /**
     * @param mixed $spot_id
     */
    public function setSpotId($spot_id)
    {
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
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    function getAssociationArray()
    {
        $assoArr = array();

        if($this->user_id !== null)
        {
            $assoArr['user_id'] = $this->user_id;
        }
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