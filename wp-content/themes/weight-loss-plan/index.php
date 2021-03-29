<?php /*index*/ get_header('slots');?>
<div class="view-wrapper view-index">
  <main class="view-main">
    <header class="view-header" style="min-height: 55px;">

      <div class="view-content">
        <a class="navbar-brand" href="<?php echo home_url();?>">
          <div class="view-header-logo">
          </div>
          <img class="big_logo" src="<?php echo get_field('logo','options');?>" alt="logo">
        </a>
        <button class="hamburger-one hamburger--spring js-main-menu-toggle" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php wp_nav_menu( [
	'theme_location'  => 'primary_navigation',
	'menu'            => '', 
	'container'       => false, 
	'container_class' => '', 
	'container_id'    => '',
	'menu_class'      => 'navbar-nav', 
	'menu_id'         => false,
	'link_class'       => 'nav-item nav-link',
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
          </div>
        </nav>
      </div>

      <script type="text/javascript">
        $(document).ready(function () {
          $("a#a_subs").click(function () {
            if ($("ul.sub-links").css('display') == "block") {
              $('ul.sub-links').hide();
            } else {
              $('ul.sub-links').show();
            }
          });
        });
      </script>

    </header>

    <section class="offer">
      <div class="view-title-h1">
        <?php echo get_field('top_text_block');?>
      </div>
    </section>
    <section class="advantages wow fadeInRight" data-wow-duration="1s" data-wow-delay="1s">
      <div class="view-content">
        <span class="advantage">ALL SITES ARE:</span>
        <span class="advantage advantage-licensed" style="padding-left:45px !important;">UK LICENSED</span>
        <span class="advantage advantage-secure">SECURE & TRUSTED</span>
        <span class="advantage advantage-mobile">MOBILE FRIENDLY</span>
        <span class="advantage advantage-thumb">INDEPENDTLY REVIEWED</span>
      </div>
    </section>
    <section class="companies-wrapper">
      <div class="view-content">
        <div class="companies">
          <div class="view-text textmobile"></div>
          <style>
            .company.company_first:nth-child(odd) {
              background-color: #efefef;
            }
          </style>
          <?php
							$args = array(
								'post_type' => 'vendor',
								'posts_per_page' => 9,
								'orderby' => 'date',
								'order' => 'ASC'
							);
							$query = new WP_Query( $args );
							while ( $query->have_posts() ) {
							$query->the_post();
							echo '<div class="company company_first  collapsed info">
				<div class="company-content js-reference-to" data-url="'.get_field('ref_link',$post->ID).'">
					<div class="company-content-header">
						<div class="company-logo ribbon">';
						if(get_field('ribbon',$post->ID)){
							echo '<div class="ribbon3">'.get_field('ribbon',$post->ID).'</div>';
						}
						echo get_the_post_thumbnail( $post->ID, 'lot-site-logo' );
						echo '</div>
					</div>
                <div class="company-content-description">
                  '.get_field('description',$post->ID).'
                </div>
                <div class="company-content-score">
                  <div class="company-newscore">
                    <div class="company-score-value">Rate it! (2146)</div>
                  </div>
                  <div class="company-rate">
                    <div class="row_raty" data-grade="5.0" data-pos="1" data-provider="Stars Casino"></div>
                  </div>
                </div>
                <div class="company-content-newscore">
                  <div class="company-score">
                    <div class="company-score-points"> 9.9</div>
                    <div class="company-score-value"><a class="csvone" href="'.get_the_permalink($post->ID).'">Read
                        Review</a></div>
                  </div>
                </div>
                <div class="company-content-footer">
                  <a href="#" class="button button-green">Get bonus</a>
                  <br>
                  <a href="#">Visit Stars Casino</a>
                </div>
              </div>
              <div class="company-read-review">
                <!--<a href="https://top10onlinecasinoreviews.co.uk/redir/?prod=PokerStars_Casino&rank=1&table=CasinoTable" class="link-wave">Visit Stars Casino</a>-->
              </div>
              <div class="company-hidden-wrapper">
                <div class="company-hidden-left-link"></div>
              </div>
            </div>';
							}wp_reset_postdata();
							?>

        </div>

      </div>

      <br />

      <div class="view-content">
        <div class="companies">

          <div class="view-text textmobile"></div>

          <h2 style="font-weight:700 !important; margin:0.5rem">Top 3 Live Casinos Sites of November 2020</h2>

          <?php
							$args = array(
								'post_type' => 'live_casino',
								'posts_per_page' => 3,
								'orderby' => 'date',
								'order' => 'ASC'
							);
							$query = new WP_Query( $args );
							while ( $query->have_posts() ) {
							$query->the_post();
							echo '<div class="company company_first  collapsed info">
				<div class="company-content js-reference-to" data-url="'.get_field('ref_link',$post->ID).'">
					<div class="company-content-header">
						<div class="company-logo ribbon">';
						if(get_field('ribbon',$post->ID)){
							echo '<div class="ribbon3">'.get_field('ribbon',$post->ID).'</div>';
						}
						echo get_the_post_thumbnail( $post->ID, 'lot-site-logo' );
						echo '</div>
					</div>
                <div class="company-content-description">
                  '.get_field('description',$post->ID).'
                </div>
                <div class="company-content-score">
                  <div class="company-newscore">
                    <div class="company-score-value">Rate it! (2146)</div>
                  </div>
                  <div class="company-rate">
                    <div class="row_raty" data-grade="5.0" data-pos="1" data-provider="Stars Casino"></div>
                  </div>
                </div>
                <div class="company-content-newscore">
                  <div class="company-score">
                    <div class="company-score-points"> 9.9</div>
                    <div class="company-score-value"><a class="csvone" href="'.get_the_permalink($post->ID).'">Read
                        Review</a></div>
                  </div>
                </div>
                <div class="company-content-footer">
                  <a href="#" class="button button-green">Get bonus</a>
                  <br>
                  <a href="#">Visit Stars Casino</a>
                </div>
              </div>
              <div class="company-read-review">
                <!--<a href="https://top10onlinecasinoreviews.co.uk/redir/?prod=PokerStars_Casino&rank=1&table=CasinoTable" class="link-wave">Visit Stars Casino</a>-->
              </div>
              <div class="company-hidden-wrapper">
                <div class="company-hidden-left-link"></div>
              </div>
            </div>';
							}wp_reset_postdata();
							?>
        </div>

      </div>
    </section>
    <section class="view-index-content">
      <div class="view-content">
        <div class="view-text">
          <br>
          <?php echo get_field('bottom_text_block');?>
        </div>
      </div>
    </section>

    <section class="view-index-content">
      <div class="view-content">
        <?php echo get_field('advertising_disclosure');?>
      </div>
    </section>
  </main>
  <?php get_footer('slots');?>