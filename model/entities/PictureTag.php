<?php
/**
 * Created by PhpStorm.
 * User: Ittai
 * Date: 2/3/2015
 * Time: 11:51 PM
 */
include_once 'IDBEntity.php';
include_once 'InputChecker.php';

class PictureTag implements IDBEntity
{
    private $picture_id;
    private $tag_id;

    /**
     * @return mixed
     */
    public function getPictureId()
    {
        return $this->picture_id;
    }

    /**
     * @param $picture_id
     * @throws exception
     */
    public function setPictureId($picture_id)
    {
        InputChecker::isNonNegativeInteger($picture_id, "PictureTag picture_id must not be null and must be a non-negative integer.");
        $this->picture_id = $picture_id;
    }

    /**
     * @return mixed
     */
    public function getTagId()
    {
        return $this->tag_id;
    }

    /**
     * @param $tag_id
     * @throws exception
     */
    public function setTagId($tag_id)
    {
        InputChecker::isNonNegativeInteger($tag_id, "PictureTag tag_id must not be null and must be a non-negative integer.");
        $this->tag_id = $tag_id;
    }

    function getAssociationArray()
    {
        $assoArr = array();

        if($this->picture_id !== null)
        {
            $assoArr['picture_id'] = $this->picture_id;
        }
        if($this->tag_id !== null)
        {
            $assoArr['tag_id'] = $this->tag_id;
        }

        return $assoArr;
    }
}