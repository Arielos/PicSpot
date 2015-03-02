<?php

interface IDBEntity {
    function getAssociationArray();
    static function getEntityName();
}