<?php /*Template Name: articles*/ get_header();?>
     <div class="view-wrapper articles">
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
                    <h1 class="blue"><?php the_title();?></h1>
                </div>
            </section>
           <section class="articles-content wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="1s">
        <div class="view-content">
                     <p>Read our articles below to get tons of knowledge about online Casino and boost your Casino game!</p>
                <div class="articles-wrapper">
                        <div class="articles-items">
							<?php
							$args = array(
								'posts_per_page' => 5,
								'orderby' => 'date',
								'order' => 'ASC'
							);
							$query = new WP_Query( $args );
							while ( $query->have_posts() ) {
							$query->the_post();
							echo '<article class="articles-item">';
								echo '<div class="articles-item-logo"><a href="'.get_the_permalink($post->ID).'">'.get_the_post_thumbnail( $post->ID, 'articles-item-logo' ).'</a></div>';
								echo '<div class="articles-item-content"><h3 class="blue"><a class="blue" href="'.get_the_permalink($post->ID).'">'.get_the_title().'</a></h3>
                                    <div class="view-text">
                                          <p>'.get_the_excerpt().'<a class="excerpt_length" href="'.get_the_permalink($post->ID).'">&#8230;</a></p>
                                    </div>
                                    <a style="text-decoration: underline;" href="'.get_the_permalink($post->ID).'">Read More</a>
                                </div>';
							echo '</article>';
							}
							?>
                            
                                                       <div class="articles-more">
                                                           </div>
                        </div>
                        <aside class="view-sidebar">
						<?php dynamic_sidebar( 'sidebar' ); ?>
                        </aside>
                    </div>
                </div>
            </section>
           <section class="seo">
                <div class="view-content">
                    <?php echo get_field('advertising_disclosure');?>
				</div>
            </section>
<?php get_footer(); ?>