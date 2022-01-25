<?php

class reservas
{

    protected $id_reservas;
    protected \pq\DateTime $checkin;
    protected \pq\DateTime $checkout;
    protected $id_cliente;
    protected $id_habitacion;

    /**
     * @param $id_reservas
     * @param \pq\DateTime $checkin
     * @param \pq\DateTime $checkout
     * @param $id_cliente
     * @param $id_habitacion
     */
    public function __construct($id_reservas, \pq\DateTime $checkin, \pq\DateTime $checkout, $id_cliente, $id_habitacion)
    {
        $this->id_reservas = $id_reservas;
        $this->checkin = $checkin;
        $this->checkout = $checkout;
        $this->id_cliente = $id_cliente;
        $this->id_habitacion = $id_habitacion;
    }

    /**
     * @return mixed
     */
    public function getIdReservas()
    {
        return $this->id_reservas;
    }

    /**
     * @return \pq\DateTime
     */
    public function getCheckin(): \pq\DateTime
    {
        return $this->checkin;
    }

    /**
     * @return \pq\DateTime
     */
    public function getCheckout(): \pq\DateTime
    {
        return $this->checkout;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @return mixed
     */
    public function getIdHabitacion()
    {
        return $this->id_habitacion;
    }


}