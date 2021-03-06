<?php

include_once "country.php";
include_once "city.php";
include_once "neighborhood.php";
include_once "multimedias.php";
include_once "state.php";

class property {
    protected int $id;
    protected  country $countryId;
    protected  state $stateId;
    protected city $cityId;
    protected neighborhood $neighborhoodId;
    protected int $zipcode;
    protected float $latitude;
    protected float $longitude;
    protected string $date;
    protected string $description;
    protected int $bathrooms;
    protected int $floor;
    protected  int $surface;
    protected int $price;
    protected array $imagenes;

    /**
     * @param int $id
     * @param country $countryId
     * @param state $stateId
     * @param city $cityId
     * @param neighborhood $neighborhoodId
     * @param int $zipcode
     * @param float $latitude
     * @param float $longitude
     * @param string $date
     * @param string $description
     * @param int $bathrooms
     * @param int $floor
     * @param int $surface
     * @param int $price
     * @param array $imagenes
     */
    public function __construct(int $id, country $countryId, state $stateId, city $cityId, neighborhood $neighborhoodId, int $zipcode, float $latitude, float $longitude, string $date, string $description, int $bathrooms, int $floor, int $surface, int $price, array $imagenes)
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
        $this->surface = $surface;
        $this->price = $price;
        $this->imagenes = $imagenes;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return country
     */
    public function getCountryId(): country
    {
        return $this->countryId;
    }

    /**
     * @return state
     */
    public function getStateId(): state
    {
        return $this->stateId;
    }

    /**
     * @return city
     */
    public function getCityId(): city
    {
        return $this->cityId;
    }

    /**
     * @return neighborhood
     */
    public function getNeighborhoodId(): neighborhood
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
     * @return array
     */
    public function getImagenes(): array
    {
        return $this->imagenes;
    }


}
?>