<!-------{{LOGIN MODAL}}-------->
<div id="logInModal" class="art_modal">
    <div class="modal-content">
        <div class="modal-header" id="closeit">
            <span class="close bi bi-x-lg"></span>
        </div>
        <!-----{{LOGIN}}------>
        <div class="modal-body">
            <div class="modal-content-left d-none d-md-flex">
                <div class="_y7f20wq img-fluid"
                    style="background-image: url(&quot;<?= ASSETS ?>image/earth-DXuxHw3S5ak-unsplash.jpg&quot;), url(&quot;<?= ASSETS ?>image/photo.png&quot;);">
                </div>
            </div>
            <div class="modal-content-right">
                <div class="svmsg"></div>
                <h2>Log In</h2>
                <div class="credential-fields _cred070">
                    <div class="form-group _4t0za1y">
                        <label for="inputEmail1">Email address</label>
                        <input type="email" class="inputEmail1 _0keyinemp" id="inputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email">
                        <small id="emailHelp" class="inputMsg msgerror5"></small>
                    </div>
                    <div class="form-group _4t0za1y">
                        <label for="inputPassword1">Password</label>
                        <input type="password" class="inputPassword _0keyinemp" id="inputPassword1"
                            aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="passwordHelp" class="inputMsg msgerror6"></small>
                    </div>
                    <div class="form-group _4t0za1y">
                        <a class="_fgtpass" href="#">Forgot Password?</a>
                    </div>
                    <div class="form-group _4t0za1y">
                        <button type="button" class="_2t0conti" id="lg2web">Continue</button>
                    </div>
                    <div class="form-group _4t0za1y">
                        <p class="_nwaccrt">I don't have account <a href="#" id="crtacnt" class="crtacnt">Create Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------{{SIGIN MODAL}}-------->
<div id="signInModal" class="art_modal">
    <div class="modal-content">
        <div class="modal-header" id="closeme">
            <span class="close bi bi-x-lg"></span>
        </div>
        <!-----{{SIGNIN}}------>
        <div class="modal-body">
            <div class="modal-content-left d-none d-md-flex">
                <div class="_y7f20wq img-fluid"
                    style="background-image: url(&quot;<?= ASSETS ?>image/dom-hill-nimElTcTNyY-unsplash.jpg&quot;), url(&quot;<?= ASSETS ?>image/photo.png&quot;);">
                </div>
            </div>
            <div class="modal-content-right">
                <div class="svmsg"></div>
                <h2>Sign In</h2>
                <div class="credential-fields _crdenfld">
                    <div class="form-group _4t0za1y">
                        <label for="inputEmail2">Full Name</label>
                        <input type="email" class="inputname2 _0keyinemp" id="inputname2" aria-describedby="nameHelp"
                            placeholder="Enter name" autocomplete="off">
                        <small id="nameHelp" class="inputMsg msgerror1"></small>
                    </div>
                    <div class="form-group _4t0za1y">
                        <label for="inputEmail1=2">Email address</label>
                        <input type="email" class="inputEmail2 _0keyinemp" id="inputEmail2" aria-describedby="emailHelp"
                            placeholder="Enter email" autocomplete="off">
                        <small id="emailHelp" class="inputMsg msgerror2"></small>
                    </div>
                    <div class="form-group _4t0za1y">
                        <label for="inputPassword2">Password</label>
                        <input type="password" class="inputPassword2 _0keyinemp" id="inputPassword2"
                            aria-describedby="passwordHelp" placeholder="Enter Password" autocomplete="off">
                        <small id="passwordHelp" class="inputMsg msgerror3"></small>
                    </div>
                    <div class="form-group _4t0za1y">
                        <button type="button" class="_2t0conti" id="sbmtcrtacnt">Continue</button>
                    </div>
                    <div class="form-group _4t0za1y">
                        <p class="_nwaccrt">Already have an account <a href="#" id="lgtacnt" class="lgtacnt">Log in</a></p>
                    </div>
                </div>
                <!-------{{OTP VAlIDATION}}----->
                <div class="authentication-fields _authfld d-none">
                    <div class="form-group _4t0za1y">
                        <label for="inputotp1">Enter OTP</label>
                        <input type="text" class="inputotp1 _0keyinemp" id="inputotp1" aria-describedby="otpHelp"
                            placeholder="Enter 6 digit OTP" autocomplete="off">
                        <small id="otpHelp" class="inputMsg msgerror4"></small>
                    </div>
                    <div class="form-group _4t0za1y">
                        <p class="_rsndotp"><button type="button" class="_resdme" id="rsndotp">Resend OTP</button><span
                                class="_resndtim" id="timrstrd">00:00</span></p>
                    </div>
                    <div class="form-group _4t0za1y">
                        <button type="button" class="_2t0conti" id="vrfotp">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--------{{SHARE MODAL}}---------->
<div id="shareModal" class="shr_modal">
    <div class="shr-modal-content">
        <div class="shr-modal-header" id="shrmdlclose">
            <span class="close bi bi-x-lg"></span>
        </div>
        <div class="shr-modal-body">
            <div class="shr-content1">
                <div class="shr-imgcnt">
                    <img class="shrmgmd01" src="" alt="">
                </div>
            </div>
            <div class="shr-content2">
                <h3>Share this with your social Community</h3>
                <div class="_shrlkbtn">
                    <a href="#" class="_shr01bti _fbshrbt"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="_shr01bti _twshrbt"><i class="bi bi-twitter"></i></a>
                </div>
                <P class="_tcpl05">or copy link</P>
                <div class="_cpyurlcnt">
                <div class="_04cpbxcnt">
                    <input type="text" class="_cpyurl" value="https://www.google.com">
                    <button type="button" class="_cpybt clipbtn" onclick="copyToClipboard('_cpyurl')">Copy</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---------{{UPLOAD IMAGE MODAL}}------------->
<div id="uploadImgModal" class="upl_modal">
    <div class="upl-modal-content">
        <div class="upl-modal-header" id="closeitup">
            <span class="close bi bi-x-lg"></span>
        </div>
        <!-----{{UPLOAD}}------>
        <div class="_uplmdhdr">Upload Image</div>
        <div class="upl-modal-body">
            <div class="upl-modal-body-content">
                <div class="browsme">
                <input type="file" name="file[]" class="uploadmlimg" id="upload" multiple style="display: none;">
                    <!-- <input type="file" name="file" id="upload" multiple style="display: none;"> -->
                    <label for="upload" class="image-browse-container">
                        <span><i class="bi bi-cloud-upload"></i></span>
                        <h5>Click to upload images</h5>
                        <p>Maximum 4 images at once. Only png , jpg accepted</p>
                    </label>
                </div>
                <div class="previewme" id="preview-container"></div>
            </div>
        </div>
        <div class="_uplmdftr upload-button">
            <button class="_btnplimgmd btn-upload" style="display: none;">Upload</button>
        </div>
    </div>
</div>
<!---------{{PROFILE EDIT MODAL}}------------->
<div id="profileUpdateModal" class="prfl_modal">
    <div class="prfl-modal-content">
        <div class="prfl-modal-header" id="closeitupprf">
            <span class="close bi bi-x-lg"></span>
        </div>
        <!-----{{UPLOAD}}------>
        <div class="_prfupl">Settings</div>
        <div class="prfl-modal-body">
        <div class="mb-3">
            <label for="profilepicture" class="form-label">Choose Profile Picture</label>
            <input class="form-control pfr_074" type="file" id="profilepicture" aria- 
            describedby="profileHelp">
         <small id="dobHelp" class="inputMsg msgerror20"></small>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input class="form-control pfr_074" type="date" id="dob" aria-describedby="dobHelp">
          <small id="dobHelp" class="inputMsg msgerror19"></small>
        </div>
        </div>
        <div class="_prfmdl upload-button">
            <button class="_btnplimgmd profile-upload">Upload</button>
        </div>
    </div>
</div>
<!------------{{ARTIST MODAL}}--------------->
<div id="artistModal" class="artist_modal">
    <div class="artist-modal-content">
        <div class="artist-modal-header" id="closemeart">
            <span class="close bi bi-x-lg"></span>
        </div>
        <!-----{{ARTIST}}------>
        <div class="artist-modal-body">
        <div class="artbodcontent" id="myartgallery">
            
  
            </div>
        </div>
       </div>
</div>
</div>
