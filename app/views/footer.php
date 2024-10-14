    <!------{{FOOTER}}-------->
    <div class="footer">
        <div class="foot_top">
            <div class="foot_left">
                <a class="footerlogo" href="<?= BASEURL ?>"><img src="<?= ASSETS ?>image/ArtGalleryt.png" alt=""></a>
            </div>
            <div class="foot_center">
                <div class="foot_c1">
                    <header>CONTENT</header>
                    <ul>
                    <?php if (isset($data['user_data'])) { ?>
                        <li><a href="upmg">Apply to be a contributor</a></li>
                        <?php } else { ?>
                        <li><a class="lgtacnt">Apply to be a contributor</a></li>
                        <?php } ?>
                        <li><a href="blog">Blog</a></li>
                    </ul>
                </div>
                <div class="foot_c2">
                    <header>COMPANY</header>
                    <ul>
                        <li><a href="about">About</a></li>
                        <li><a href="privacy">Privacy Policy</a></li>
                        <li><a href="tou">Terms Of Use</a></li>
                        <?php if (isset($data['user_data'])) { ?>
                        <li><a href="contact">Contact Us</a></li>
                        <?php } else { ?>
                        <li><a href="#" class="lgtacnt">Contact Us</a></li>
                        <?php } ?>
                        <li><a href="faq">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="foot_right">
                <div class="foot_r1">
                    <header>FOLLOW US</header>
                    <ul>
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="foot_r2">
                    <header>CONTACT US</header>
                    <ul>
                        <li>Address: 123 Main Street, Furfuri Nagar, Dholakpur 12345</li>
                        <li>Phone: (555) 555-5555</li>
                        <li>Email: info@example.com</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="divider_1"></div>
        <div class="foot_bottom">
            <p>Copyright © 2021 Art Gallery. All rights reserved.</p>
        </div>
    </div>
    <!------{{jQuery}}-------->
    <script src="<?= ASSETS ?>js/jquery.js"></script>
    <!------{{Bootstrap}}-------->
    <script src="<?= ASSETS ?>js/bootstrap.js"></script>
    <!------{{Style}}-------->
    <script src="<?= ASSETS ?>js/style.js?v=1.004"></script>
    <!------{{Copied text popup}}-------->
    <script>
function copyToClipboard(className) {
    var element = document.getElementsByClassName(className)[0];
    var textToCopy = element.value; // Get the value of the input field

    var tempElement = document.createElement('input');
    tempElement.value = textToCopy;
    document.body.appendChild(tempElement);
    tempElement.select();
    tempElement.setSelectionRange(0, 99999); // For mobile devices

    try {
        document.execCommand('copy');
        $('.clipbtn').append('<div class="clipbtn_msg">Copied!</div>');
        $('.clipbtn_msg').fadeIn(300).delay(1500).fadeOut(300, function () {
            $(this).remove();
        });
    } catch (err) {
        console.log('Unable to copy text.');
    }

    document.body.removeChild(tempElement);
}

    </script>
</body>

</html>