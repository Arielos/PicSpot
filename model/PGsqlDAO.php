<?php
include_once "IDBEntity.php";
include_once "InputChecker.php";

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

    private function connect()
    {
        if ($this->isConnected() == false) {
            $this->dbcnx = pg_connect("host=" . $this->dbserver . " port=5432 dbname=" . $this->dbname . " user=" . $this->dbuser . " password=" . $this->dbpass);
        }
        return $this->isConnected();
    }

    private function getEntityClassName(IDBEntity $entity)
    {
        return strtolower((new ReflectionClass($entity))->getName());
    }

    public static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new PGsqlDAO();
        }
        return $instance;
    }

    public function isConnected()
    {
        $stat = pg_connection_status($this->dbcnx);
        return ($stat === PGSQL_CONNECTION_OK);
    }

    public function insertNewEntity(IDBEntity $entity)
    {
        $result = pg_insert($this->dbcnx, $this->getEntityClassName($entity), $entity->getAssociationArray());
        return $result;
    }

    public function updateExistingEntity(IDBEntity $data, IDBEntity $condition)
    {
        $result = pg_update($this->dbcnx, $this->getEntityClassName($data), $data->getAssociationArray(), $condition->getAssociationArray());
        return $result;
    }

    public function findSpotsByRadius($coordinates, $radius)
    {
        // TODO
    }

    public function findEntitiesByValues(IDBEntity $entity, $offset = 0, $limit = 1)
    {
        InputChecker::isNonNegativeInteger($offset,"PGSqlDAO findEntitiesByValues offset must be a non-negative integer.");
        InputChecker::isNonNegativeInteger($limit,"PGSqlDAO findEntitiesByValues limit must be a non-negative integer.");

        $parameters = "WHERE true";
        foreach($entity->getAssociationArray() as $key=>$value){
            if(is_string($value)){
                $parameters .= " AND {$key}='{$value}'";
            } else {
                $parameters .= " AND {$key}={$value}";
            }
        }
        $query = "SELECT * FROM {$this->getEntityClassName($entity)} {$parameters} OFFSET {$offset} LIMIT {$limit}";
        $result = pg_query($this->dbcnx,$query);
        return $result ? pg_fetch_all($result) : null;
    }

    /* DISABLED FOR NOW */
    /*public function delete($tableName, $ascArr){
        $result = pg_update($this->dbcnx, $tableName, $ascArr);
        return ($result != null);
    }*/
}