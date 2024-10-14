<?PHP
function show($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function error_msg(){
    if(isset($_SESSION['error']) && $_SESSION['error'] != ""){

        echo '<div class="col-md-12 display_er">
        <span class="bi bi-exclamation-triangle error-icon"></span>
        <span class="error-text">'.$_SESSION['error'].'</span>
        </div>';

        unset($_SESSION['error']);
    }
}
?>