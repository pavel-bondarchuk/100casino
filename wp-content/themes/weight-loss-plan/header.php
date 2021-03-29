<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<style>.async-hide { opacity: 0 !important} </style>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:400,700');
	.table-sites-sticker{color:#ffffff;font-size:13px;width:120px;height:25px;line-height:18px;padding-left:5px;position:absolute;left:0;top:0;z-index:3;}
	.table-sites-sticker{left:10px;top:5px;}
	.moretext span {display: none;}
	.links,.links1  {display: inline !important; text-decoration: underline; color: #000;}  
	ul.list{list-style-type: none;}
    </style>
<script type="text/javascript">
jQuery(document).ready(function($) {
  var nInitialCount = 142; //Intial characters to display
  var moretext = "More";
  var lesstext = "Less";
  
  var moretext1 = "Show more reviews";
  var lesstext1 = "Show less reviews";

   $('.longtext1').each(function() {
    var paraText = $(this).html();
    if (paraText.length > 0) {
	  var sText = paraText.substr(0, 0);
      var eText = paraText.substr(0, paraText.length - 0);
      var newHtml = sText + '<span class="moretext"><span>' + eText + '</span><a href="" class="links1">' + moretext1 + '</a></span>';
      $(this).html(newHtml);
    }
  });  
    $(".links1").on('click', function(e) {
  	var lnkHTML = $(this).html();
    if (lnkHTML == lesstext1) {
      $(this).html(moretext1);
    } else {
      $(this).html(lesstext1);
    }
    $(this).prev().toggle();
    e.preventDefault();
  });
});
</script>
</head>
<body <?php body_class(); ?> style="background: fixed url('<?php echo get_theme_file_uri();?>/assets/images/bg.jpg') 0 0 no-repeat;background-size:cover;">