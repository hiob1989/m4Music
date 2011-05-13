<?php
// $Id: page.tpl.php,v 1.1 2009/07/19 18:14:52 garthee Exp $
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>">

  <head>
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <!--[if IE 7]>
      <link rel="stylesheet" href="<?php print $base_path . $directory; ?>/ie7-fixes.css" type="text/css">
    <![endif]-->
    <!--[if lte IE 6]>
      <link rel="stylesheet" href="<?php print $base_path . $directory; ?>/ie6-fixes.css" type="text/css">
    <![endif]-->
    <?php print $scripts; ?>

    <?php if (theme_get_setting('iepngfix_display')) { ?>
    <!--[if lte IE 6]>
      <script type="text/javascript"> 
        $(document).ready(function(){ 
          $(document).pngFix(); 
        }); 
      </script> 
    <![endif]-->
    <?php } ?>

    <?php if (theme_get_setting('colorswitch_display')) { ?>
      <!-- override style.css -->
      <style type="text/css">
       #main-wrapper-in { background-color: <?php print $colorswitch_border; ?>; border-color: <?php print $colorswitch_border; ?> }
       #page { background-color: <?php print $colorswitch_bg; ?>; color: <?php print $colorswitch_font; ?> }
      </style>
    <?php } ?>
    
  <?php if ($suckerfish) { ?>
    <?php if (theme_get_setting('suckerfish_display')) { ?>
      <link rel="stylesheet" href="<?php print $base_path . $directory; ?>/suckerfish.css" type="text/css">
      <script type="text/javascript" src="<?php print $GLOBALS['base_url'] ."/"; print $directory; ?>/js/suckerfish.js"></script>
    <?php }  ?>
  <?php } ?>
    
  </head>

  <body class="<?php print $body_classes; ?>">
    <div id="page-border" class="clearfix">
     <div id="page" class="clearfix">

      <div id="header">
        <div id="header-wrapper" class="clearfix">
          
          <div id="login-box">
            <?php 
              global $user; 
              if ($user->uid >0)
                print '<a href="' . url('logout') . '" title="' . t('Logout') . '">' . t('Logout') . '</a>';
              else
                print '<a href="' . url('user/login') . '" title="' . t('Login or Register') . '">' . t('Login / Register') . '</a>';
            ?>
          </div><!-- /login-box -->
          <?php if (theme_get_setting('colorswitch_display')) { ?>
          <div id="colorswitch-box">
            <?php print $colorswitch_text; ?>
          </div><!-- /colorswitch-box -->
          <?php } ?>

          <?php if ($search_box): ?>
          <div id="search-box">
            <?php print $search_box; ?>
          </div><!-- /search-box -->
          <?php endif; ?>
          
          <div id="header-first">
            <?php if ($logo): ?> 
            <div id="logo">
              <a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a>
            </div>
            <?php endif; ?>
            
           
          </div><!-- /header-first -->
  
          <div id="header-middle">
            <?php if ($header_middle): ?>
              <?php print $header_middle; ?>
            <?php endif; ?>
          </div><!-- /header-middle -->
      
          <div id="header-last"> 
            <?php if ($site_slogan): ?>
            <span id="slogan"><?php print $site_slogan; ?></span>
            <?php endif; ?>
            <?php if ($header_last): ?>
            <?php print $header_last; ?>
            <?php endif; ?>
          </div><!-- /header-last -->


        </div><!-- /header-wrapper -->

          <?php if ($suckerfish): ?>
          <div id="suckerfishmenu" class="clearfix clear-block">
            <?php print $suckerfish; ?>
          </div>
          <?php endif; ?>
          
        
        <div id="header-bottom" class="clearfix">
        <?php if ($primary_links): ?>
        <div id="primary-links">
          <?php print menu_tree($menu_name = 'primary-links'); ?>
        </div><!-- /primary_menu -->
        <?php endif; ?>
        </div><!-- /header-bottom -->


        </div><!-- /header -->


      
      <div id="breadcrumb-nav" class="clearfix">
        <div id="breadcrumb">
          <?php print $breadcrumb; ?>
        </div>
        <?php if ($mission): ?>
        <div id="mission"> 
          <?php print $mission; ?>
        </div>
        <?php endif; ?>
      </div><!-- /breadcrumb -->
      
    
      <div id="main" class="clearfix">      
      <div id="main-wrapper-all">
      <div id="main-wrapper-left">
      <div id="main-wrapper-top">
        <div id="main-wrapper" class="clearfix">
          <div id="main-wrapper-in" class="clearfix">
            <div id="main-wrapper-border" class="clearfix rounded-block">        

      
          <?php if ($sidebar_first || $sidebar_second): ?>
          <div id="sidebar-first">
            <?php if ($sidebar_second): ?>
              <div id="sidebar-second">
              <?php print $sidebar_second; ?>
              </div>
            <?php endif; ?>
            <?php print $sidebar_first; ?>
            
          </div><!-- /sidebar-first -->
          <?php endif; ?>

          
          <div id="content-wrapper">
            <?php if ($help): ?>
              <?php print $help; ?>
            <?php endif; ?>
            <?php if ($messages): ?>
              <?php print $messages; ?>
            <?php endif; ?>

           
            
            <div id="content">
              <?php if ($tabs): ?>
              <div id="content-tabs">
                <?php print $tabs; ?>
              </div>
              <?php endif; ?>
            
              <div id="content-inner">
                <?php if ($title): ?>
                <h1 class="title"><?php print $title; ?></h1>
                <?php endif; ?>
                  <?php if ($content_top): ?>
                  <div id="content-top">
                    <?php print $content_top; ?>
                  </div><!-- /content-top -->
                  <?php endif; ?>
            
                <div id="content-content">
                  <?php print $content; ?>
                </div>
              </div><!-- /content-inner -->
            </div><!-- /content -->

              <?php if ($sidebar_last): ?>
                <div id="sidebar-last">
                  <?php print $sidebar_last; ?>
                </div><!-- /sidebar_last -->
              <?php endif; ?>

            
            <?php if ($content_bottom): ?>
            <div id="content-bottom">
              <?php print $content_bottom; ?>
            </div><!-- /content-bottom -->
            <?php endif; ?>
          </div><!-- /content-wrapper -->
          

        </div>
        </div>
        </div>
        </div>
        </div><!-- /main-wrapper-border -->
        </div><!-- /main-wrapper -->
        
        <?php if ($footer_top): ?>
        <div id="footer-topx" class="clearfix">
          <div id="back-to-top"><?php print '<a href="#page" title="' . t('Back to top') . '">' . t('Back to top') . '</a>'; ?></div>
          <div id="footer-1">
            
            <?php if ($feed_icons)
                    print $feed_icons; 
                  else 
                    print theme('feed_icon', url('rss.xml'), t('Syndicate')); ?>
          </div>
          <div id="footer-2">
            <?php if ($footer_top): ?>
            <?php print $footer_top; ?>
            <?php endif; ?>
          </div>          
          
        </div>
        <?php  endif; ?>
        
        <?php if ($postscript_first || $postscript_middle || $postscript_last): ?>
          <div id="postscript-wrapper" class="<?php print $postscripts; ?> clearfix">
            <?php if ($postscript_first): ?>
            <div id="postscript-first" class="column">
              <?php print $postscript_first; ?>
            </div><!-- /postscript-first -->
            <?php endif; ?>
            <?php if ($postscript_middle): ?>
            <div id="postscript-middle" class="column">
              <?php print $postscript_middle; ?>
            </div><!-- /postscript-middle -->
            <?php endif; ?>

            <?php if ($postscript_last): ?>
            <div id="postscript-last" class="column">
              <?php print $postscript_last; ?>
            </div><!-- /postscript-last -->
            <?php endif; ?>
          </div><!-- /postscript-wrapper -->
          <?php endif; ?>
          
          

          <?php if ($footer || $footer_message): ?>
          <div id="footer" class="clearfix">            
            <?php if ($footer): ?>
            <?php print $footer; ?>
            <?php endif; ?>
            <?php if ($footer_message): ?>
            <?php print $footer_message; ?>
            <?php endif; ?>
          </div><!-- /footer -->
          <?php endif; ?>
        
        
      </div><!-- /main -->
    <?php print $closure; ?>
    </div><!-- /page -->
   </div><!-- /page-border -->
    
  </body>
</html>
