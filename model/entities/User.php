<?php
/**
 * Created by PhpStorm.
 * User: Ittai
 * Date: 1/3/2015
 * Time: 6:47 PM
 */
include_once 'IDBEntity.php';

class User implements IDBEntity
{
    private $id;
    private $username;
    private $first_name;
    private $last_name;
    private $hashed_password;
    private $email_address;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getHashedPassword()
    {
        return $this->hashed_password;
    }

    /**
     * @param mixed $hashed_password
     */
    public function setHashedPassword($hashed_password)
    {
        $this->hashed_password = $hashed_password;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * @param mixed $email_address
     */
    public function setEmailAddress($email_address)
    {
        $this->email_address = $email_address;
    }

    function getAssociationArray()
    {
        $assoArr = array();

        if($this->id !== null)
        {
            $assoArr['id'] = $this->id;
        }
        if($this->username !== null)
        {
            $assoArr['username'] = $this->username;
        }
        if($this->first_name !== null)
        {
            $assoArr['first_name'] = $this->first_name;
        }
        if($this->last_name !== null)
        {
            $assoArr['last_name'] = $this->last_name;
        }
        if($this->hashed_password !== null)
        {
            $assoArr['hashed_password'] = $this->hashed_password;
        }
        if($this->email_address !== null)
        {
            $assoArr['email_address'] = $this->email_address;
        }

        return $assoArr;
    }
}