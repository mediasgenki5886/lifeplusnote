<?php get_header(); ?>
<!-- ヘッダ下にスマホだけアドセンスを表示 -->
<div id="smart-under-header"><?php if (wp_is_mobile()) :?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- モバイル2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:50px"
     data-ad-client="ca-pub-2998251496776815"
     data-ad-slot="8237802124"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script><?php else: ?><?php endif; ?></div>
<div class="kuzu">
  <div id="breadcrumb">
    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"> <a href="<?php echo home_url(); ?>" itemprop="url"> <span itemprop="title">ホーム</span> </a> &gt; </div>
    <?php $postcat = get_the_category(); ?>
    <?php $catid = $postcat[0]->cat_ID; ?>
    <?php $allcats = array($catid); ?>
    <?php 
while(!$catid==0) {
    $mycat = get_category($catid);
    $catid = $mycat->parent;
    array_push($allcats, $catid);
}
array_pop($allcats);
$allcats = array_reverse($allcats);
?>
    <?php foreach($allcats as $catid): ?>
    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"> <a href="<?php echo get_category_link($catid); ?>" itemprop="url"> <span itemprop="title"><?php echo get_cat_name($catid); ?></span> </a> &gt; </div>
    <?php endforeach; ?>
  </div>
</div>
<!--/kuzu-->
<div id="dendo"> </div>
<!-- /#dendo -->
<div class="post"> 
  <!--ループ開始-->
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="kizi">
    <h1 class="entry-title">
      <?php the_title(); ?>
    </h1>
    <div class="blogbox">
      <p><span class="kdate"><i class="fa fa-calendar"></i>&nbsp; <time class="entry-date" datetime="<?php the_time('c') ;?>"> <?php the_time('Y/m/d') ;?>
        </time>&nbsp; 
  
        <?php if ($mtime = get_mtime('Y/m/d')) echo ' <i class="fa fa-repeat"></i>&nbsp; ' , $mtime; ?>
        </span>
      </p>
    </div>
    <?php the_content(); ?>
    <?php wp_link_pages(); ?>
<p class="tagst"><i class="fa fa-tags"></i>&nbsp;-<?php the_category(', ') ?><?php the_tags('', ', '); ?></p>
  </div>
  <div style="padding:20px 0px;">
    <?php get_template_part('ad');?>
  </div>
<div class="kizi02">
  <?php get_template_part('sns');?>
  </div>
<?php endwhile; else: ?>
  <p>記事がありません</p>
  <?php endif; ?>
<h4>最後まで読んでいただき、ありがとうございました。</h4>
<h4>よかったらシェアしていただけるとすごく嬉しいです。</h4>
  <div class="snsshare">
<a id="share_fb" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>"onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;">Facebookでシェア</a>
<a id="share_tw" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&via=LIFEPLUSNOTE" target="blank">Twitterでシェア</a>
<a id="share_hatena" href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php the_permalink() ?>&title=<?php echo urlencode( the_title( "" , "" , 0 ) ) ?>%20%2d%20No%2e1026" target="_blank">はてなブックマーク</a>
<a id="share_feedly" href="http://cloud.feedly.com/#subscription%2Ffeed%2Fhttp://lifeplusnote.net/feed/" target='_blank'>feedlyでフォロー</a>
<a id="share_line" href="http://line.naver.jp/R/msg/text/?LINE%E3%81%A7%E9%80%81%E3%82%8B%0D%0Ahttp%3A%2F%2Fline.naver.jp%2F">スマホからLINEで送る</a>
<a id="share_google" href="javascript:(function(){window.open('https://plusone.google.com/_/+1/confirm?hl=ja&url=<?php echo get_permalink() ?>'+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title),'_blank');})();">Google+でシェア</a>
</div>  
<!--ループ終了-->
<h4 class="kanren">おすすめ</h4>
<div class="sumbox02">
<div id="topnews">
<div>
<?php
$args = array(
'post__not_in' => array($post -> ID),
'cat'=>9,
'posts_per_page'=> 3,
'orderby' => 'rand',
);
$st_query = new WP_Query($args); ?>
<?php
if( $st_query -> have_posts() ): ?>
<?php
while ($st_query -> have_posts()) : $st_query -> the_post(); ?>

<dl><dt>
<?php if(post_custom('amazonimg')): ?>
<?php echo post_custom('amazonimg');?>
<?php else : ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="110px" />
<?php endif; ?>
</a>
</dt>
<dd>
<h4 class="saisin">
<?php echo post_custom('amazontitle');?></h4>
<p class="basui">
<?php echo mb_substr( strip_tags( stinger_noshotcode( $post->post_content ) ), 0, 50 ) . ''; ?>
</p>
<p class="motto"><a href="<?php the_permalink(); ?>">レビューを読む</a></p>
</dd></dl>

<?php endwhile;
?>
<?php else:
?>
<p>記事はありませんでした</p>
<?php
endif;
wp_reset_postdata();
?>
</div></div>
    <!--関連記事-->
    <h4 class="point"><i class="fa fa-th-list"></i>&nbsp;  関連記事</h4>
    <div class="sumbox02">
      <div id="topnews">
        <div>
          <?php
$categories = get_the_category($post->ID);
$category_ID = array();
foreach($categories as $category):
array_push( $category_ID, $category -> cat_ID);
endforeach ;
$args = array(
'post__not_in' => array($post -> ID),
'posts_per_page'=> 10,
'category__in' => $category_ID,
'orderby' => 'rand',
);
$st_query = new WP_Query($args); ?>
          <?php
if( $st_query -> have_posts() ): ?>
          <?php
while ($st_query -> have_posts()) : $st_query -> the_post(); ?>
          <dl class="clearfix">
            <dt> <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
              <?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
              <?php echo get_the_post_thumbnail($post->ID, 'thumb110'); ?>
              <?php else: // サムネイルを持っていないときの処理 ?>
              <img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="110px" />
              <?php endif; ?>
              </a> </dt>
            <dd>
              <h4 class="saisin"> <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
                </a></h4>
<?php if(is_mobile()) { ?>
<?php } else { ?>
 <?php the_excerpt(); ?>
<?php } ?>

           
            
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
  <!--/関連記事-->
  <div style="padding:20px 0px;">
    <?php get_template_part('ad');?>
  </div>
  <!--ページナビ-->
  <div class="p-navi clearfix">
<dl>
      <?php
        $prev_post = get_previous_post();
        if (!empty( $prev_post )): ?>
       <dt>PREV  </dt><dd><a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo $prev_post->post_title; ?></a></dd>
      <?php endif; ?>
      <?php
        $next_post = get_next_post();
        if (!empty( $next_post )): ?>
         <dt>NEXT  </dt><dd><a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?></a></dd>
      <?php endif; ?>
</dl>
  </div>
</div>
<!-- END div.post -->
<?php get_footer(); ?>
