<?php
class Home extends Controller{
    public function index (){
        $User = $this->load_model('user');
        $user_data = $User->check_login();

		if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}

        $data['page_title'] = "Home";
        $this->view("home",$data);
    }

    public function fetchData()
{
    $db = new Database();
    $status = 1;
    $data['status'] = $status;
  
    $limit = 10;
    $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0; // Retrieve the value of the offset variable from the AJAX request
  
    $query = "SELECT i.id AS `iid`, i.filename, i.title, i.description, i.location, u.id, u.uidn, u.fullname, u.email, ud.dob, ud.profilepic AS `DPIC`, c.imageId, c.isLiked,
    (SELECT SUM(download_count) FROM images WHERE uidn = u.uidn) AS `total_download_count`
FROM images AS i
JOIN user AS u ON i.uidn = u.uidn
LEFT JOIN userdetail AS ud ON u.uidn = ud.uidn
LEFT JOIN collection AS c ON i.id = c.imageId
WHERE u.status = :status AND i.status = :status
ORDER BY i.id ASC
LIMIT $limit OFFSET $offset;
";




    $results = $db->read($query, $data);

    $imgData = array();
    if ($results > 0) {
        foreach ($results as $value) {
            $imgData[] = '
            <div class="painting_canvas" data-Image-Id="'.$value->iid.'"  data-uidn="'.$value->uidn.'">
            <img class="img-fluid art_canvas" src="'.ASSETS.'upload/'.$value->filename.'" alt="">
            <div class="overlay-content">
                <div class="top">
                    <div class="like">
                        <button type="button" class="likeBtn '.((isset($_SESSION['uidn'])) ? 'likemebtn' : 'lgtacnt').'" id="likeBtn" data-image-id="'.$value->iid.'"><i class="bi bi-heart-fill '.(($value->isLiked === '1') ? 'saved' : '').'"></i></button>
                    </div>
                    <div class="share">
                        <button type="button" class="shareBtn" id="shareBtn_01"><i class="fa-solid fa-share"></i></button>
                    </div>
                </div>
                <div class="bottom">
                    <div class="publisher">
                        <div class="profile">
                            <div class="img-fluid user-dp"
                                style="background-image: url(&quot;'.ASSETS.'profile/'.$value->DPIC.'&quot;), url(&quot;'.ASSETS.'image/user.png&quot;);">
                            </div>
                        </div>
                        <div class="user-detail">
                            <header>'.$value->fullname.(($value->total_download_count >= 5) ? '<span class="bi bi-patch-check-fill _verified"></span>' : '').'</span></header>
                            <p class="_imgdesc45">' . $value->title . '</p>
                        </div>
                    </div>
                    <div class="download-container">
                        <button type="button" class="downloadBtn '.((isset($_SESSION['uidn'])) ? 'downloadmedown' : 'lgtacnt').'" id="downloadBtn" data-file="' . $value->filename . '" data-key="' . uniqid(). '"><i class="fa-solid fa-arrow-down"></i></button>
                    </div>
                </div>
            </div>
        </div>
            
            
            ';
        }
    } else {
        $imgData[] = '<div class="_fld0132"><img src="'.ASSETS.'image/5928293_2953962.jpg"></div>';
    }

    $response = $imgData;

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

public function search()
{
    if (isset($_POST['query'])) {
        $data = array();
        $db = new Database();
        $data['status'] = 1;
        $data['query'] = '%' . trim($_POST['query']) . '%';  // Add wildcard characters to match partial string

        $query = "SELECT `title`, `description` FROM `images` WHERE status = :status AND (`title` LIKE :query OR `description` LIKE :query)";
        $results = $db->read($query, $data);

        if (!empty($results)) {
            $searchResults = array();
            foreach ($results as $row) {
                // Build an array of search results
                $searchResults[] = array(
                    'title' => $row->title,
                    'description' => $row->description
                );
            }
            echo json_encode($searchResults);
        } else {
            echo json_encode(array());  // Return an empty array if no results found
        }
    }
}


public function artboard() {
    $db = new Database();
    $status = 1;
    $data['status'] = $status;
    $data['id'] = trim($_POST['imageID']);
    $data['uidn'] = trim($_POST['uidn']);


$query = "SELECT i.id AS `iid`, i.filename, i.title, i.description, i.location, u.id AS `uid`, u.uidn, u.fullname, u.email, ud.dob, ud.profilepic AS `DPIC`, c.imageId, c.isLiked,
(SELECT SUM(download_count) FROM images WHERE uidn = u.uidn) AS `total_download_count`
FROM images AS i
JOIN user AS u ON i.uidn = u.uidn
LEFT JOIN userdetail AS ud ON u.uidn = ud.uidn
LEFT JOIN collection AS c ON i.id = c.imageId
WHERE u.status = :status AND (i.id = :id OR u.uidn = :uidn)
GROUP BY i.id, u.uidn
ORDER BY i.id ASC;
";

    $results = $db->read($query, $data);

    $imgDatas = '';
    if ($results > 0) {
        $imgDatas .= '
        <div class="imgcntr">
            <img src="'.ASSETS.'upload/'.$results[0]->filename.'" alt="">
        </div>
        <div class="dlcntrart">
            <h6>'.$results[0]->title.'</h6>
            <p>'.$results[0]->description.'</p>
            <header>Artist :- '.$results[0]->fullname.'</header>
            <p><i class="fa-solid fa-location-dot"></i>  '.$results[0]->location.'</p>
            <p><i class="fa-solid fa-envelope"></i>  '.$results[0]->email.'</p>
        </div>
        <h5 class="rltpht">Related Photos</h5>
        <div class="relatedwork wall">
        ';
        foreach ($results as $value) {
            $imgDatas .= '
            <div class="painting_canvas imgcard" data-Image-Id="'.$value->iid.'">
                <img class="img-fluid art_canvas" src="'.ASSETS.'upload/'.$value->filename.'" alt="">
                <div class="overlay-content">
                    <div class="top">
                        <div class="like">
                            <button type="button" class="likeBtn" id="likeBtn" data-image-id="'.$value->iid.'"><i class="bi bi-heart-fill '.(($value->isLiked === '1') ? 'saved' : '').'"></i></button>
                        </div>
                        <div class="share">
                            <button type="button" class="shareBtn" id="shareBtn_01"><i class="fa-solid fa-share"></i></button>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="publisher">
                            <div class="profile">
                                <div class="img-fluid user-dp" style="background-image: url(&quot;'.ASSETS.'profile/'.$value->DPIC.'&quot;), url(&quot;'.ASSETS.'image/user.png&quot;);"></div>
                            </div>
                            <div class="user-detail">
                                <header>'.$value->fullname.(($value->total_download_count >= 5) ? '<span class="bi bi-patch-check-fill _verified"></span>' : '').'</header>
                                <p class="_imgdesc45">' . $value->title . '</p>
                            </div>
                        </div>
                        <div class="download-container">
                            <button type="button" class="downloadBtn '.((isset($_SESSION['uidn'])) ? 'downloadmedown' : 'lgtacnt').'" id="downloadBtn" data-file="' . $value->filename . '" data-key="' . uniqid(). '"><i class="fa-solid fa-arrow-down"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
        
        $imgDatas .= '
        </div>
        ';
    } else {
        $imgDatas = '<div class="_fld0132"><img src="'.ASSETS.'image/5928293_2953962.jpg"></div>';
    }

    $response = $imgDatas;

  // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}


}
?>