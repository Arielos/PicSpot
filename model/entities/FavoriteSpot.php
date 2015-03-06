<?php
/**
 * Created by PhpStorm.
 * User: Ittai
 * Date: 2/3/2015
 * Time: 11:42 PM
 */
include_once 'IDBEntity.php';
include_once 'InputChecker.php';

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
     * @param $user_id
     * @throws exception
     */
    public function setUserId($user_id)
    {
        InputChecker::isNonNegativeInteger($user_id, "FavoriteSpot user_id must not be null and must be a non-negative integer.");
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
     * @param $spot_id
     * @throws exception
     */
    public function setSpotId($spot_id)
    {
        InputChecker::isNonNegativeInteger($spot_id, "FavoriteSpot spot_id must not be null and must be a non-negative integer.");
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
}