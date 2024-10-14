<?php $this->view("header",$data); ?>
    <!------{{MAIN CONTAINER}}-------->
    <div class="container-fluid m-0 p-0">
        <div class="row art_YPTymLZAVx">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="art_gGfBg040aD carousel-item active">
                        <img src="<?= ASSETS ?>image/ayo-ogunseinde-975db4eBky0-unsplash.jpg" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="art_gGfBg040aD carousel-item">
                        <img src="<?= ASSETS ?>image/brent-ninaber-7sPYFUKOK_8-unsplash.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="art_gGfBg040aD carousel-item">
                        <img src="<?= ASSETS ?>image/young-musician-singing-dancing-neon-light.jpg" class="d-block w-100"
                            alt="...">
                    </div>
                </div>
            </div>
            <!----{{SEARCH IMAGE}}---->
            <div class="art_bLrB4CN70D">
                <div class="art_bLrB4CN70D_content">
                    <h3>Explore Captivating Moments: Image Gallery</h3>
                    <?php include 'search.php' ?>
                </div>
            </div>
        </div>
        <!-------{{Exhibition wall}}-------->
        <div class="row art_0tyxQTRwB6">
            <div class="wall" id="hmdatimg">
                <!-----{{CANVAS}}---->

                <!-----{{CANVAS}}---->
            </div>
            <div class="art_aQ85xn1gJl">
                 <div class="preloader"></div>
                <button type="button" class="loadMore loadMoredata">Load more</button>
            </div>
        </div>
    </div>   
<?php $this->view("footer",$data); ?>
<?php include 'modal.php'; ?>