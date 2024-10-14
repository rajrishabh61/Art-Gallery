<?php
class Delete extends Controller {
    public function delt($deleteData) {
       // echo $_POST['id'];
        if (isset($_POST['id'])) {
            $delete = $this->load_model("miscel");
            $result = $delete->deleting($deleteData);
            if ($result) {
                echo json_encode(array("success" => "Deleted"));
            } else {
                echo json_encode(array("success" => $_SESSION['success'], "error" => $_SESSION['error']));
            }
        } else {
            echo json_encode(array("success" => false, "error" => "Data not received!"));
        }

    }
}



?>