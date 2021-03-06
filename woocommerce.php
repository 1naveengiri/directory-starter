<?php get_header(); ?>

<?php do_action('dt_woo_before_main_content'); ?>

<?php
$dt_enable_woo_sidebar = esc_attr(get_theme_mod('dt_enable_woo_sidebar', DT_ENABLE_WOO_SIDEBAR)) == '1' && is_active_sidebar( 'sidebar-wc' ) ? true : false;
$dt_blog_sidebar_position = esc_attr(get_theme_mod('dt_blog_sidebar_position', DT_BLOG_SIDEBAR_POSITION));

if ($dt_enable_woo_sidebar) {
  $content_class = 'col-lg-8 col-md-9';
} else {
  $content_class = 'col-lg-12';
}
?>
<section class="<?php if(get_theme_mod('dt_container_full', DT_CONTAINER_FULL)){echo 'container-fluid';}else{ echo "container";}?> woo-container py-4">
  <div class="row">
    <?php if ($dt_enable_woo_sidebar && $dt_blog_sidebar_position == 'left') { ?>
      <div class="col-lg-4 col-md-3">
        <div class="sidebar woo-sidebar blog-sidebar page-sidebar">
          <?php dynamic_sidebar( 'sidebar-wc' ); ?>
        </div>
      </div>
    <?php } ?>
    <div class="<?php echo $content_class; ?>">
      <div class="content-single">
        <?php if (!have_posts()) : ?>
          <div class="alert-error">
            <p><?php _e('Sorry, no results were found.', 'directory-starter'); ?></p>
          </div>
          <?php get_search_form(); ?>
        <?php endif; ?>
        <article class="hentry">
          <?php
          woocommerce_content();
          ?>
        </article>
      </div>
    </div>
    <?php if ($dt_enable_woo_sidebar && $dt_blog_sidebar_position == 'right') { ?>
      <div class="col-lg-4 col-md-3">
        <div class="sidebar woo-sidebar blog-sidebar page-sidebar">
          <?php dynamic_sidebar( 'sidebar-wc' ); ?>
        </div>
      </div>
    <?php } ?>
  </div>
</section>

<?php do_action('dt_woo_after_main_content'); ?>

<?php get_footer(); ?>