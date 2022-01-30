<?php

class users
{

    protected $id;
    protected $Mail;
    protected $Password;

    /**
     * @param $id
     * @param $Mail
     * @param $Password
     */
    public function __construct($id, $Mail, $Password)
    {
        $this->id = $id;
        $this->Mail = $Mail;
        $this->Password = $Password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->Mail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

}