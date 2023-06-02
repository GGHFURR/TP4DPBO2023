<?php
include_once("config/cons.php");
include_once("model/club.model.php");
include_once("view/club.view.php");
class clubController
{
    private $club;

    function __construct()
    {
        $this->club = new club(cons::$servername, cons::$username, cons::$password, cons::$db_name);
    }

    public function index($id)
    {
        $this->club->open();
        $this->club->getclub();

        $data = array(
            'club' => array(),
            'dipilih' => array()
        );

        while ($row = $this->club->getResult()) {
            array_push($data['club'], $row);
        }

        if (!empty($id)) {
            $this->club->getclubById($id);

            while ($row = $this->club->getResult()) {
                array_push($data['dipilih'], $row);
            }
        }

        $this->club->close();

        $view = new clubView();
        $view->render($data, $id);
    }

    public function create()
    {

        $this->club->open();

        $this->club->getclub();

        $data = array(
            'club' => array()
        );

        while ($row = $this->club->getResult()) {
            array_push($data['club'], $row);
        }

        $this->club->close();

        $view = new FormView();
        $view->render($data);
    }

    public function createId($id)
    {

        $this->club->open();

        $this->club->getclubById($id);

        $data = array(
            'club' => array()
        );

        while ($row = $this->club->getResult()) {
            array_push($data['club'], $row);
        }

        $this->club->close();

        $view = new FormView();
        $view->renderId($id, $data);
    }

    function add($data)
    {
        $this->club->open();
        $this->club->add($data);
        $this->club->close();

        header("location:club.php");
    }

    function edit($data, $id)
    {
        $this->club->open();
        $this->club->update($data, $id);
        $this->club->close();
        header("location:club.php");
    }

    function delete($id)
    {
        $this->club->open();
        $this->club->delete($id);
        $this->club->close();

        header("location:club.php");
    }
}
