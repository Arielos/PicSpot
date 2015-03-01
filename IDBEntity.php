<?php
/**
 * Created by PhpStorm.
 * User: Ittai
 * Date: 1/3/2015
 * Time: 7:00 PM
 */

interface IDBEntity {
    function getAssociationArray();
    static function getEntityName();
}