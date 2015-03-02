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
    private $userName;
    private $firstName;
    private $lastName;
    private $hashedPassword;
    private $emailAddress;

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
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getHashedPassword()
    {
        return $this->hashedPassword;
    }

    /**
     * @param mixed $hashedPassword
     */
    public function setHashedPassword($hashedPassword)
    {
        $this->hashedPassword = $hashedPassword;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param mixed $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    function getAssociationArray()
    {
        $assoArr = array();

        if($this->id !== null)
        {
            $assoArr['id'] = $this->id;
        }
        if($this->userName !== null)
        {
            $assoArr['username'] = $this->userName;
        }
        if($this->firstName !== null)
        {
            $assoArr['first_name'] = $this->firstName;
        }
        if($this->lastName !== null)
        {
            $assoArr['last_name'] = $this->lastName;
        }
        if($this->hashedPassword !== null)
        {
            $assoArr['hashed_password'] = $this->hashedPassword;
        }
        if($this->emailAddress !== null)
        {
            $assoArr['email_address'] = $this->emailAddress;
        }

        return $assoArr;
    }

    static function getEntityName()
    {
        return "user";
    }
}