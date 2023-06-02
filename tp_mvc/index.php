<?php
include_once("model/Template.model.php");
include_once("model/db.model.php");
include_once("controller/members.controller.php");

$member = new MembersController();

if (!empty($_GET['AddData'])) {
  $member->create();
} else if (!empty($_GET['id_edit'])) {
  $id = $_GET['id_edit'];
  $member->createId($id);
} else if (isset($_POST['submit'])) {
  $member->add($_POST);
} else if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $member->edit($_POST, $id);
} else if (!empty($_GET['id_delete'])) {
  $id = $_GET['id_delete'];
  $member->delete($id);
} else {
  $member->index();
}
