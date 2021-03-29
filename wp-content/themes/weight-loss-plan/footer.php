<footer class="view-footer">
            <div class="view-content">
				<?php wp_nav_menu( [
	'theme_location'  => 'secondary_navigation',
	'menu'            => '', 
	'container'       => false, 
	'container_class' => '', 
	'container_id'    => '',
	'menu_class'      => 'view-footer-links', 
	'menu_id'         => false,
	'link_class'       => 'view-footer-link',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => '',
] );?>
                <div class="view-footer-logos">
				<?php 
$rows = get_field('footer_logos', 'options');
if( $rows ) {
    foreach( $rows as $row ) {
        $link = $row['link'];
        $logo = $row['logo'];
        echo '<a href="'.$link.'" target="_blank">';
            echo '<img src="'.$logo.'">';
        echo '</a>';
    }
}?>
                </div>
                <div class="view-footer-copyright">
                    <p><?php echo get_field('copyright','options');?></p>
                </div>
            </div>
        </footer>
    </div>
<script type="text/javascript">
	// window.dataLayer = window.dataLayer || [];
	// function gtag(){dataLayer.push(arguments)};

	// function gtag_report_conversion(url) {
	 // var callback = function () {
	  // if (typeof(url) != 'undefined') {
	    // window.open(url);
	  // }
	  // };
	  // gtag('event', 'conversion', {
	      // 'send_to': 'AW-993388029/jbzWCJmL4aQBEP3L19kD',
	      // 'event_callback': callback
	  // });

	  // return false;
	// }

    jQuery(document).ready(function($) {
            //var ranked_providers = new cookieList("ranked_providers");

            $('#clear').click(function(){
              var cookies = $.cookie();
              for(var cookie in cookies) {
                 $.removeCookie(cookie);
              }
            })

            $('.row_raty').each(function(){
				
                var grade = $(this).attr('data-grade'); 
                var pos = $(this).attr('data-pos'); 
                var id = $(this).attr('data-provider') //32Red

                if ($.cookie(id) == '1')
                {
                    $(this).parent().find("div.row_grade").text("Thanks!");
                    $(this).css('pointer-events','none'); 
                }
				
                $(this).raty({
                    score: grade,
                    cancelOff : '/wp-content/images/cancel-off.png',
                    cancelOn  : '/wp-content/images/cancel-on.png',
                    half      : true,
                    starHalf  : '/wp-content/images/star-half.png',
                    starOff   : '/wp-content/images/star-off.png',
                    starOn    : '/wp-content/images/star-on.png',
                    click: function(score, evt) {
						//evt.stopPropagation();
						$(this).parent().find("div.row_grade").text("Thanks!");
                        $(this).css('pointer-events','none');
                        $.cookie(id, '1');
                        //add id to cookie (id)
						
                        return false;

                        //readOnly   : true,
                        //score: grade
                        //alert('ID: ' + this.id + "\nscore: " + score + "\nevent: " + evt);
                    }
                }) 
            }) 


/*$('a').click(function(e){
    
    var link=$(this).attr("href");
    
    if(link.indexOf("/redir") >= 0){
            e.preventDefault();
            gtag_report_conversion(link);
            }
                        
                        
});*/


        });
    

		browser.cookies.onChanged.addListener(function(changeInfo) {
		  console.log('Cookie changed: ' +
		              '\n * Cookie: ' + JSON.stringify(changeInfo.cookie) +
		              '\n * Cause: ' + changeInfo.cause +
		              '\n * Removed: ' + changeInfo.removed);
		});

        </script>
<?php wp_footer();?>
</body>
</html>