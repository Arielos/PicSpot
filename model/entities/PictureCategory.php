<?php
/**
 * Created by PhpStorm.
 * User: Ittai
 * Date: 2/3/2015
 * Time: 11:44 PM
 */
include_once 'IDBEntity.php';

class PictureCategory implements IDBEntity
{
    private $picture_id;
    private $category_id;

    /**
     * @return mixed
     */
    public function getPictureId()
    {
        return $this->picture_id;
    }

    /**
     * @param mixed $picture_id
     */
    public function setPictureId($picture_id)
    {
        $this->picture_id = $picture_id;
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

        if($this->picture_id !== null)
        {
            $assoArr['picture_id'] = $this->picture_id;
        }
        if($this->category_id !== null)
        {
            $assoArr['category_id'] = $this->category_id;
        }

        return $assoArr;
    }

    static function getEntityName()
    {
        return "picturecategory";
    }
}