<?php
class Imginf
{
    private $error = '';
    private $success = '';


    public function addrecord($decodedData, $uploadedFiles)
{
    if (!empty($decodedData) && !empty($uploadedFiles)) {
        $db = Database::getInstance();
        $uidn = $_SESSION['uidn']; // Assuming you have the uidn value stored in the session

        $uploadedFileCount = count($uploadedFiles['tmp_name']);
        $successCount = 0; // Track the successful uploads

        for ($i = 0; $i < $uploadedFileCount; $i++) {
            $tempFilename = $uploadedFiles['name'][$i];
            $file = array(
                'name' => $tempFilename,
                'type' => $uploadedFiles['type'][$i],
                'tmp_name' => $uploadedFiles['tmp_name'][$i],
                'error' => $uploadedFiles['error'][$i],
                'size' => $uploadedFiles['size'][$i]
            );

           $fileExtention = pathinfo($tempFilename , PATHINFO_EXTENSION);
            // Generate a new filename
            $Filename = 'ARG_'.uniqid().time().'.'.$fileExtention; // Implement your own logic to generate a unique filename

            // Move the uploaded file to the desired location
            $uploadFolder = 'assets/upload/';
            $newFilename = $uploadFolder .$Filename;

            if (is_uploaded_file($file['tmp_name']) && move_uploaded_file($file['tmp_name'], $newFilename)) {
                $data = array(
                    'uidn' => $uidn,
                    'filename' => $Filename,
                    'title' => isset($decodedData['titles'][$i]) ? $decodedData['titles'][$i] : '',
                    'description' => isset($decodedData['descriptions'][$i]) ? $decodedData['descriptions'][$i] : '',
                    'location' => isset($decodedData['locations'][$i]) ? $decodedData['locations'][$i] : ''
                );

                $query = "INSERT INTO images (uidn, filename, title, description, location) VALUES (:uidn, :filename, :title, :description, :location)";
                $result = $db->write($query, $data);

                if ($result) {
                    $successCount++;
                } else {
                    $this->error = 0;
                }
            } else {
                $this->error = 'Handle error or log failed file uploads';
            }
        }

        // Check if all files were successfully inserted into the database
        if ($successCount === $uploadedFileCount) {
            $this->success = 1;
        } else {
            $this->error = 'Failed to insert all records into the database.';
        }

        $_SESSION['error'] = $this->error;
        $_SESSION['success'] = $this->success;
    }
}

    


public function counting($countData)
{
    // Check for empty values
    if (!empty($_POST['imageID'])) {
        $db = Database::getInstance();
        $data = array();
        $data['id'] = htmlspecialchars($_POST['imageID']);
        $data['download_count'] = 1;
        $query = "UPDATE images SET download_count = download_count + :download_count WHERE id = :id";
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

    

    

}
?>