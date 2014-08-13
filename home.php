<?php get_header(); ?>

<div class="post kizi smart"> 

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <!--ループ開始-->
<?php if(is_mobile()) { ?>

   <dl class="clearfix">
            <dt> <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
              <?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
              <?php echo get_the_post_thumbnail($post->ID, 'thumb110'); ?>
              <?php else: // サムネイルを持っていないときの処理 ?>
              <img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="110px" />
              <?php endif; ?>
              </a> </dt>
            <dd>
              <h3 class="saisin-top"> <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
                </a></h3>
<div class="blog_info contentsbox">
        <p><i class="fa fa-calendar"></i> 
          <?php the_time('Y/m/d') ?>
                 </p>
      </div>
            
            
            </dd>

          </dl>

<?php } else { //ここからPC
?>

<div class="entry">
    <div class="sumbox"> <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
      <?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
      <?php
$title= get_the_title();
the_post_thumbnail(array( 150,150 ),
array( 'alt' =>$title, 'title' => $title)); ?>
      <?php else: // サムネイルを持っていないときの処理 ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="150" height="150" />
      <?php endif; ?>
      </a> </div>
    <!-- /.sumbox -->
    
    <div class="entry-content">
      <h3 class="entry-title-ac"> <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
        </a></h3>
      <div class="blog_info contentsbox">
        <p><i class="fa fa-calendar"></i>&nbsp;
          <?php the_time('Y/m/d') ?>  <?php if ($mtime = get_mtime('Y/m/d')) echo ' <i class="fa fa-repeat"></i>&nbsp; ' , $mtime; ?>&nbsp;<i class="fa fa-tags"></i>&nbsp;
          <?php the_category(', ') ?>
          <?php the_tags('', ', '); ?>
                  </p>
      </div>
<?php the_excerpt(); ?>
    </div>
    <!-- .entry-content -->
    
    <div class="clear"></div>
  </div>
  <!--/entry-->

<?php } ?> 
  <?php endwhile; else: ?>
  <p>記事がありません</p>
  <?php endif; ?>
  
  <!--ページナビ-->
  
  <?php if (function_exists("pagination")) {
pagination($wp_query->max_num_pages);
} ?>
  <!--ループ終了--> 
</div>
<!-- END div.post -->
<?php get_footer(); ?>