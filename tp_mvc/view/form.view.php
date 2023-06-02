<?php
include_once("config/cons.php");
include_once("model/Members.model.php");

class FormView
{
    public function render($data)
    {
        $tittle = 'Create New Data Member';
        $option = null;
        foreach ($data['club'] as $val) {
            $option .= "<option value='" . $val['id_club'] . "'>" . $val['nama_club'] . "</option>";
        }
        $data = '
                <form method="POST" action="index.php">

                <br><br>
                <div class="card mb-5">

                    <div class="card-header bg-primary">
                        <h1 class="text-white text-center">' . $tittle . ' </h1>
                    </div><br>
                        <label> NAME: </label>
                        <input type="text" name="name" class="form-control" required> <br>

                        <label> EMAIL: </label>
                        <input type="text" name="email" class="form-control" required> <br>

                        <label> PHONE: </label>
                        <input type="text" name="phone" class="form-control" required> <br>
                        
                        <label> JOIN DATE: </label>
                        <input type="date" name="date_join" class="form-control" required> <br>

                        <label for="club">club: </label>
                        <select class="custom-select form-control" name="id_club">
                            <option value="" disabled selected hidden>Pilih club</option>
                            "' . $option . '"
                        </select>

                        
                    <button class="btn btn-success mt-4" type="submit" name="submit"> Submit </button><br>
                        <a class="btn btn-danger" type="submit" name="cancel" href="index.php"> Cancel </a><br>

                    </div>
                </form>';

        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_FORM", $data);
        $tpl->write();
    }

    public function renderId($data)
    {
        $tittle = 'Edit Data Member';
        $option = null;
        $club = 0;


        foreach ($data['members'] as $val) {
            $club = $val['id_club'];
        }

        foreach ($data['club'] as $val) {

            if ($club == $val['id_club']) {

                $option .= "<option value='" . $val['id_club'] . "' selected>" . $val['nama_club'] . "</option>";
            }
            $option .= "<option value='" . $val['id_club'] . "'>" . $val['nama_club'] . "</option>";
        }
        foreach ($data['members'] as $val) {

            $data = '
                <form method="POST" action="index.php">

                <br><br>
                <div class="card mb-5">
                
                    <div class="card-header bg-primary">
                        <h1 class="text-white text-center">' . $tittle . '</h1>
                    </div><br>
                        <input type="hidden" name="id" class="form-control" value="' . $val['id'] . '"> <br>
                        <label> NAME: </label>
                        <input type="text" name="name" class="form-control" value="' . $val['name'] . '"> <br>

                        <label> EMAIL: </label>
                        <input type="text" name="email" class="form-control" value="' . $val['email'] . '"> <br>

                        <label> PHONE: </label>
                        <input type="text" name="phone" class="form-control" value="' . $val['phone'] . '"> <br>
                        
                        <label> JOIN DATE: </label>
                        <input type="date" name="date_join" class="form-control" value="' . $val['date_join'] . '"> <br>

                        <label for="club">club: </label>
                        <select class="custom-select form-control" name="id_club">
                            "' . $option . '"
                        </select>
                
                        <button class="btn btn-success mt-4" type="submit" name="update">Edit</button><br>
                        <a class="btn btn-danger" type="submit" name="cancel" href="index.php"> Cancel </a><br>

                    </div>
                </form>';
        }

        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_FORM", $data);
        $tpl->write();
    }
}
