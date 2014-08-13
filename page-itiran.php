<?php
/*
Template Name:PAGE itiran
*/
?>
<?php get_header(); ?>

<div class="post"> 
  <!--ループ開始-->
  <h2>
    <?php the_title(); ?>
  </h2>
  <div class="kizi">
    <div class="sumbox02">
      <div id="topnews">
        <div>
          <?php
query_posts($query_string);
query_posts('cat=0&paged='.$paged);//表示したいカテゴリIDを列挙
?>
          <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
          <dl class="clearfix">
            <dt> <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
              <?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
              <?php
$title= get_the_title();
the_post_thumbnail(array( 110,110 ),
array( 'alt' =>$title, 'title' => $title)); ?>
              <?php else: // サムネイルを持っていないときの処理 ?>
              <img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="110" height="110" />
              <?php endif; ?>
              </a> </dt>
            <dd>
              <h4 class="saisin"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
                </a></h4>
              <p class="datebox">
                <?php the_time('Y/m/d') ?>
                |
                <?php the_category(', ') ?>
                <?php the_tags('', ', '); ?>
              </p>
              <p class="dami"><?php echo mb_substr( strip_tags( stinger_noshotcode( $post->post_content ) ), 0, 60 ) . ''; ?></p>
           
            </dd>
          </dl>
          <?php endwhile;
?>
          <?php else:
?>
          <p>記事はありませんでした</p>
          <?php
endif;
wp_reset_postdata();
?>
        </div>
      </div>
    </div>
  </div>
  <!--/kizi-->
  
  <div style="padding:20px 0px;">
    <?php get_template_part('ad');?>
  </div>
  
  <!--ページナビ-->
  <?php if (function_exists("pagination")) {
pagination($wp_query->max_num_pages);
} ?>
  <!--ループ終了--> 
</div>
<!-- END div.post -->
<?php get_footer(); ?>
