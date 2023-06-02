<?php
class MembersView
{
    public function render($data)
    {
        $dataMembers = null;
        $no = 1;
        foreach ($data['members'] as $val) {
            $dataMembers .= "<tr>
                <td>" . $no . "</td>
                <td>" . $val['name'] . "</td>
                <td>" . $val['email'] . "</td>
                <td>" . $val['phone'] . "</td>
                <td>" . $val['date_join'] . "</td>
                <td>" . $val['nama_club'] . "</td>
                <td>
                    <a class='btn btn-success' href='index.php?id_edit=" . $val['id'] . "'>Edit</a>
                    <a class='btn btn-danger' href='index.php?id_delete=" . $val['id'] . "'>Delete</a>
                </td>
            </tr>";
            $no++;
        }

        $tpl = new Template("templates/index.html");

        $tpl->replace("DATA_TABEL", $dataMembers);

        $tpl->write();
    }
}
