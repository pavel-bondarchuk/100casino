<?php /*Template Name: review*/ get_header();?>
     <div class="view-wrapper reviews">
        <main class="view-main">
            <header class="view-header">
                <div class="view-content">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <a class="navbar-brand wow bounceInDown"  href="<?php echo home_url();?>">
                            <div class="view-header-logo">
                                <!--Best online Casinos
								<img src="images/best-online-casinos_logo.svg" alt="Best Online Casinos">-->
                            </div>
							<img class="big_logo" src="<?php echo get_field('logo','options');?>" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
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
            </header>
   
 <section class="offer wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".7s">
                <div class="view-content">
                    <h1 class='blue'><?php the_title();?></h1><p>Read and learn from our online casino reviews based on our team experiences.</p>
                </div>
            </section>
           <section class="reviews-content wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="1s">
                <div class="view-content">
                    <div class="reviews-wrapper">
					<?php $args = array(
								'post_type' => 'vendor',
								'posts_per_page' => 5,
								'orderby' => 'date',
								'order' => 'ASC'
							);
							$query = new WP_Query( $args );
							while ( $query->have_posts() ) {
							$query->the_post();
							echo '<article class="reviews-item">
                            <div class="reviews-item-logo">
                               <a href="'.get_field('ref_link',$post->ID).'" target="_blank">'.get_the_post_thumbnail( $post->ID, 'articles-item-logo' ).'</a>
                            </div>
                            <div class="reviews-item-content">
                                <h3><a href="'.get_field('ref_link',$post->ID).'">'.get_the_title().' Review</a>  </h3>
                                <div class="view-text">
                                  <p>'.get_the_excerpt().'</p>
                                </div>
                                <a style="text-decoration: underline;" href="'.get_the_permalink($post->ID).'">Read more</a>
                            </div>
                            <div class="reviews-item-reference">
                                <a href="'.get_field('ref_link',$post->ID).'" class="button button-violet" target="_blank">Get Bonus</a>
                                <a href="'.get_field('ref_link',$post->ID).'" class="reviews-item-reference-link" target="_blank">Visit Stars Casino</a>
                            </div>
                        </article>';
							}wp_reset_postdata();
							?>
                            <div class="longtext1">
							<?php $args = array(
								'post_type' => 'vendor',
								// 'posts_per_page' => -1,
								'offset' => 5,
								'orderby' => 'date',
								'order' => 'ASC'
							);
							$query = new WP_Query( $args );
							while ( $query->have_posts() ) {
							$query->the_post();
							echo '<article class="reviews-item">
                            <div class="reviews-item-logo">
                               <a href="'.get_field('ref_link',$post->ID).'" target="_blank">'.get_the_post_thumbnail( $post->ID, 'articles-item-logo' ).'</a>
                            </div>
                            <div class="reviews-item-content">
                                <h3><a href="'.get_field('ref_link',$post->ID).'">'.get_the_title().' Review</a>  </h3>
                                <div class="view-text">
                                  <p>'.get_the_excerpt().'</p>
                                </div>
                                <a style="text-decoration: underline;" href="'.get_the_permalink($post->ID).'">Read more</a>
                            </div>
                            <div class="reviews-item-reference">
                                <a href="'.get_field('ref_link',$post->ID).'" class="button button-violet" target="_blank">Get Bonus</a>
                                <a href="'.get_field('ref_link',$post->ID).'" class="reviews-item-reference-link" target="_blank">Visit Stars Casino</a>
                            </div>
                        </article>';
							}wp_reset_postdata();
							?>
                        	</div>
                    </div>
                </div>
           </section>
           <section class="top-sites-wrapper">
               <div class="view-content">
                    <h3 class="violet"  style="font-size:22px;">
                        Top 3 casino sites of October 2020                    </h3>
                   <div class="top-sites">
					<?php
							$args = array(
								'post_type' => 'vendor',
								'posts_per_page' => 3,
								'orderby' => 'date',
								'order' => 'DESC'
							);
							$query = new WP_Query( $args );
							while ( $query->have_posts() ) {
							$query->the_post();
							echo '<div class="top-sites-item">';
								echo '<div class="top-sites-item-logo"><a target="_blank" href="'.get_the_permalink($post->ID).'">'.get_the_post_thumbnail( $post->ID, 'top-sites-item-logo' ).'</a></div>';
								echo '<div class="top-sites-item-score-wrapper">
								<div class="top-sites-item-score"><span>9.5</span></div>
								<div class="top-sites-item-rate">
                                    <div class="row_raty" data-grade="5.0" data-pos="1" data-provider="Virgin Games" style="cursor: pointer;">
									
									<input name="score" type="hidden" value="5"></div>
                                    </div>
                                </div>';
								echo '<div class="top-sites-item-reference">
                              <a href="'.get_field('link', $post->ID).'" target="_blank" class="button button-violet">Visit site</a>
                             <!--<a href="'.get_the_permalink($post->ID).'" class="view-sidebar-reference-link">Read review</a>-->
                            </div>';
							echo '</div>';
							}wp_reset_postdata();
							?>
                                              </div>
                </div>
           </section>
            <section class="seo">
                <div class="view-content">
                    <?php echo get_field('advertising_disclosure');?>
				</div>
            </section>
        </main>
<?php get_footer(); ?>