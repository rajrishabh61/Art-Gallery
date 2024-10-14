<?php
class User
{
    private $error = '';
    private $success = '';
    private function generateOTP()
    {
        return sprintf('%06d', mt_rand(1, 999999));
    }


    public function createaccount($postData)
    {
            // Check for empty values
            if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
                $this->error = 'All fields are required';
            } else {
                // Check for CSRF attacks
                $db = Database::getInstance();
                $data = array();

                // Perform regex validation
                $data['uidn'] = date('ymd').uniqid();
                $data['fullname'] = htmlspecialchars(trim($_POST['name']));
                $data['email'] = htmlspecialchars(trim($_POST['email']));
                $data['otp'] = $this->generateOTP();
                $data['otpc_exp'] = date('Y-m-d H:i:s');
                $salt = bin2hex(random_bytes(16));
                $data['salt'] = $salt;
                $data['password'] = password_hash(htmlspecialchars(trim($_POST['password'])) . $salt, PASSWORD_DEFAULT, ['cost' => 12, 'salt' => $salt, 'algo' => 'sha256']);



                // Check if data already exists in database
                $sql = 'SELECT * FROM user WHERE (email = :email OR uidn = :uidn) OR (email = :email AND uidn = :uidn) LIMIT 1';
                $arr['email'] = $data['email'];
                $arr['uidn'] = $data['uidn'];
                $check = $db->read($sql, $arr);

                if (is_array($check)) {
                    $this->error = 0; //'Email address already exsits!';
                }else{

                    if ($this->error == '') {
                        // Storing data in database
                        $query = "INSERT INTO user (uidn, fullname, email, otp,otpc_exp, password ,salt) VALUES (:uidn, :fullname, :email, :otp, :otpc_exp, :password,:salt)";

                        $result = $db->write($query, $data);
                        $_SESSION['email'] = $data['email'];
                        //$_SESSION['otp_time']=  $_SERVER["REQUEST_TIME"];

                        if ($result) {
                            require "app/core/mail.php";
                            $message = "<b>Your verification code is</b> <br>" . $data['otp'] . "<br> OTP will expire in 60 second.";
                            $subject = "Email verification";
                            $recipient = $data['email'];
                            sendMail($recipient, $subject, $message);

                            $this->success = 1;
                        } else {
                            $this->error = 0;
                        }
                    }

            }
                $_SESSION['error'] = $this->error;
                $_SESSION['success'] = $this->success;
            }
    }

    //RESEND OTP FUNCTION
    public function resendotp($resendData)
    {
            if (isset($_SESSION['email']) && isset($_POST['email'])) {
                $db = Database::getInstance();
                $data = array();
                $data['email'] = $_SESSION['email'];

                // Generate a new OTP
                $data['otp'] = $this->generateOTP();
                $data['otpc_exp'] = date('Y-m-d H:i:s');
                // Update the database with the new OTP
                $query = "UPDATE user SET otp = :otp , otpc_exp = :otpc_exp WHERE email = :email";
                $result = $db->write($query, $data);
                //$_SESSION['otp_time']=  $_SERVER["REQUEST_TIME"];
                if ($result) {

                    // Send the new OTP to the user's email
                    require "app/core/mail.php";
                    $message = "<b>Your verification code is</b> <br>" . $data['otp'] . "<br> OTP will expire in 1 minute.";
                    $subject = "Email verification";
                    $recipient = $data['email'];
                    sendMail($recipient, $subject, $message);

                    $this->success = 1;
                } else {
                    $this->error = 0;
                }
            } else {
                $this->error = 0;
            }

        
        $_SESSION['error'] = $this->error;
        $_SESSION['success'] = $this->success;
    }
 
   //OTP VERIFICATION
public function authentication($verifyData)
{
    if (isset($_POST['otp'])) {
        $otp = htmlspecialchars($_POST['otp']);
        if ($otp !== false && preg_match("/^[0-9]{6}$/", $otp)) {
            $db = Database::getInstance();
            $data = array();
            $data['email'] = $_SESSION['email'];
            $sql = 'SELECT * FROM user WHERE email = :email LIMIT 1';
            $res = $db->read($sql, $data);
            if (count($res) > 0 && $otp === $res[0]->otp) {
                // OTP EXPIRATION TIME
                $otpExpirationTime = 60; // 60 seconds
                // Retrieve the OTP creation time from the database
                $otpCreatedAt = strtotime($res[0]->otpc_exp);
                // Calculate the time difference between the current time and the OTP creation time
                $timeDifference = time() - $otpCreatedAt;
                if ($timeDifference < $otpExpirationTime) {
                    // Allow authentication
                    $data['otp'] = NULL;
                    // Update the OTP in the database
                    $query = "UPDATE user SET otp = :otp WHERE email = :email LIMIT 1";
                    $result = $db->write($query, $data);
                    if ($result) {
                        $this->success = 1;
                    } else {
                        $this->error = "Something went wrong!";
                    }
                } else {
                    // OTP has expired
                    $this->error = "OTP has expired!";
                }
            } else {
                // Incorrect OTP
                $this->error = "Incorrect OTP!";
            }
        } else {
            // Invalid OTP
            $this->error = "Invalid OTP!";
        }
    } else {
        // OTP is required
        $this->error = "OTP is required!";
    }

    $_SESSION['error'] = $this->error;
    $_SESSION['success'] = $this->success;
}




   


   //LOGIN QUERRY
   public function loggingin($loginData)
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            // regenerate CSRF token after successful login

            if (empty($_POST['email']) || empty($_POST['password'])) {
                // Check for empty values
                $this->error = 'All fields are required';
            } else {
                $db = Database::getInstance();
                $data = array();

                $data['email'] = trim($_POST['email']);
                // use filter_var() to validate and sanitize email input
                $password = trim($_POST['password']);
                // remove the unnecessary htmlspecialchars() call

                if (strlen($password) < 8) {
                    $this->error = 'Your password must be at least 8 characters long';
                }else{

                if ($this->error == '') {
                    // confirming user account
                    $sql = 'SELECT * FROM user WHERE (email = :email) AND otp IS NULL AND status = :status LIMIT 1';
                    // remove password from the WHERE clause since we're already hashing it
                    $data = array(
                        ':email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
                        ':status' => 1
                    );

                    $result = $db->read($sql, $data);
                    if (is_array($result) && password_verify($password . $result[0]->salt, $result[0]->password)) {
                        // set session variable for successful login
                       // $_SESSION['email'] = $result[0]->email;
                        $_SESSION['uidn'] = $result[0]->uidn;
                        $this->success = 'Welcome Back!';
                    } else {
                        $this->error = 'Invalid email or password';
                    }
                }
            }
         }
        } else {
            // set more specific error message for CSRF token
            $this->error = 'Invalid CSRF token. Please refresh the page and try again.';
        }
        // set more specific error/success messages
        $_SESSION['success'] = $this->success;
        $_SESSION['error'] = $this->error;
    }

    //Check login
    // public function check_login()
    // {
    //     if (isset($_SESSION['uidn'])) {
    //         $arr['uidn'] = $_SESSION['uidn'];
    //         $arr['uidn'] = 1;
    //         $query = 'SELECT u.*, ud.dob, ud.profilepic FROM user AS u 
    //       LEFT JOIN userdetail AS ud ON u.uidn = ud.uidn
    //       WHERE u.uidn = :uidn AND status = :status LIMIT 1';

    //         $db = Database::getInstance();

    //         $result = $db->read($query, $arr);
    //         if (is_array($result)) {
    //             return $result[0];
    //         }
    //     }
    //     return false;
    // }
    public function not_login()
{
    if (isset($_SESSION['uidn'])) {
        $arr['uidn'] = $_SESSION['uidn'];
        $arr['status'] = 1; // Assuming 'status' is the column name in the 'user' table

        $query = 'SELECT u.*, ud.dob, ud.profilepic FROM user AS u 
                  LEFT JOIN userdetail AS ud ON u.uidn = ud.uidn
                  WHERE u.uidn = :uidn AND u.status = :status LIMIT 1';

        $db = Database::getInstance();

        $result = $db->read($query, $arr);
        if (is_array($result)) {
            return $result[0];
        }
    } else {
        header("Location: ". BASEURL); // Redirect to the login page or any other page
        exit();
    }
    return false;
}

public function check_login()
{
    if (isset($_SESSION['uidn'])) {
        $arr['uidn'] = $_SESSION['uidn'];
        $arr['status'] = 1; // Assuming 'status' is the column name in the 'user' table

        $query = 'SELECT u.*, ud.dob, ud.profilepic FROM user AS u 
                  LEFT JOIN userdetail AS ud ON u.uidn = ud.uidn
                  WHERE u.uidn = :uidn AND u.status = :status LIMIT 1';

        $db = Database::getInstance();

        $result = $db->read($query, $arr);
        if (is_array($result)) {
            return $result[0];
        }
    }
    return false;
}
    //Logout
    public function logout()
    {
        if (isset($_SESSION['uidn'])) {
            unset($_SESSION['uidn']);
        }
        header('Location:' . BASEURL);
        die;
    }
    
    
}
?>