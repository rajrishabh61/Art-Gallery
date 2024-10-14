<?php $this->view("header",$data); ?> 
    <!------{{MAIN CONTAINER}}-------->
    <div class="container-fluid m-0 p-0">
        <div class="row _5ybfIiEeNm">
            <div class="col-md-12 _HcilbMGL8R">
                <div class="pr_051lft">
                    <div class="img-fluid profile-user-dp" style="background-image: url(&quot;<?php echo (isset($data['user_data'])) ? 'assets/profile/'.$data['user_data']->profilepic: ''; ?>&quot;), url(&quot;<?= ASSETS ?>image/user.png&quot;);"></div> 
                </div>
                <div class="pr_051lrht">
                    <div class="pr_051lrht_1"><h5> <?php echo (isset($data['user_data'])) ? $data['user_data']->fullname : ''; ?></h5> <a href="#" class="prfedbtn" data-id="<?php echo (isset($data['user_data'])) ? $data['user_data']->uidn: ''; ?>"><span class="fa-solid fa-pen"></span><span type="button" >Edit Profile</span></a></div>
                    <div class="pr_051lrht_2"> <?php echo (isset($data['user_data'])) ? $data['user_data']->email: ''; ?></div>
                    <div class="pr_051lrht_3">
                        <?php echo (isset($data['user_data']->dob)) ? 
                            $formattedDate = date('j F Y', strtotime($data['user_data']->dob)) : 'Date Of Birth';
                        ?>
                    </div>

                    <div class="pr_051lrht_4"><button type="button" class="uplbtnndop" id="uplbtnndop"> Upload photo</button></div>
                </div>
            </div>
            <div class="divider"></div>
            <div class="col-md-12 _28rL66Alsd">
            <div class="wall _prfwall" id="shmprodata"></div>
            </div>
        </div>
    </div>
<?php include 'modal.php'; ?> 
<?php $this->view("footer",$data); ?> 

