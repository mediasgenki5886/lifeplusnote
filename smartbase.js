




/*-------------
ページスクロール
-----------*/



jQuery(function() {
    var pageTop = jQuery('#page-top');
    pageTop.hide();
    //スクロールが400に達したら表示
    jQuery(window).scroll(function () {
        if(jQuery(this).scrollTop() > 400) {
            pageTop.fadeIn();
        } else {
            pageTop.fadeOut();
        }
    });
    //スクロールしてトップ
        pageTop.click(function () {
        jQuery('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
        });
  });

/*---------------------------
ｱｺｰﾃﾞｨｵﾝ
------------------------------*/

jQuery(document).ready(function(){
  //acordion_treeを一旦非表示に
  jQuery(".acordion_tree").css("display","none");
  //triggerをクリックすると以下を実行
  jQuery(".trigger").click(function(){
    //もしもクリックしたtriggerの直後の.acordion_treeが非表示なら
    if(jQuery("+.acordion_tree",this).css("display")=="none"){
         //classにactiveを追加
         jQuery(this).addClass("active");
         //直後のacordion_treeをスライドダウン
         jQuery("+.acordion_tree",this).slideDown("normal");
  }else{
    //classからactiveを削除
    jQuery(this).removeClass("active");
    //クリックしたtriggerの直後の.acordion_treeが表示されていればスライドアップ
    jQuery("+.acordion_tree",this).slideUp("normal");
  }
  });
});

