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
<?php 

$theme_options = get_option('theme_options');
$template_directory = get_bloginfo('template_directory');

if(trim($theme_options['header_logo_url'])==='') {
  $theme_options['header_logo_url'] = $template_directory . '/img/dogrulat_logo.png';
}

if(trim($theme_options['favicon_url'])==='') {
  $theme_options['favicon_url'] = $template_directory . '/img/favicon.png';
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo $theme_options['favicon_url']; ?>" type="image/x-icon">

    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>

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
    <?php 
      // assu
      if(!is_plugin_active('simple-share-buttons-adder/simple-share-buttons-adder.php')) {
    ?>
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=842299792465983&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
  <?php } ?>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

      <div class="container">
        <div class="header-logo">
            <a href="<?php echo pll_home_url(); ?>">
                <img src="<?php echo $theme_options['header_logo_url']; ?>" />
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
          <?php if(is_home()) { ?>
          <div class="dropdown navbar-toggle lang-switch">
            <span class="glyphicon glyphicon-globe" data-toggle="dropdown" title="<?php echo pll__('Select Language'); ?>"></span>
            <ul class="dropdown-menu">
              <?php echo build_language_option_list(); ?>
            </ul>
          </div>
          <?php } ?>
          <a class="navbar-brand" href="<?php echo pll_home_url(); ?>">
            <img src="<?php echo $theme_options['header_logo_url']; ?>" height="46"/>
          </a>
        </div>

        <div class="collapse navbar-collapse deneme">
          <ul class="nav navbar-nav custom-navbar">
            <?php echo build_menu_items(); ?>
            <li class="li-search">
              <a href="#" data-toggle="collapse" data-target=".search-collapse" title="ara" class="glyphicon glyphicon-search"></a>
            </li>

            <?php if(is_home()) { ?>
            <li id="navbar-lang-switch" class="dropdown navbar-toggle lang-switch">
              <a href="#" class="glyphicon glyphicon-globe" data-toggle="dropdown" title="<?php echo pll__('Select Language'); ?>"></a>
              <ul class="dropdown-menu">
                <?php echo build_language_option_list(); ?>
              </ul>
            </li>
            <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->

        <div class="collapse search-collapse">
          <form method="get" action="<?php bloginfo('url'); ?>/">
            <input type="text" class="form-control" placeholder="<?php echo pll__("Search Blog"); ?>" name="s"/>
          </form>
        </div><!--/.search-collapse -->
      </div>
    </div>
