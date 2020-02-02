<?php include "../../Controllers/ConnectionController.php" ;
session_start();
if(isset($_SESSION['login']))
{
  
}
else  echo '<script>window.location = "../pages/login.php"</script>';
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<!-- Mirrored from themeselection.com/demo/chameleon-admin-template/html/ltr/vertical-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jul 2019 08:50:54 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Cram | espace admin</title>
    <link rel="apple-touch-icon" href="../../public/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../public/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
 <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/css/plugins/forms/switch.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/css/core/colors/palette-switch.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/vendors/css/forms/selects/select2.min.css">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/css/pages/chat-application.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/css/pages/dashboard-analytics.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/app-assets/css/plugins/forms/tags/tagging.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../public/assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light"> 
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                
            </ul>

            <ul class="nav navbar-nav float-right"> 
               <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online"><img src="../../public/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right">
                    <a class="dropdown-item" href="profile"><i class="ft-user"></i> Edit Profile</a>

                    <div class="dropdown-divider"></div><a class="dropdown-item" href="../Actions/Auth/logout_Action.php"><i class="ft-power"></i> Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="../../public/app-assets/images/backgrounds/02.jpg">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="accueil.php"><img class="brand-logo" alt="Chameleon admin logo" src="../../public/app-assets/images/logo/logo.png"/>
              <h3 class="brand-text">Cram</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="navigation-background"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="accueil.php"><i class="ft-home"></i><span class="menu-title" data-i18n="">Accueil</span></a>
            <ul class="menu-content">
              <li class="active"><a class="menu-item" href="accueil.php">Tableau de bord</a>
              </li>
            </ul>
          </li>
          <li class="nav-item"><a href="#"><i class="ft-gitlab"></i><span class="menu-title" data-i18n="">Informations</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="nouvelle-information.php">Nouvelle info</a>
              </li>
              <li><a class="menu-item" href="liste-des-informations.php">Liste des infos</a>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="#"><i class="ft-feather"></i><span class="menu-title" data-i18n="">Récapitulatif</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="recapitulatif-des-correspondants.php">récapitulatif<br>des correspondants</a>
              </li>
              <li><a class="menu-item" href="recapitulatif-des-prestataires.php">récapitulatif<br>des prestataires</a>
              </li>
            </ul>
          </li>


          <li class=" nav-item"><a href="#"><i class="ft-feather"></i><span class="menu-title" data-i18n="">Factures</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="honoraires.php">Honoraires</a>
              </li>
              <li><a class="menu-item" href="remerciement.php">Remerciement</a>
              </li>
            </ul>
          </li>

         


          <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title" data-i18n="">Contacts</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="correspondants.php">Correspondants</a>
              </li>
              <li><a class="menu-item" href="prestataires-de-services.php">Prestataires de <br> services</a>
              </li>
              <li><a class="menu-item" href="commerciaux.php">Commerciaux</a>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="#"><i class="ft-gitlab"></i><span class="menu-title" data-i18n="">Configuration</span></a>
            <ul class="menu-content"><!-- 
              <li><a class="menu-item" href="groupes-correspondants">Groupes <br>Correspondants</a>
              </li> -->
              <li><a class="menu-item" href="groupes-prestataires.php">Groupes prestataires</a>
              </li>
              <li><a class="menu-item" href="type-evenement.php">Types d'evenement</a>
              </li>
              <li><a class="menu-item" href="moyen-hydraulique.php">moyen hydraulique</a>
              </li>
             <!-- <li><a class="menu-item" href="type-de-facture">type de facture</a>-->
              </li>
            </ul>
          </li>


        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>


        <div class="notiff"></div>
