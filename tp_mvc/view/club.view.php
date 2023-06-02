<?php
class ClubView
{

    public function render($data, $id_edit)
    {
        $dataclub = null;
        $no = 1;

        foreach ($data['club'] as $val) {
            $dataclub .= "<tr>
                <td>" . $no . "</td>
                <td>" . $val['nama_club'] . "</td>
                <td>
                    <a class='btn btn-success' href='club.php?id_edit=" . $val['id_club'] . "'>Edit</a>
                    <a class='btn btn-danger' href='club.php?id_delete=" . $val['id_club'] . "'>Delete</a>
                </td>
            </tr>";
            $no++;
        }





        if (!empty($id_edit)) {

            $form = null;

            foreach ($data['dipilih'] as $val) {
                $form = '<div class="card-body">
                <form method="post" id="data" action="club.php">
                <div class="mb-3 row">
                    <input type="hidden" name="id" value="' . $val['id_club'] . '">
                    <label for="name" class="col-sm-4 col-form-label">Nama club</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_club" value="' . $val['nama_club'] . '">
                    </div>
                </div>
                </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-success" name="update" form="data">Simpan</button>
                    <a class="btn btn-danger" type="submit" name="cancel" href="club.php"> Cancel </a><br>
                </div>';
                $title = 'Edit Data Club';
            }
        } else {
            $form =
                '<div class="card-body">
                    <form method="post" id="data" action="club.php">
                        <div class="mb-3 row">
                        <label for="name" class="col-sm-4 col-form-label">Nama club</label>
                            <div class="col-sm-8">
                                <input required type="text" class="form-control" name="nama_club">
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success" name="submit" form="data">Add</button>
                        <a class="btn btn-danger" type="submit" name="cancel" href="club.php"> Cancel </a><br>
                </div>';
            $title = 'Add Data Club';
        }
        $tpl = new Template("templates/club.html");

        $tpl->replace("DATA_TABEL", $dataclub);
        $tpl->replace("DATA_FORM", $form);
        $tpl->replace("DATA_TITLE_BOX", $title);

        $tpl->write();
    }
}
