<?php
class Contact extends Controller{
    public function index (){
        $data = array();
        $User = $this->load_model('user');
        $user_data = $User->not_login();
    
        if (is_object($user_data)) {
            $data['user_data'] = $user_data;
        }

        $data['page_title'] = "Contact";
        $this->view("contact",$data);
    }

    public function messaging($msgData) {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['reason']) && isset($_POST['details'])) {
            $msg = $this->load_model("miscel");
            $result = $msg->sending($msgData);
            if ($result) {
                echo json_encode(array("success" => "Message Sent!"));
            } else {
                echo json_encode(array("success" => $_SESSION['success'], "error" => $_SESSION['error']));
            }
        } else {
            echo json_encode(array("success" => false, "error" => "Data not received!"));
        }
    }


}
?>