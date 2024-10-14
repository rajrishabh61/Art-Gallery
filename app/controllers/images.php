<?php
class Images extends Controller {
    public function uploadImg() {

        $decodedData = $_POST;
        $uploadedFiles = $_FILES['files']; 

        if (!empty($decodedData)) {
            // Pass $decodedData and $uploadedFiles to the model
            $imgrecord = $this->load_model("imginf");
            $result = $imgrecord->addrecord($decodedData, $uploadedFiles);

            if ($result) {
                echo json_encode(array("success" => "Congratulations!"));
            } else {
                echo json_encode(array("success" => $_SESSION['success'], "error" => $_SESSION['error']));
            }
        } else {
            echo json_encode(array("success" => false, "error" => "Data not received!"));
        }
    }

    //Total dowload
public function downCount($countData)
{
    if (isset($_POST['imageID'])) {
        $countme = $this->load_model("imginf");
        $result = $countme->counting($countData);
        if ($result) {
            echo json_encode(array("success" => "counted"));
        } else {
            echo json_encode(array("success" => $_SESSION['success'], "error" => $_SESSION['error']));
        }
    } else {
        echo json_encode(array("success" => false, "error" => "Data not received!"));
    }
}
}



?>