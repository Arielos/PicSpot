<?php
include_once "entities/IDBEntity.php";

class PGsqlDAO
{
    private $dbname = 'dc1672b9586skj';                                    //Name of the database
    private $dbuser = 'cjpuplxhiyanhv';                                    //Username for the db
    private $dbpass = '3190Aj5LPHYNDkhedIgjoAQF29';                        //Password for the db
    private $dbserver = 'ec2-23-21-231-14.compute-1.amazonaws.com';        //Name of the pgsql server
    private $dbcnx;

    private function __construct()
    {
        $this->connect();
    }

    public static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new PGsqlDAO();
        }
        return $instance;
    }

    public function connect()
    {
        if ($this->isConnected() == false) {
            $this->dbcnx = pg_connect("host=" . $this->dbserver . " port=5432 dbname=" . $this->dbname . " user=" . $this->dbuser . " password=" . $this->dbpass);
        }
        return $this->isConnected();
    }

    public function isConnected()
    {
        $stat = pg_connection_status($this->dbcnx);
        return ($stat === PGSQL_CONNECTION_OK);
    }

    public function insertNewEntity(IDBEntity $entity)
    {
        $result = pg_insert($this->dbcnx, $entity->getEntityName(), $entity->getAssociationArray());
        return $result;
    }

    public function updateExistingEntity(IDBEntity $entity, IDBEntity $condition)
    {
        $result = pg_update($this->dbcnx, $entity->getEntityName(), $entity->getAssociationArray(), $condition->getAssociationArray());
        return $result;
    }

    public function findEntitiesByValues(IDBEntity $condition)
    {
        $result = pg_select($this->dbcnx, $condition->getEntityName(), $condition->getAssociationArray());
        return $result;
    }

    public function findSpotsByRadius($coordinates, $radius)
    {
        // TODO
    }

    /* DISABLED FOR NOW */
    /*public function delete($tableName, $ascArr){
        $result = pg_update($this->dbcnx, $tableName, $ascArr);
        return ($result != null);
    }*/
}