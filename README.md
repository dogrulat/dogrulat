Dogrulat
=========
A Wordpress theme specifically designed for [dogrulat.com](http://dogrulat.com), a fact-checking blog for Turkish politicans and media.



###Dependencies
This theme integrates the following Wordpress plugins:

* [Polylang](http://wordpress.org/plugins/polylang/): This plugin is **assumed** to be installed and active. The theme registers a couple of strings in ```function.php```. The admins should provide translations for these strings in the Language section in the admin panel. Note that this assumption is dangerous to the extent that it might crash the theme. Therefore, some refactoring of code is necessary to make sure the plugin is active before using any native functions by the plugin.

* [Simple Share Buttons Adder](https://wordpress.org/plugins/simple-share-buttons-adder/): This plugin is used for displaying share buttons for posts. If the plugin is not available the theme will use its default Facebook and Twitter share buttons.

###Usage
* Menus: The navigation bar uses menus defined in the Menu section of the admin panel. Menus also need to be associated with theme locations. ```build_menu_items()``` function reads the current theme location to generate the navigation items.

* Share Buttons: Simple Share Buttons Adder plugin offers detailed customization options. Dogrulat theme uses ```do_shortcode('[ssba]');``` method to display the buttons on the sidebar and at the bottom of single posts. So, in the settings page of the plugin, it is strongly advised that the admins uncheck all the Location checkboxes to make sure no share buttons are visible other than provided by the theme.

* Comments: The comments are added underneath single posts, however there is no custom comments code implemented in this theme. It is assumed that the admins will use a professional commenting plugin like Disqus. 


###Licence
This theme is licensed under [GNU General Public License v2.0](http://www.gnu.org/licenses/gpl-2.0.html)


This is a functional but obviously incomplete theme. Feel free to fork, file issues and suggest edits.
