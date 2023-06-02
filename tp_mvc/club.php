<?php
include_once("model/Template.model.php");
include_once("model/DB.model.php");
include_once("controller/club.controller.php");

$club = new clubController();


if (isset($_POST['submit'])) {
    $club->add($_POST);
} else if (!empty($_GET['id_delete'])) {
    $id = $_GET['id_delete'];
    $club->delete($id);
} else if (isset($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $club->index($id);
} else if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $club->edit($_POST, $id);
} else {
    $id = null;
    $club->index($id);
}
