<?php

include_once "country.php";
include_once "city.php";
include_once "neighborhood.php";
include_once "multimedias.php";
include_once "state.php";

class users{

    protected int $id;
    protected string $mail;
    protected string $password;

    /**
     * @param int $id
     * @param string $mail
     * @param string $password
     */
    public function __construct(int $id, string $mail, string $password)
    {
        $this->id = $id;
        $this->mail = $mail;
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }


}