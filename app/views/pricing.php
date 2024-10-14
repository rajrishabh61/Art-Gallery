<?php $this->view("header",$data); ?> 
    <!------{{MAIN CONTAINER}}-------->
    <div class="container-fluid m-0 p-0">
        <div class="row _hjgh3bvn5">
            <div class="prcingcontainer">
                <h2>Choose your plan</h2>
                <p>14 days unlimited free trial. No contract or credit card required</p>
                <div class="prcingcontent">
                    <div class="prcingcard">
                            <header>Basic</header>
                            <span class="prcingcard-price">Free</span>
                            <ul>
                                <li><i class="fa-solid fa-check"></i>10 Images Per Months</li>
                                <li><i class="fa-solid fa-check"></i>10 Images Per Months</li>
                                <li><i class="fa-solid fa-check"></i>10 Images Per Months</li>
                            </ul>
                            <button type="button">Free</button>
                    </div>
                    <div class="prcingcard">
                        <header>Popular</header>
                        <span class="prcingcard-price">$15</span>
                        <ul>
                            <li><i class="fa-solid fa-check"></i>25 Images Per Months</li>
                            <li><i class="fa-solid fa-check"></i>25 Images Per Months</li>
                            <li><i class="fa-solid fa-check"></i>25 Images Per Months</li>
                        </ul>
                        <button type="button">Free Trial</button>
                 </div>
                 <div class="prcingcard">
                    <header>Bussiness</header>
                    <span class="prcingcard-price">$100</span>
                    <ul>
                        <li><i class="fa-solid fa-check"></i>100 Images Per Months</li>
                        <li><i class="fa-solid fa-check"></i>100 Images Per Months</li>
                        <li><i class="fa-solid fa-check"></i>100Images Per Months</li>
                    </ul>
                    <button type="button">Custom</button>
            </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->view("footer",$data); ?>
<?php include 'modal.php'; ?>