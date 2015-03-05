<?php
/**
 * Created by PhpStorm.
 * User: Ittai
 * Date: 3/3/2015
 * Time: 4:02 PM
 */
include_once 'IDBEntity.php';
include_once 'InputChecker.php';

class SpotViews implements IDBEntity
{
    private $spot_id;
    private $date_of_count;
    private $count_of_views;

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
        InputChecker::isPositiveInteger($spot_id, "SpotViews spot_id must not be null and must be a positive integer.");
        $this->spot_id = $spot_id;
    }

    /**
     * @return mixed
     */
    public function getDateOfCount()
    {
        return $this->date_of_count;
    }

    /**
     * @param mixed $date_of_count
     */
    public function setDateOfCount($date_of_count)
    {
        $this->date_of_count = $date_of_count;
    }

    /**
     * @return mixed
     */
    public function getCountOfViews()
    {
        return $this->count_of_views;
    }

    /**
     * @param $count_of_views
     * @throws exception
     */
    public function setCountOfViews($count_of_views)
    {
        InputChecker::isPositiveInteger($count_of_views, "SpotViews count_of_views must not be null and must be a positive integer.");
        $this->count_of_views = $count_of_views;
    }

    function getAssociationArray()
    {
        $assoArr = array();

        if($this->spot_id !== null)
        {
            $assoArr['spot_id'] = $this->spot_id;
        }
        if($this->date_of_count !== null)
        {
            $assoArr['date_of_count'] = $this->date_of_count;
        }
        if($this->count_of_views !== null)
        {
            $assoArr['count_of_views'] = $this->count_of_views;
        }

        return $assoArr;
    }
}