<?php
class Sr extends Controller{
    public function index (){
        $User = $this->load_model('user');
        $user_data = $User->not_login();
    
        if (is_object($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data = array();
        $db = new Database();
        $data['status'] = 1;
        $data['query'] = '%' . trim($_GET['t']) . '%';  // Add wildcard characters to match partial string

        $query = "SELECT `title`, `description` FROM `images` WHERE status = :status AND (`title` LIKE :query OR `description` LIKE :query)";
        $data['results'] = $db->read($query, $data);

        $data['page_title'] = "ArtGallery";
        $this->view("sr",$data);
    }
}
?>