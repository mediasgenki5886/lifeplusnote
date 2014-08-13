<?php if(is_mobile()) { ?>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(4) ) : else : ?>
<?php endif; ?>
<?php 
}else{
?>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(3) ) : else : ?>
<?php endif; ?>
<?php
}
?>
