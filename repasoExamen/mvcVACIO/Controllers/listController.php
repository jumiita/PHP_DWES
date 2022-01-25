<?php
include_once "../Models/listModel.php";

$model = new listModel();

$property = $model->get_properties();


require_once "../Views/listView.phtml";