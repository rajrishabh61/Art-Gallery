<?php
class Tou extends Controller{
    public function index (){
        $User = $this->load_model('user');
        $user_data = $User->check_login();

		if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}

        $data['page_title'] = "Terms of use";
        $this->view("tou",$data);
    }
}
?>