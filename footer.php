<?php $theme_options = get_option('theme_options'); ?>
    <div id="footer">
      <div class="f-container">
        <span class="about"><?php bloginfo('description'); ?></span> <br />
        <span class="social-media">
          <a href="<?php echo $theme_options['twitter_url']; ?>">
            <img src="<?php bloginfo('template_directory'); ?>/img/twitter-logo.png" />
          </a>
          <a href="<?php echo $theme_options['facebook_url']; ?>">
            <img src="<?php bloginfo('template_directory'); ?>/img/fb-logo.png" />
          </a>
        </span><br />
        <span class="copyright">© 2014 Doğrulat</span> <br />

      </div>
    </div>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/template.js"></script>
  </body>
</html>