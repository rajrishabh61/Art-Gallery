<?php $this->view("header", $data); ?>
<div class="row art_0tyxQTRwB6">
    <div class="wall" id="hmdatimg">
        <!-----{{CANVAS}}---->
        <?php
        if ($data['results'] > 0) {
        foreach ($data['results'] as $value) {
        ?>
        <div class="painting_canvas">
            <img class="img-fluid art_canvas" src="<?php echo ASSETS ?>upload/<?php echo $value->filename?>" alt="">
            <div class="overlay-content">
                <div class="top">
                    <div class="like">
                        <button type="button" class="likeBtn <?php echo ((isset($_SESSION['uidn'])) ? 'likemebtn' : 'lgtacnt')?>"
                            id="likeBtn" data-image-id="<?php echo $value->iid ?>"><i
                                class="bi bi-heart-fill <?php echo (($value->isLiked === '1') ? 'saved' : '')?>"></i></button>
                    </div>
                    <div class="share">
                        <button type="button" class="shareBtn" id="shareBtn_01"><i
                                class="fa-solid fa-share"></i></button>
                    </div>
                </div>
                <div class="bottom">
                    <div class="publisher">
                        <div class="profile">
                            <div class="img-fluid user-dp"
                                style="background-image: url(&quot;<?= ASSETS ?>profile/<?php echo $value->DPIC ?>'&quot;), url(&quot;<?= ASSETS ?>image/user.png&quot;);">
                            </div>
                        </div>
                        <div class="user-detail">
                            <header><?php echo $value->fullname ?><span class="bi bi-patch-check-fill _verified"></span></header>
                            <p class="_imgdesc45"><?php echo $value->title ?></p>
                        </div>
                    </div>
                    <div class="download-container">
                        <button type="button"
                            class="downloadBtn <?php echo ((isset($_SESSION['uidn'])) ? 'downloadmedown' : 'lgtacnt')?>"
                            id="downloadBtn" data-file="<?php echo  $value->filename ?>" data-key="<?php echo  uniqid() ?>"><i
                                class="fa-solid fa-arrow-down"></i></button>
                    </div>
                </div>
            </div>
        </div>
    <?php } 
} ?>
        <!-----{{CANVAS}}---->
    </div>
</div>
<?php $this->view("footer", $data); ?>
