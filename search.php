<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php bloginfo('name'); ?> | <?php if( is_home() ) : echo bloginfo( 'description' ); endif; ?><?php wp_title( '', true ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<?php
  /*-----------------------------------------------------------------------------------*/
  /* Start header
  /*-----------------------------------------------------------------------------------*/
  get_header();
?>

<div class="container">

  <div id="primary">
    <div id="content" role="main">

      <?php
        global $wp_query;
        $total_results = $wp_query->found_posts;
      ?>
      <h2>Search results: <?php echo $total_results ?></h2>
<?php
  /*-----------------------------------------------------------------------------------*/
  /* Start Search loop
  /*-----------------------------------------------------------------------------------*/

  if( is_search() ) { // redundant check

?>
      <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

          <article class="post">

            <h1 class="title">
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title() ?>
              </a>
            </h1>
            <div class="post-meta">
              <span class="comments-link">
                <?php the_date(); ?>
              </span>
              <?php if( comments_open() ) : ?>
                <span class="comments-link">
                  | <?php comments_popup_link( __( 'Comment', 'break' ), __( '1 Comment', 'break' ), __( '% Comments', 'break' ) ); ?>
                </span>
              <?php endif; ?>

            </div><!--/post-meta -->

            <div class="the-content">
              <?php the_excerpt(); ?>

              <?php wp_link_pages(); ?>
            </div><!-- the-content -->

            <div class="meta clearfix">
              <div class="category"><?php echo get_the_category_list(); ?></div>
              <div class="tags"><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); ?></div>
            </div><!-- Meta -->

          </article>

        <?php endwhile; ?>

        <!-- pagintation -->
        <div id="pagination" class="clearfix">
          <div class="past-page"><?php previous_posts_link( 'Newer &raquo;' ); ?></div>
          <div class="next-page"><?php next_posts_link( ' &laquo; Older' ); ?></div>
        </div><!-- pagination -->

      <?php endif; ?>


  <?php } //end is_search(); ?>

    </div><!-- #content .site-content -->
  </div><!-- #primary .content-area -->

</div><!-- / container-->

<?php
  /*-----------------------------------------------------------------------------------*/
  /* Start Footer
  /*-----------------------------------------------------------------------------------*/
  get_footer();
?>

<?php wp_footer(); ?>

</body>
</html>