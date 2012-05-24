<?php
// $Id: page.tpl.php,v 1.1.2.19 2009/06/12 15:44:26 jmburnz Exp $

/**
 * @file page.tpl.php
 * Theme implementation to display a single Drupal page for Genesis Subtheme.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *     least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *     themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *     so on).
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *     for the page.
 * - $section_class: A CSS class that uses .section + the 1st URL argument, allows for
 *     themeing site sections based on path.
 * - $classes: A set of CSS classes (preprocess $body_classes + Genesis custom classes). 
 *     This contains flags indicating the current layout (multiple columns, single column), 
 *     the current path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *     when linking to the front page. This includes the language domain or prefix.
 * - $site_logo: The preprocessed $logo varaible. Includes the path to the logo image, 
 *     as defined in theme configuration and wrapped in an anchor linking to the homepage.
 * - $site_name: The name of the site (preprocessed) wrapped in an anchor linking to the homepage. 
 *     Empty when display has been disabled in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *     in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *     in theme settings.
 *
 * Navigation:
 * - $primary_menu: The preprocessed $primary_links (array), an array containing primary 
 *     navigation links for the site, if they have been configured.
 * - $secondary_menu: The preprocessed $secondary_links (array), an array containing secondary 
 *     navigation links for the site, if they have been configured.
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $leaderboard: Custom region for displaying content at the top of the page, useful
 *     for displaying a banner.
 * - $header: The header blocks region for display content in the header.
 * - $secondary_content: Full width custom region for displaying content between the header
 *     and the main content columns.
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $content_top: A custom region for displaying content above the main content.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *     and edit tabs when displaying a node).
 * - $content: The main content of the current Drupal page.
 * - $content_bottom: A custom region for displaying content above the main content.
 * - $left: Region for the left sidebar.
 * - $right: Region for the right sidebar.
 * - $tertiary_content: Full width custom region for displaying content between main content 
 *   columns and the footer.
 *
 * Footer/closing data:
 * - $footer : The footer region.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $closure: Final closing markup from any modules that have altered the page.
 *     This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see genesis_preprocess_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<?php
/**
 * Change the body id selector to your preferred layout, e.g body id="genesis-1a".
 * @see layout.css
 */
?>        
<body id="genesis-1b" <?php print $section_class; ?>>
  <div id="wrapper" class="<?php print $classes; ?>">

    <div id="skip-nav">
      <a href="#main-content"><?php print t('Skip to main content'); ?></a>
    </div>

    <?php if ($leaderboard): ?>
      <div id="leaderboard" class="clear-block main-block">
  		  <div class="container"><div class="container-2">
          <?php print $leaderboard; ?>
		    </div></div> <!-- /container --><!-- /container-2 -->
      </div> <!-- /leaderboard -->
    <?php endif; ?>

    <div id="header" class="clear-block main-block">
		  <div class="container"><div class="container-2">

      <?php if ($site_logo or $site_name or $site_slogan): ?>
        <div id="branding">

          <?php if ($site_logo or $site_name): ?>
            <?php if ($title): ?>
              <div class="logo-site-name"><strong>
                <?php if ($site_logo): ?><span id="logo"><?php print $site_logo; ?></span><?php endif; ?>
                <?php if ($site_name): ?><span id="site-name"><?php print $site_name; ?></span><?php endif; ?>
              </strong></div>           
            <?php else: /* Use h1 when the content title is empty */ ?>     
              <h1 class="logo-site-name">
                <?php if ($site_logo): ?><span id="logo"><?php print $site_logo; ?></span><?php endif; ?>
                <?php if ($site_name): ?><span id="site-name"><?php print $site_name; ?></span><?php endif; ?>
             </h1>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($site_slogan): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>

        </div> <!-- /branding -->
      <?php endif; ?>

      <?php if ($nav): ?>
        <div id="nav" class="nav section region" role="navigation">
          <?php print $nav; ?>
        </div> <!-- /nav-blocks -->
      <?php endif; ?>

	  </div></div>  <!-- /.container --><!-- /.container-2 -->
    </div> <!-- /#header -->
	
	  <div id="ribbon" class="clear-block main-block">
        <div class="container"><div class="container-2">          
          <?php if ($title): ?>
			      <div id="ribbon-text">
			        <h1 id="page-title"><?php print $title; ?></h1>
		      <?php endif; ?>
          <?php if ($ribbon): ?>
            <?php print $ribbon; ?>
          <?php endif; ?>
          <?php if ($title): ?>
			      </div><!-- /#ribbon-text -->
		      <?php endif; ?>
          <?php if ($ribbon_image): ?>
            <div id="ribbon-image">
              <?php print $ribbon_image; ?>
            </div>  
          <?php endif; ?>
	    </div></div>  <!-- /.container --><!-- /.container-2 -->
	  </div>  <!-- /#ribbon -->
	
<div id="main" class="clear-block main-block">
  <div class="container"><div class="container-2">  
    
    <?php if ($secondary_content): ?>
      <div id="secondary-content" class="section region"><div class="region-inner">
        <?php print $secondary_content; ?>
      </div></div> <!-- /secondary-content -->
    <?php endif; ?>

    <div id="columns"><div class="columns-inner clear-block">
    
      <div id="content-column"><div class="content-inner">

        <?php if ($mission): ?>
          <div id="mission"><?php print $mission; ?></div> <!-- /mission -->
        <?php endif; ?>

        <?php if ($content_top): ?>
          <div id="content-top" class="section region"><?php print $content_top; ?></div> <!-- /content-top -->
        <?php endif; ?>

        <div id="main-content">
          <?php if ($tabs): ?>
            <div class="local-tasks"><div class="clear-block">
              <?php print $tabs; ?>
            </div></div>
          <?php endif; ?>
          <?php if ($messages): print $messages; endif; ?>
          <?php if ($help): print $help; endif; ?>
          <div id="content" class="section region">
            <?php print $content; ?>
          </div>								
        </div> <!-- /main-content -->

        <?php if ($content_bottom): ?>
          <div id="content-bottom" class="section region"><?php print $content_bottom; ?></div> <!-- /content-bottom -->
        <?php endif; ?>

      </div></div> <!-- /content-column -->

      <?php if ($left): ?>
        <div id="sidebar-left" class="section sidebar region"><div class="sidebar-inner">
          <?php print $left; ?>
        </div></div> <!-- /sidebar-left -->
      <?php endif; ?>

      <?php if ($right): ?>
        <div id="sidebar-right" class="section sidebar region"><div class="sidebar-inner">
          <?php print $right; ?>
        </div></div> <!-- /sidebar-right -->
      <?php endif; ?>
    
  </div></div> <!-- /columns -->

    <?php if ($tertiary_content): ?>
      <div id="tertiary-content" class="section region clear-block"><div class="region-inner">
        <?php print $tertiary_content; ?>
      </div></div> <!-- /tertiary-content -->
    <?php endif; ?>
      
  </div></div>  <!-- /.container --><!-- /.container-2 -->
</div> <!-- /#main -->

      <div id="footer" class="clear-block main-block">
		    <div class="container"><div class="container-2">

        <?php if ($footer_message or $footer_login): ?>
          <div id="footer-message" class="clear-block">
            <?php if ($footer_message): ?>
              <?php print $footer_message; ?>
            <?php endif; ?>
            <?php if ($footer_login): ?>
              <div id="footer-login" class="section region"><div class="region-inner">
                <?php print $footer_login; ?>
              </div></div> <!-- /footer_login -->
            <?php endif; ?>
          </div> <!-- /footer-message/feed-icon -->
        <?php endif; ?>

        <?php if ($footer): ?>
          <div id="footer-block" class="section region clear-block"><div class="region-inner">
            <?php print $footer; ?>
          </div></div> <!-- /footer -->
        <?php endif; ?>
        
        
        <?php if ($feed_icons): ?>
          <?php print $feed_icons; ?>
        <?php endif; ?>

	  </div></div>  <!-- /.container --><!-- /.container-2 -->
	</div> <!-- /#footer -->

  </div> <!-- /wrapper -->

  <?php print $closure ?>

</body>
</html>