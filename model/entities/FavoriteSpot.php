<?php
/**
 * Created by PhpStorm.
 * User: Ittai
 * Date: 2/3/2015
 * Time: 11:42 PM
 */
include_once 'IDBEntity.php';

class FavoriteSpot implements IDBEntity
{
    private $user_id;
    private $spot_id;

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

        return $assoArr;
    }

    static function getEntityName()
    {
        return "favoritespot";
    }

}