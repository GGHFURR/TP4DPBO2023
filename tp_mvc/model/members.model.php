<?php

class members extends DB
{
    function getMembersJoin()
    {
        $query = "SELECT * FROM members JOIN club ON members.id_club=club.id_club ORDER BY members.id";

        return $this->execute($query);
    }
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMembersById($id)
    {
        $query = "SELECT * FROM members WHERE id=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $date_join = $data['date_join'];
        $club = $data['id_club'];

        $query = "INSERT INTO members VALUES ('', '$name', '$email', '$phone', '$date_join', '$club')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM members where id=$id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data, $id)
    {


        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $date_join = $data['date_join'];
        $club = $data['id_club'];

        $query = "UPDATE members SET name='$name', email='$email', phone='$phone', date_join='$date_join', id_club='$club' WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
