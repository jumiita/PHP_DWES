<?php

class episodio{

private $id;
private $name;
private $episode;
private $characters;

    /**
     * @param $id
     * @param $name
     * @param $episode
     * @param $characters
     */
    public function __construct($id, $name, $episode, $characters)
    {
        $this->id = $id;
        $this->name = $name;
        $this->episode = $episode;
        $this->characters = $characters;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return episodio
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return episodio
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * @param mixed $episode
     * @return episodio
     */
    public function setEpisode($episode)
    {
        $this->episode = $episode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCharacters()
    {
        return $this->characters;
    }

    /**
     * @param mixed $characters
     * @return episodio
     */
    public function setCharacters($characters)
    {
        $this->characters = $characters;
        return $this;
    }




}
