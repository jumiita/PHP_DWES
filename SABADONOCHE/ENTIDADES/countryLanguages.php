<?php

class countryLanguages
{
    protected $CountryCode;
    protected $Language;

    /**
     * @param $CountryCode
     * @param $Language
     */
    public function __construct($CountryCode, $Language)
    {
        $this->CountryCode = $CountryCode;
        $this->Language = $Language;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->CountryCode;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->Language;
    }

}