<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml " lang="ja" xml:lang="ja" xmlns:og="http://ogp.me/ns# ">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<?php if(is_category()): ?>
<?php elseif(is_archive()): ?>
<meta name="robots" content="noindex,follow">
<?php elseif(is_search()): ?>
<meta name="robots" content="noindex,follow">
<?php elseif(is_tag()): ?>
<meta name="robots" content="noindex,follow">
<?php endif; ?>
<title>
<?php
global $page, $paged;
if(is_front_page()):
bloginfo('name');
elseif(is_single()):
wp_title('');
elseif(is_page()):
wp_title('');
elseif(is_archive()):
wp_title('|',true,'right');
bloginfo('name');
elseif(is_search()):
wp_title('-',true,'right');
elseif(is_404()):
echo'404 - ';
bloginfo('name');
endif;
if($paged >= 2 || $page >= 2):
echo'-'.sprintf('%sページ',
max($paged,$page));
endif;
?>
</title>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/rogo.ico" />
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<!---css切り替え--->
<?php if(is_mobile()) { ?>
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-precomposed.png" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/smart.css" type="text/css" media="all" />
<?php } else { ?>
<meta name="viewport" content="width=1024, maximum-scale=1, user-scalable=yes">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
<?php } ?>
<?php wp_head(); ?>
<!--OGP開始-->
<meta property="fb:admins" content="100002322157954" />
<meta property="og:locale" content="ja_JP">
<meta property="og:type" content="blog">
<meta name="twitter:site" content="@LIFEPLUSNOTE">
<meta name="twitter:card" content="summary_large_image">
<?php
if (is_single()){// 投稿記事
     if(have_posts()): while(have_posts()): the_post();
          echo '<meta property="og:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'">';echo "\n";//抜粋から
     endwhile; endif;
     echo '<meta property="og:title" content="'; the_title(); echo '">';echo "\n";//投稿記事タイトル
     echo '<meta property="og:url" content="'; the_permalink(); echo '">';echo "\n";//投稿記事パーマリンク
} else {//投稿記事以外（ホーム、カテゴリーなど）
     echo '<meta property="og:description" content="'; bloginfo('description'); echo '">';echo "\n";//「一般設定」で入力したブログの説明文
     echo '<meta property="og:title" content="'; bloginfo('name'); echo '">';echo "\n";//「一般設定」で入力したブログのタイトル
     echo '<meta property="og:url" content="'; bloginfo('url'); echo '">';echo "\n";//「一般設定」で入力したブログのURL
}
?>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<?php
$str = $post->post_content;
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿記事に画像があるか調べる
if (is_single() or is_page()){//投稿記事か固定ページの場合
if (has_post_thumbnail()){//アイキャッチがある場合
     $image_id = get_post_thumbnail_id();
     $image = wp_get_attachment_image_src( $image_id, 'full');
     echo '<meta property="og:image" content="'.$image[0].'">';echo "\n";
} else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {//アイキャッチは無いが画像がある場合
     echo '<meta property="og:image" content="'.$imgurl[2].'">';echo "\n";
} else {//画像が1つも無い場合
     echo '<meta property="og:image" content="http://lifeplusnote.net/wp-content/uploads/2014/03/lifeplusnotess.jpg">';echo "\n";
}
} else {//投稿記事や固定ページ以外の場合（ホーム、カテゴリーなど）
     echo '<meta property="og:image" content="http://lifeplusnote.net/wp-content/uploads/2014/03/lifeplusnotess.jpg">';echo "\n";
}
?>
<!--OGP完了-->
</head>

<body <?php body_class(); ?>>
<?php if(is_mobile()) { ?>
<!--アコーディオン-->
<div class="pcnone">
  <div id="s-navi">
    <section class="list6">
      <dl class="acordion">
        <dt class="trigger">
          <p><span class="op"><i class="fa fa-bars"></i>&nbsp; MENU</span></p>
        </dt>
        <dd class="acordion_tree">
          <ul>
            <li> <a href="<?php echo home_url();?>" title="トップページ">TOP</a> </li>
            <?php wp_nav_menu(array('theme_location' => 'navbar'));?>
          </ul>
          <div class="clear"></div>
        </dd>
      </dl>
    </section>
  </div>
</div>
<!--/アコーディオン-->
<?php
}else{
?>
<?php
}
?>
<div id="container">
<div id="header">
  <div id="header-in">
    <div id="h-l">
      <p class="sitename"><a href="<?php echo home_url(); ?>/">
        <?php bloginfo('name'); ?>
        </a></p>
      <?php if (is_home()) { ?>
      <h1 class="descr">
        <?php bloginfo('description'); ?>
      </h1>
      <?php } else { ?>
      <p class="descr">
        <?php bloginfo('description'); ?>
      </p>
      <?php } ?>
    </div>
    <!-- /#h-l --> 
  </div>
  <!-- /#header-in --> 
</div>
<!-- /#header -->
<div id="gazou">
  <div id="gazou-in">
    <?php if (is_home()) { ?>
    <?php //カスタムヘッダー画像// ?>
    <?php if(get_header_image()): ?>
    <p id="headimg"><img src="<?php header_image(); ?>" alt="*" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" /></p>
    <?php endif; ?>
    <?php } else { ?>
    <?php //カスタムヘッダー画像// ?>
    <?php if(get_header_image()): ?>
    <p id="headimg"><img src="<?php header_image(); ?>" alt="*" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" /></p>
    <?php endif; ?>
    <?php } ?>
  </div>
  <!-- /#gazou-in --> 
</div>
<!-- /#gazou -->
<div class="clear"></div>
<?php if(is_mobile()) { ?>
<?php 
}else{
?>
<!--pcnavi-->
<div class="smanone">
  <div id="navi-in">
    <ul>
      <li> <a href="<?php echo home_url();?>" title="トップページ">TOP</a> </li>
      <?php wp_nav_menu(array('theme_location' => 'navbar'));?>
    </ul>
    <div class="clear"></div>
  </div>
</div>
<!--/pcnavi-->
<?php
}
?>
<div id="wrap">
<div id="wrap-in">
<div id="main">
