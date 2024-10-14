<?php
class Miscel
{
    private $error = '';
    private $success = '';

    public function collecting($collectionData)
    {
        if (isset($_POST['imageId']) && isset($_POST['isLiked'])) {
            $imageId = $_POST['imageId'];
            $isLiked = $_POST['isLiked'];

            $db = Database::getInstance();
            $data = array();
            $data['uidn'] = $_SESSION['uidn'];
            $data['imageId'] = $imageId;
            $data['isLiked'] = $isLiked;
            

            if ($isLiked) {
                $query = "INSERT INTO collection (uidn, imageId, isLiked) VALUES (:uidn, :imageId, :isLiked)";
            } else {
                $query = "UPDATE collection SET isLiked = :isLiked WHERE uidn = :uidn AND imageId = :imageId";
            }

            $result = $db->write($query, $data);

            if ($result) {
                $this->success = 1;
            } else {
                $this->error = 0;
            }
        }
        $_SESSION['error'] = $this->error;
        $_SESSION['success'] = $this->success;
    }

    public function deleting($deleteData)
    {
        if (isset($_POST['id'])) {
            $db = Database::getInstance();
            $data = array();
            $data['uidn'] = $_SESSION['uidn'];
            $data['status'] = 0;
            $data['id'] = $_POST['id'];

            $query = "UPDATE  images SET status= :status WHERE uidn = :uidn AND id = :id";


            $result = $db->write($query, $data);

            if ($result) {
                $this->success = 1;
            } else {
                $this->error = 0;
            }
        }
        $_SESSION['error'] = $this->error;
        $_SESSION['success'] = $this->success;
    }


    public function profilerecord($profileData, $profileFiles)
    {
        if (!empty($profileData) && !empty($profileFiles)) {
            $db = Database::getInstance();
            $data = array();
            $data['uidn'] = $_SESSION['uidn'] ?? null;

            // Check if data already exists in the database
            $sql = 'SELECT dob, profilepic FROM userdetail WHERE uidn = :uidn LIMIT 1';
            $arr = array('uidn' => $data['uidn']);
            $checking = $db->read($sql, $arr);
    
            if (is_array($checking)) {
                // Update the date of birth
                $data['dob'] = isset($_POST['dob']) ? $_POST['dob'] : null;
                // Upload and move the profile picture file
                $uploadPath = 'assets/profile/';
                $fileName = $profileFiles['name'];
                $fileTmpName = $profileFiles['tmp_name'];
                $fileDestination = $uploadPath . $fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                // Update the profile picture file path
                $data['profilepic'] = $fileName;
                // Update existing record
                $query = "UPDATE userdetail SET dob = :dob, profilepic = :profilepic WHERE uidn = :uidn";
                $result = $db->write($query, $data);
                if ($result) {
                    $this->success = 'Profile detail updated!';
                } else {
                    $this->error = 'Profile detail updation failed!';
                }
            } else {

                // Upload and move the profile picture file
                $uploadPath = 'assets/profile/';
                $fileName = $profileFiles['name'];
                $fileTmpName = $profileFiles['tmp_name'];
                $fileDestination = $uploadPath . $fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                // Update the profile picture file path
                $data['profilepic'] = $fileName;
                 // Insert new record
                 $data['dob'] = isset($_POST['dob']) ? $_POST['dob'] : null;
                $query = "INSERT INTO userdetail (uidn,dob, profilepic) VALUES (:uidn, :dob, :profilepic)";
                // Insert the date of birth
                $result = $db->write($query, $data);
                if ($result) {
                    $this->success = 'Profile detail Inserted!';
                } else {
                    $this->error = 'Profile detail Insertion Failed!';
                }
            }
        } else {
            $this->error = 'Invalid UIDN or session mismatch';
        }
    
        $_SESSION['error'] = $this->error;
        $_SESSION['success'] = $this->success;
    }
    

    public function sending($msgData)
{
    // Check for empty values
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['reason']) || empty($_POST['details'])) {
        $this->error = 'All fields are required';
    } else {
        $db = Database::getInstance();
        $data = array();
        $data['fullname'] = htmlspecialchars($_POST['name']);
        $data['email'] = htmlspecialchars($_POST['email']);
        $data['reason'] = htmlspecialchars($_POST['reason']);
        $data['details'] = htmlspecialchars($_POST['details']);

        $query = "INSERT INTO contact (fullname, email, reason, details) VALUES (:fullname, :email, :reason, :details)";
        $result = $db->write($query, $data);

        if ($result) {
            require "app/core/mail.php";
            $message = trim($_POST['details']);
            $subject = trim($_POST['reason']);
            $recipient = trim($_POST['email']);
            sendMail($recipient, $subject, $message);

            $this->success = 1;
        } else {
            $this->error = 0;
        }
    }

    $_SESSION['error'] = $this->error;
    $_SESSION['success'] = $this->success;
}



}



?>