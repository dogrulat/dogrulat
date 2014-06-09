<?php
/**
 * The Header
 *
 * The header section that is shared by all views in the blog
 *
 * @package WordPress
 * @subpackage Dogrulat
 * @since Dogrulat 1.0
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://www.dogrulat.com/wp-content/uploads/2014/05/favicon.png" type="image/x-icon">

    <title>Doğrulat - Medya ve Politikacıların Sağlaması</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

      <div class="container">
        <div class="header-logo">
            <a href="#">
                <img src="http://www.dogrulat.com/wp-content/uploads/2014/05/dogrulat_logo2.png" />
            </a>
        </div>
        <div class="navbar-header deneme">
          <button type="button" class="navbar-toggle custom-border" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <button type="button" class="navbar-toggle custom-border btn-search" data-toggle="collapse" data-target=".search-collapse">
            <span class="glyphicon glyphicon-search"></span>
          </button>
          <a class="navbar-brand" href="#">
            <img src="http://www.dogrulat.com/wp-content/uploads/2014/05/dogrulat_logo2.png" height="46"/>
          </a>
        </div>

        <div class="collapse navbar-collapse deneme">
          <ul class="nav navbar-nav custom-navbar">
            <?php echo build_menu_items(); ?>
            <li class="li-search"><a href="#" data-toggle="collapse" data-target=".search-collapse" title="ara" class="glyphicon glyphicon-search"></a></li>
          </ul>
        </div><!--/.nav-collapse -->

        <div class="collapse search-collapse">
            <input type="text" class="form-control" placeholder="Doğrulat.com'da Ara" />
        </div><!--/.search-collapse -->
      </div>
    </div>
