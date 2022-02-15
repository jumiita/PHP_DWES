<?php

class multimedia
{

    private $id;
    private $url;
    private $yt;

    /**
     * @param $id
     * @param $url
     * @param $yt
     */
    public function __construct($id, $url, $yt)
    {
        $this->id = $id;
        $this->url = $url;
        $this->yt = $yt;
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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getYt()
    {
        return $this->yt;
    }


}