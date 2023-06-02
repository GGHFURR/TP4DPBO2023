<?php

class club extends DB
{
    function getclub()
    {
        $query = "SELECT * FROM club";
        return $this->execute($query);
    }

    function getclubById($id)
    {
        $query = "SELECT * FROM club WHERE id_club=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama_club = $data['nama_club'];

        $query = "INSERT INTO club VALUES ('', '$nama_club')";


        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM club where id_club=$id";


        return $this->execute($query);
    }

    function update($data, $id)
    {


        $nama_club = $data['nama_club'];

        $query = "UPDATE club SET nama_club='$nama_club' WHERE id_club='$id'";


        return $this->execute($query);
    }
}
