<?php
class Signin extends Controller {
    public function index() {
        $User = $this->load_model('user');
        $user_data = $User->check_login();

		if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}
        
        $data['page_title'] = "Sign In";
        $this->view("signin", $data);
    }

    public function createAccount($postData) {
        if (isset($_POST['name']) && isset($_POST['email'])) {
            $user = $this->load_model("User");
            $result = $user->createaccount($postData);
            if ($result) {
                echo json_encode(array("success" => "Registration Successful"));
            } else {
                echo json_encode(array("success" => $_SESSION['success'], "error" => $_SESSION['error']));
            }
        } else {
            echo json_encode(array("success" => false, "error" => "Data not received!"));
        }
    }

    public function resend($resendData)
    {
        if (isset($_POST['email'])) {
            $user = $this->load_model("user");
            $result = $user->resendotp($resendData);
            if ($result) {
                echo json_encode(array("success" => "OTP Resent"));
            } else {
                echo json_encode(array("success" => $_SESSION['success'], "error" => $_SESSION['error']));
            }
        } else {
            echo json_encode(array("success" => false, "error" => "Data not received!"));
        }
    }

    public function verify($verifyData)
    {
        if (isset($_POST['otp'])) {
            $user = $this->load_model("user");
            $result = $user->authentication($verifyData);
            if ($result) {
                echo json_encode(array("success" => "Account Verified"));
            } else {
                echo json_encode(array("success" => $_SESSION['success'], "error" => $_SESSION['error']));
            }
        } else {
            echo json_encode(array("success" => false, "error" => "Data not received!"));
        }
    }

    public function login($loginData)
    {
        if (isset($_POST['email']) && $_POST['password']) {
            $user = $this->load_model("user");
            $result = $user->loggingin($loginData);
            if ($result) {
                echo json_encode(array("success" => "Welcome Back!"));
            } else {
                echo json_encode(array("success" => $_SESSION['success'], "error" => $_SESSION['error']));
            }
        } else {
            echo json_encode(array("success" => false, "error" => "Invalid CSRF token"));
        }
    }


}

?>