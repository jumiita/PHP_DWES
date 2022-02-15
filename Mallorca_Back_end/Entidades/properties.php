<?php

require_once "cities.php";
require_once "countries.php";
require_once "multimedias.php";
require_once "neighborhoods.php";
require_once "states.php";
require_once  "users.php";

class properties
{
    public int $id;
    public countries $countryId;
    public states $stateId;
    public cities $cityId;
    public neighborhoods $neighborhoodId;
    public int $zipcode;
    public float $latitude;
    public float $longitude;
    public string $date;
    public string $description;
    public int $bathrooms;
    public int $floor;
    public int $rooms;
    public int $surface;
    public int $price;
    public users $userId;
    public array $multimedias;

    /**
     * @param int $id
     * @param countries $countryId
     * @param states $stateId
     * @param cities $cityId
     * @param neighborhoods $neighborhoodId
     * @param int $zipcode
     * @param float $latitude
     * @param float $longitude
     * @param string $date
     * @param string $description
     * @param int $bathrooms
     * @param int $floor
     * @param int $rooms
     * @param int $surface
     * @param int $price
     * @param users $userId
     * @param array $multimedias
     */
    public function __construct(int $id, countries $countryId, states $stateId, cities $cityId, neighborhoods $neighborhoodId, int $zipcode, float $latitude, float $longitude, string $date, string $description, int $bathrooms, int $floor, int $rooms, int $surface, int $price, users $userId, array $multimedias)
    {
        $this->id = $id;
        $this->countryId = $countryId;
        $this->stateId = $stateId;
        $this->cityId = $cityId;
        $this->neighborhoodId = $neighborhoodId;
        $this->zipcode = $zipcode;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->date = $date;
        $this->description = $description;
        $this->bathrooms = $bathrooms;
        $this->floor = $floor;
        $this->rooms = $rooms;
        $this->surface = $surface;
        $this->price = $price;
        $this->userId = $userId;
        $this->multimedias = $multimedias;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return countries
     */
    public function getCountryId(): countries
    {
        return $this->countryId;
    }

    /**
     * @return states
     */
    public function getStateId(): states
    {
        return $this->stateId;
    }

    /**
     * @return cities
     */
    public function getCityId(): cities
    {
        return $this->cityId;
    }

    /**
     * @return neighborhoods
     */
    public function getNeighborhoodId(): neighborhoods
    {
        return $this->neighborhoodId;
    }

    /**
     * @return int
     */
    public function getZipcode(): int
    {
        return $this->zipcode;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getBathrooms(): int
    {
        return $this->bathrooms;
    }

    /**
     * @return int
     */
    public function getFloor(): int
    {
        return $this->floor;
    }

    /**
     * @return int
     */
    public function getRooms(): int
    {
        return $this->rooms;
    }

    /**
     * @return int
     */
    public function getSurface(): int
    {
        return $this->surface;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return users
     */
    public function getUserId(): users
    {
        return $this->userId;
    }

    /**
     * @return array
     */
    public function getMultimedias(): array
    {
        return $this->multimedias;
    }


}