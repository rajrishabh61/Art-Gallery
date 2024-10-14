<?php
class Others extends Controller {
    public function collection($collectionData) {

        if (isset($_POST['imageId']) && isset($_POST['isLiked'])) {
            $others = $this->load_model("miscel");
            $result = $others->collecting($collectionData);
            if ($result) {
                echo json_encode(array("success" => "Saved"));
            } else {
                echo json_encode(array("success" => $_SESSION['success'], "error" => $_SESSION['error']));
            }
        } else {
            echo json_encode(array("success" => false, "error" => "Data not received!"));
        }

    }


    public function profileEdit($profileData) {

        $profileData = $_POST;
        $profileFiles = $_FILES['files'];
        

        if (!empty($profileData)) {
            $imgrecord = $this->load_model("miscel");
            $result = $imgrecord->profilerecord($profileData, $profileFiles);
    
            if ($result) {
                echo json_encode(array("success" => "Profile detail added!"));
            } else {
                echo json_encode(array("success" => $_SESSION['success'], "error" => $_SESSION['error']));
            }
        } else {
            echo json_encode(array("success" => false, "error" => "Data not received!"));
        }

    }
}



?>