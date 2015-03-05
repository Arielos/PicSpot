<?php
/**
 * Created by PhpStorm.
 * User: Ittai
 * Date: 2/3/2015
 * Time: 11:37 PM
 */
include_once 'IDBEntity.php';
include_once 'InputChecker.php';

class comment implements IDBEntity
{
    private $id;
    private $body;
    private $commenter_id;
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
        InputChecker::isPositiveInteger($id, "Comment id must not be null and must be a positive integer.");
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getCommenterId()
    {
        return $this->commenter_id;
    }

    /**
     * @param $commenter_id
     * @throws exception
     */
    public function setCommenterId($commenter_id)
    {
        InputChecker::isPositiveInteger($commenter_id, "Comment commenter_id must not be null and must be a positive integer.");
        $this->commenter_id = $commenter_id;
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
        InputChecker::isPositiveInteger($spot_id, "Comment spot_id must not be null and must be a positive integer.");
        $this->spot_id = $spot_id;
    }

    function getAssociationArray()
    {
        $assoArr = array();

        if($this->id !== null)
        {
            $assoArr['id'] = $this->id;
        }
        if($this->body !== null)
        {
            $assoArr['body'] = $this->body;
        }
        if($this->commenter_id !== null)
        {
            $assoArr['commenter_id'] = $this->commenter_id;
        }
        if($this->spot_id !== null)
        {
            $assoArr['spot_id'] = $this->spot_id;
        }

        return $assoArr;
    }
}