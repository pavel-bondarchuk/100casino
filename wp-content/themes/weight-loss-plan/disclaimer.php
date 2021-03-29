<?php /*Template Name: disclaimer*/ get_header();?>
     <div class="view-wrapper article">
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
           <section class="article-content wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="1s">
                <div class="view-content">
                    <div class="article-wrapper">
                        <article class="article-item">
                            <div class="view-text">
                               <?php the_content();?>
                            </div>
                        </article>
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
        </main>
<?php get_footer(); ?>