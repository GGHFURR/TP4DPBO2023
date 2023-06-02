<?php
include_once("config/cons.php");
include_once("model/members.model.php");
include_once("model/club.model.php");
include_once("view/members.view.php");
include_once("view/form.view.php");

class MembersController
{
    private $members;
    private $club;

    function __construct()
    {
        $this->members = new Members(cons::$servername, cons::$username, cons::$password, cons::$db_name);
        $this->club = new club(cons::$servername, cons::$username, cons::$password, cons::$db_name);
    }

    public function index()
    {
        $this->members->open();
        $this->members->getMembersJoin();

        $data = array(
            'members' => array(),
        );

        while ($row = $this->members->getResult()) {
            array_push($data['members'], $row);
        }

        $this->members->close();
        $view = new MembersView();
        $view->render($data);
    }

    public function create()
    {

        $this->club->open();
        $this->club->getclub();

        $this->members->open();
        $this->members->getMembersJoin();

        $data = array(
            'members' => array(),
            'club' => array()

        );

        while ($row = $this->members->getResult()) {
            array_push($data['members'], $row);
        }

        while ($row = $this->club->getResult()) {
            array_push($data['club'], $row);
        }

        $this->members->close();
        $this->club->close();

        $view = new FormView();
        $view->render($data);
    }

    public function createId($id)
    {

        $this->club->open();
        $this->club->getclub();

        $this->members->open();
        $this->members->getMembersById($id);

        $data = array(
            'members' => array(),
            'club' => array()
        );

        while ($row = $this->members->getResult()) {
            array_push($data['members'], $row);
        }
        while ($row = $this->club->getResult()) {
            array_push($data['club'], $row);
        }

        $this->members->close();
        $this->club->close();

        $view = new FormView();
        $view->renderId($data);
    }

    function add($data)
    {
        $this->members->open();
        $this->members->add($data);
        $this->members->close();

        header("location:index.php");
    }

    function edit($data, $id)
    {
        $this->members->open();
        $this->members->update($data, $id);
        $this->members->close();
        header("location:index.php");
    }

    function delete($id)
    {
        $this->members->open();
        $this->members->delete($id);
        $this->members->close();

        header("location:index.php");
    }
}
