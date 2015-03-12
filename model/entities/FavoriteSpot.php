<?php

include_once '/../IDBEntity.php';
include_once '/../InputChecker.php';

class FavoriteSpot implements IDBEntity
{
    private $account_id;
    private $spot_id;

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->account_id;
    }

    /**
     * @param $account_id
     * @throws exception
     */
    public function setAccountId($account_id)
    {
        InputChecker::isNonNegativeInteger($account_id, "FavoriteSpot account_id must not be null and must be a non-negative integer.");
        $this->account_id = $account_id;
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

        if($this->account_id !== null)
        {
            $assoArr['account_id'] = $this->account_id;
        }
        if($this->spot_id !== null)
        {
            $assoArr['spot_id'] = $this->spot_id;
        }

        return $assoArr;
    }
}