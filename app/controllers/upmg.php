<?php
class Upmg extends Controller{
    public function index()
{
    $data = array();
    $User = $this->load_model('user');
    $user_data = $User->not_login();

    if (is_object($user_data)) {
        $data['user_data'] = $user_data;
    }

    $data['page_title'] = "Profile";
    $this->view("upmg", $data);
}
public function fetchProfile()
{
    $db = new Database(); // Create an instance of your custom Database class
    $uidn = (isset($_SESSION['uidn']) ? $_SESSION['uidn']: '');
    $status = 1;
    $data['uidn'] = $uidn;
    $data['status'] = $status;


    $query = "SELECT i.id AS `iid`, i.filename, i.title, i.description, i.location, u.id AS `uid`, u.uidn, u.fullname, u.email, ud.dob, ud.profilepic AS `DPIC`, c.imageId, c.isLiked,
    (SELECT SUM(download_count) FROM images WHERE uidn = u.uidn) AS `total_download_count`
FROM images AS i
JOIN user AS u ON i.uidn = u.uidn
LEFT JOIN userdetail AS ud ON u.uidn = ud.uidn
LEFT JOIN collection AS c ON i.id = c.imageId
WHERE u.status = :status AND  u.uidn = :uidn
GROUP BY i.id
ORDER BY i.id ASC;
";

    $results = $db->read($query, $data);

    $imageData = array();
    if ($results > 0) {
        foreach ($results as $value) {
            $imageData[] = '<div class="painting_canvas _dwf07ll"  data-id="'.(isset($value->iid) ? $value->iid: '').'">
                        <img class="img-fluid art_canvas" src="assets/upload/' . (isset($value->filename ) ? $value->filename   : ''). '" alt="">
                        <div class="overlay-content">
                            <div class="top">
                                <div class="like">
                                    <button type="button" class="likeBtn likemebtns" id="likeBtn" data-image-id="'.(isset($value->iid) ? $value->iid: '').'"><i class="bi bi-heart-fill '.(($value->isLiked === '1') ? 'saved' : '').'"></i></button>
                                </div>
                                <div class="share">
                                    <button type="button" class="shareBtn" id="shareBtn_01"><i class="fa-solid fa-share"></i></button>
                                    <button type="button" class="_dlBtn" id="dlBtn_01"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                            <div class="bottom">
                                <div class="publisher">
                                    <div class="profile">
                                        <div class="img-fluid user-DPIC" style="background-image: url(&quot;' . ASSETS .'profile/'.(isset($value->DPIC) ? $value->DPIC: ''). '&quot;), url(&quot;' . ASSETS . 'image/user.png&quot;);">
                                        </div>
                                    </div>
                                    <div class="user-detail">
                                        <header>' .(isset($value->fullname) ? $value->fullname: '').(($value->total_download_count >= 5) ? '<span class="bi bi-patch-check-fill _verified"></span>' : '').'</header>
                                        <p class="_imgdesc45">' .(isset($value->title) ? $value->title: ''). '</p>
                                    </div>
                                </div>
                                <div class="download-container">
                                    <button type="button" class="downloadBtn downloadmedown" id="downloadBtn" data-file="' .(isset($value->filename) ? $value->filename: '') . '" data-key="' . uniqid(). '"><i class="fa-solid fa-arrow-down"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
    } else {
        $imageData[] = '<div class="_fld0132"><img src="'.ASSETS.'image/5928293_2953962.jpg"></div>';
    }

    $response = $imageData;

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}



}
?>