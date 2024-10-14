<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['page_title']; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= ASSETS ?>image/favicon.ico">
    <!---{{FONTAWESOME ICON}}--->
    <script src="https://kit.fontawesome.com/a3d30a8689.js" crossorigin="anonymous"></script>
    <!---{{BOOTSTRAP ICON}}--->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!---{{BOOTSTRAP CSS}}--->
    <link rel="stylesheet" href="<?= ASSETS ?>css/bootstrap.css">
    <!---{{CUSTOM CSS}}--->
    <link rel="stylesheet" href="<?= ASSETS ?>css/style.css?v=1.003">
</head>

<body>
    <div class="header">
        <div class="nav-left">
            <a class="logocontainer" href="<?= BASEURL ?>"><img src="<?= ASSETS ?>image/ArtGallery1.png" alt=""></a>
        </div>
        <a class="d-md-none d-flex hamburger" id="sidebar-toggle" href="#"><i class="bi bi-list"></i></a>
        <div class="nav-right d-none d-md-flex">
            <ul>
                <?php if (isset($data['user_data'])) { ?>
                <!-- <li><a href="collection">COLLECTION</a></li>         -->
                <li><a href="upmg">PARTNER</a></li>
                <?php }else{ ?>
                <!-- <li><a class="lgtacnt" href="#">COLLECTION</a></li>   -->
                <li><a class="lgtacnt" href="#">PARTNER</a></li>
                <?php } ?>   
                <li><a href="pricing">PRICING</a></li>
                <?php if (!isset($data['user_data'])) { ?>
                <li class="_1or0gd"><a class="lgtacnt" href="#">LOGIN</a></li>
                <?php } else { ?>
                <li class="position-relative dropmedown">
                    <div class="_8yoD5a">
                        <div class="drop-user-dp" id="dropmedown" style="background-image: url(&quot;<?php echo (isset($data['user_data'])) ? 'assets/profile/'.$data['user_data']->profilepic: ''; ?>&quot;), url(&quot;<?= ASSETS ?>image/user.png&quot;);"></div>
                        <div class="_dropdown position-absolute" id="mydropdown">
                            <div class="_dropdown-content">
                                <div class="_dropdown-content-top">
                                    <header> <?php echo (isset($data['user_data'])) ? $data['user_data']->fullname : ''; ?></header>
                                    <p><?php echo (isset($data['user_data'])) ? $data['user_data']->email : ''; ?></p>
                                </div>
                                <ul>
                                    <li><a href="upmg">Profile</a></li>
                                    <li><a href="pricing">Pricing</a></li>
                                    <li><a href="logout">Logout</a></li>
                                </ul>
                            </div>
                        </div>   
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="backdrop"></div>
    <div class="sidebar" id="sidebar">
        <ul>
            <?php if(isset($data['user_data'])) { ?>
            <div class="_dropdown-content-top">
            <header> <?php echo (isset($data['user_data'])) ? $data['user_data']->fullname : ''; ?></header>
            <p><?php echo (isset($data['user_data'])) ? $data['user_data']->email : ''; ?></p>
            </div>
            <?php } else { ?>
            <li class="_1or0gd"><a class="lgtacnt" href="#">LOGIN</a></li>
            <?php } ?>   
            <li><a href="<?= BASEURL?>">Home</a></li>
            <li><a href="upmg">Profile</a></li>
            <li><a href="blog">Blog</a></li>
            <li><a href="faq">Help</a></li>
            <?php if(isset($data['user_data'])) { ?>
            <li><a href="logout">Logout</a></li>
            <?php } ?>
        </ul>
    </div>