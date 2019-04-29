<?php
include "C:/wamp64/www/zanimo/demo.devitems.com/entities/utilisateur.php";
include "C:/wamp64/www/zanimo/demo.devitems.com/core/utilisateurCore.php";
require_once "C:/wamp64/www/zanimo/demo.devitems.com/views/marten-v1/GoogleC.php";
global $erreur;
if(isset($_POST['forminscription']))
{
  
    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp'] AND !empty($_POST['mdp2']))) 
    {

      $pseudo =htmlspecialchars($_POST['pseudo']);
      $mail =htmlspecialchars($_POST['mail']);
      $mail2 =htmlspecialchars($_POST['mail2']);
      $mdp = sha1($_POST['mdp']);
      $mdp2 = sha1($_POST['mdp2']);

      $pseudolength =strlen($pseudo);
      if($pseudolength<=255)
        { 
            if($mail == $mail2)
            {   

        if(filter_var($mail,FILTER_VALIDATE_EMAIL))
           {
                     $utilisateur2C = new utilisateurCore();
                     $mailexist=$utilisateur2C->VerifierEmail($mail);
                if($mailexist==0)
                {
                if($mdp == $mdp2)
                {  

      //hne yebda el controle de saisie level 2

       //longuer de mot de passe >8             
     if (strlen($_POST['mdp'])>=8) {
      
                if (ctype_lower ($_POST['mdp'])) {
                                  $erreur="votre mot de passe doit contenir au moins une caractére en  majuscule !" ; 
                                  echo $erreur;
                            }else{  
                               
                                  $longueurKey = 12;
                    $key = "";
                    for ($i=1; $i<$longueurKey; $i++) { 
                        $key .= mt_rand(0,9);
                    }    



                    if (isset($_POST['captcha'])) {
                        //session_start();
    
    if ($_POST['captcha'] == $_SESSION['captcha']) {
       
                        $utilisateur1 = new utilisateur($pseudo,$mail,$mdp);
                        $utilisateur1C = new utilisateurCore();
                        $utilisateur1C->inscritption($utilisateur1,$key);
                        $utilisateur1C->EnvoyerMail($mail,$pseudo,$key);
                        mail($mail, "fadhel", "message");


                        $erreur="votre comptre à été bien crée";
                        echo "votre compte a été bien crée ! veuillez Confirmez votre compte";

                        //alert("Confirmez votre compte!");

    }else{
        $erreur="captcha invalide";
        echo $erreur;
    }
}

                            }


//strlen
} else{
    $erreur="votre mot de passe doit etre plus que 8 caractéres !";
    echo $erreur;
}
  //Hne youfa el controle de siasie 2



                }
                else{
                    $erreur="vos mot de passes ne correspond pas";
                        echo $erreur;

                }
                }
                else{
                    $erreur="email déja utilisé , veuillez utiliser une autre adresse !";
                        echo $erreur;

                }
             }
             else{
                $erreur="votre adresse mail n est pas valide !";
                    echo $erreur;

             }

            }
            else{
                $erreur="votre mail ne corresond pas";
                    echo $erreur;

            }

        }
      else{
        $erreur ="votre pseudo a depasser 255 erreurs";
            echo $erreur;

      }
    
    }
    else
    {
        $erreur = "tous les champs doivent etre complétes";
            echo $erreur;


    }
}

//google APIs
   /*if (isset($_SESSION['access_token'])) {
        header('Location: account.php');
        exit();
    }

    $loginURL = $gClient->createAuthUrl();*/

//google APis
    ?>
<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- Mirrored from demo.devitems.com/marten-v1/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Feb 2019 22:01:32 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Marten - Pet Food eCommerce Bootstrap4 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- all css here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/simple-line-icons.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <header class="header-area">
            <div class="header-top theme-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="welcome-area">
                                <p>Default welcome msg! </p>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <div class="account-curr-lang-wrap f-right">
                                <ul>
                                    <li class="top-hover"><a href="#">$Doller (US) <i class="icon-arrow-down"></i></a>
                                        <ul>
                                            <li><a href="#">Taka (BDT)</a></li>
                                            <li><a href="#">Riyal (SAR)</a></li>
                                            <li><a href="#">Rupee (INR)</a></li>
                                            <li><a href="#">Dirham (AED)</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><img alt="flag" src="assets/img/icon-img/en.jpg"> English  <i class="icon-arrow-down"></i></a>
                                        <ul>
                                            <li><a href="#"><img alt="flag" src="assets/img/icon-img/bl.jpg">Bangla </a></li>
                                            <li><a href="#"><img alt="flag" src="assets/img/icon-img/ar.jpg">Arabic</a></li>
                                            <li><a href="#"><img alt="flag" src="assets/img/icon-img/in.jpg">Hindi </a></li>
                                            <li><a href="#"><img alt="flag" src="assets/img/icon-img/sp.jpg">Spanish</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom transparent-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-5">
                            <div class="logo pt-39">
                                <a href="index.html"><img alt="" src="https://www.z-animo.com/img/Nx100xzanimo-shop.png.pagespeed.ic.tj-KLNq0HE.webp"></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 d-none d-lg-block">
                            <div class="main-menu text-center">
                                <nav>
                                    <ul>
                                        <li><a href="index.html">HOME</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="index.html">home version 1</a>
                                                </li>
                                                <li>
                                                    <a href="index-2.html">home version 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mega-menu-position"><a href="shop-page.html">Food</a>
                                            <ul class="mega-menu">
                                                <li>
                                                    <ul>
                                                        <li class="mega-menu-title">Dogs Food</li>
                                                        <li><a href="shop-page.html">Eggs</a></li>
                                                        <li><a href="shop-page.html">Carrots</a></li>
                                                        <li><a href="shop-page.html">Salmon fishs</a></li>
                                                        <li><a href="shop-page.html">Peanut Butter</a></li>
                                                        <li><a href="shop-page.html">Grapes & Raisins</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul>
                                                        <li class="mega-menu-title">Cats Food</li>
                                                        <li><a href="shop-page.html">Meat</a></li>
                                                        <li><a href="shop-page.html">Fish</a></li>
                                                        <li><a href="shop-page.html">Eggs</a></li>
                                                        <li><a href="shop-page.html">Veggies</a></li>
                                                        <li><a href="shop-page.html">Cheese</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul>
                                                        <li class="mega-menu-title">Fishs Food</li>
                                                        <li><a href="shop-page.html">Rice</a></li>
                                                        <li><a href="shop-page.html">Veggies</a></li>
                                                        <li><a href="shop-page.html">Cheese</a></li>
                                                        <li><a href="shop-page.html">wheat bran</a></li>
                                                        <li><a href="shop-page.html">Cultivation</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul>
                                                        <li><a href="shop-page.html"><img alt="" src="assets/img/banner/menu-img-4.jpg"></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">PAGES</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="about-us.html">about us</a>
                                                </li>
                                                <li>
                                                    <a href="shop-page.html">shop page</a>
                                                </li>
                                                <li>
                                                    <a href="shop-list.html">shop list</a>
                                                </li>
                                                <li>
                                                    <a href="product-details.html">product details</a>
                                                </li>
                                                <li>
                                                    <a href="cart.html">cart page</a>
                                                </li>
                                                <li>
                                                    <a href="checkout.html">checkout</a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">wishlist</a>
                                                </li>
                                                <li>
                                                    <a href="contact.html">contact us</a>
                                                </li>
                                                <li>
                                                    <a href="my-account.html">my account</a>
                                                </li>
                                                <li>
                                                    <a href="login-register.html">login / register</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="blog-leftsidebar.html">Blog</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="blog.html">blog page</a>
                                                </li>
                                                <li>
                                                    <a href="blog-leftsidebar.html">blog left sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="blog-details.html">blog details</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="about-us.html">ABOUT</a></li>
                                        <li><a href="contact.html">contact us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-8 col-sm-8 col-7">
                            <div class="search-login-cart-wrapper">
                                <div class="header-search same-style">
                                    <button class="search-toggle">
                                        <i class="icon-magnifier s-open"></i>
                                        <i class="ti-close s-close"></i>
                                    </button>
                                    <div class="search-content">
                                        <form action="#">
                                            <input type="text" placeholder="Search">
                                            <button>
                                                <i class="icon-magnifier"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-login same-style">
                                    <a href="login-register.html"><i class="icon-user icons"></i></a>
                                </div>
                                <div class="header-cart same-style">
                                    <button class="icon-cart">
                                        <i class="icon-handbag"></i>
                                        <span class="count-style">02</span>
                                    </button>
                                    <div class="shopping-cart-content">
                                        <ul>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="assets/img/cart/cart-1.jpg"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Dog Calcium Food </a></h4>
                                                    <h6>Qty: 02</h6>
                                                    <span>$260.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="ti-close"></i></a>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="assets/img/cart/cart-2.jpg"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Dog Calcium Food</a></h4>
                                                    <h6>Qty: 02</h6>
                                                    <span>$260.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="ti-close"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-total">
                                            <h4>Shipping : <span>$20.00</span></h4>
                                            <h4>Total : <span class="shop-total">$260.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-btn">
                                            <a href="cart.html">view cart</a>
                                            <a href="checkout.html">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow">
                                        <li><a href="#">HOME</a>
                                            <ul>
                                                <li><a href="index.html">home version 1</a></li>
                                                <li><a href="index-2.html">home version 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">pages</a>
                                            <ul>
                                                <li>
                                                    <a href="about-us.html">about us</a>
                                                </li>
                                                <li>
                                                    <a href="shop-page.html">shop page</a>
                                                </li>
                                                <li>
                                                    <a href="shop-list.html">shop list</a>
                                                </li>
                                                <li>
                                                    <a href="product-details.html">product details</a>
                                                </li>
                                                <li>
                                                    <a href="cart.html">cart page</a>
                                                </li>
                                                <li>
                                                    <a href="checkout.html">checkout</a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">wishlist</a>
                                                </li>
                                                <li>
                                                    <a href="contact.html">contact us</a>
                                                </li>
                                                <li>
                                                    <a href="my-account.html">my account</a>
                                                </li>
                                                <li>
                                                    <a href="login-register.html">login / register</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Food</a>
                                            <ul>
                                                <li><a href="#">Dogs Food</a>
                                                    <ul>
                                                        <li><a href="shop-page.html">Grapes and Raisins</a></li>
                                                        <li><a href="shop-page.html">Carrots</a></li>
                                                        <li><a href="shop-page.html">Peanut Butter</a></li>
                                                        <li><a href="shop-page.html">Salmon fishs</a></li>
                                                        <li><a href="shop-page.html">Eggs</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Cats Food</a>
                                                    <ul>
                                                        <li><a href="shop-page.html">Meat</a></li>
                                                        <li><a href="shop-page.html">Fish</a></li>
                                                        <li><a href="shop-page.html">Eggs</a></li>
                                                        <li><a href="shop-page.html">Veggies</a></li>
                                                        <li><a href="shop-page.html">Cheese</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Fishs Food</a>
                                                    <ul>
                                                        <li><a href="shop-page.html">Rice</a></li>
                                                        <li><a href="shop-page.html">Veggies</a></li>
                                                        <li><a href="shop-page.html">Cheese</a></li>
                                                        <li><a href="shop-page.html">wheat bran</a></li>
                                                        <li><a href="shop-page.html">Cultivation</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">blog</a>
                                            <ul>
                                                <li>
                                                    <a href="blog.html">blog page</a>
                                                </li>
                                                <li>
                                                    <a href="blog-leftsidebar.html">blog left sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="blog-details.html">blog details</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html"> Contact us </a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url(assets/img/banner/banner-2.jpg);">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2>Register</h2>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li class="active">Register</li>
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <!--======= FORM  =========-->
                        <form role="form" id="contact_form" class="contact-form" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="row">
                                        <li class="col-sm-12">
                                            <label>
                        <input type="text" class="form-control" placeholder="*PSEUDO" name="pseudo" id="pseudo" value="<?php if(isset($pseudo)){ echo($pseudo);}?>">
                      </label>
                                        </li>
                                        <li class="col-sm-12">
                                            <label>
                        <input type="email" class="form-control"  placeholder="*ADRESSE MAIL" name="mail" id="mail" value="<?php if(isset($mail)){ echo($mail);}?>">
                      </label>
                                        </li>
                                        <li class="col-sm-12">
                                            <label>
                        <input type="email" class="form-control" placeholder="*CONFIRMER VOTRE MAIL" name="mail2" id="mail2" value="<?php if(isset($mail2)){ echo($mail2);}?>">
                      </label>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="row">
                                        <li class="col-sm-12">
                                            <label>
                        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="*MOT DE PASSE">
                      </label>
                                        </li>
                                        <li class="col-sm-12">
                                            <label>
                        <input type="password" class="form-control" name="mdp2" id="mdp2" placeholder="*CONFIRMER MOT DE PASSE">
                      </label>
                                        </li>
                                        <li class="col-sm-12">
                                            <label>
                        <input type="hidden" class="form-control" name="website" id="website" placeholder="*AGE">
                      </label>
                                        </li>
                                        <!-- captcha -->
                                          <li class="col-sm-12">
                   
  <table>
      <td><img src="captcha.php"> </td>
      <td><input type="text" name="captcha" class="form-control"></td>
  </table>


                                        </li>
                                        <!-- captcha -->
                                        <li class="col-sm-12 no-margin">
                                        <table>
                                           
                                            <td>
                                                <input type="submit" value="S'INSCRIRE" class="btn" id="btn_submit" onClick="proceed();" name="forminscription">
                                            </td>
                                        </table>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        </section>


      
		<footer class="footer-area">
            <div class="footer-top pt-80 pb-50 gray-bg-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget mb-30">
                                <div class="footer-info-wrapper">
                                    <div class="footer-logo">
                                        <a href="#">
                                            <img src="assets/img/logo/logo-2.png" alt="">
                                        </a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, co adipisi elit, sed eiusmod tempor incididunt ut labore et dolore</p>
                                    <div class="social-icon">
                                        <ul>
                                            <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                                            <li><a href="#"><i class="icon-social-instagram"></i></a></li>
                                            <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                                            <li><a href="#"><i class="icon-social-skype"></i></a></li>
                                            <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget mb-30 pl-50">
                                <h4 class="footer-title">USEFUL LINKS</h4>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="#">Help & Contact Us</a></li>
                                        <li><a href="#">Returns & Refunds</a></li>
                                        <li><a href="#">Online Stores</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
                            <div class="footer-widget mb-30 pl-70">
                                <h4 class="footer-title">HELP</h4>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="#">Faq's </a></li>
                                        <li><a href="#">Pricing Plans</a></li>
                                        <li><a href="#">Order Traking</a></li>
                                        <li><a href="#">Returns </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="footer-widget">
                                <div class="newsletter-wrapper">
                                    <p>Subscribe to our newsletter and get 10% off your first purchase..</p>
                                    <div class="newsletter-style">
                                        <div id="mc_embed_signup" class="subscribe-form">
                                            <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                                <div id="mc_embed_signup_scroll" class="mc-form">
                                                    <input type="email" value="" name="EMAIL" class="email" placeholder="Your mail address" required>
                                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                    <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                                    <div class="clear"><input type="submit" value="SEND" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="payment-img">
                                    <a href="index.html">
                                        <img src="assets/img/icon-img/payment.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom gray-bg-3 pt-17 pb-15">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright text-center">
                                <p>Copyright © <a href="#">Marten.</a> All Right Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</footer>
		
		
		
		
		<!-- all js here -->
        <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/elevetezoom.js"></script>
        <script src="assets/js/ajax-mail.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

<!-- Mirrored from demo.devitems.com/marten-v1/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Feb 2019 22:01:32 GMT -->
</html>
