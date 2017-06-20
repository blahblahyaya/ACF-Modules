<?php get_header(); ?>
<div id="content" class="avalara-cpt-no-sidebar ava-products">
	<div class="col-md-8 col-md-offset-2 whitepaper-main">
<?php

$meta = get_post_meta($post->ID);

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post; ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		    <?php
		      if( have_rows('flexible_content') ):
	          while ( have_rows('flexible_content') ) : the_row();

	            // product header section: headline with tag and form
		          if ( get_row_layout() == 'product_hero' ):
								$context['row'] = get_row(true);
	              Timber::render( 'product-hero.twig', $context );
	            // product intro
	            elseif (get_row_layout() == 'product_description' ):
								$context['row'] = get_row(true);
	              Timber::render( 'product-description.twig', $context );
								// product bullets section
		            elseif (get_row_layout() == 'product_features' ):
									$context['row'] = get_row(true);
		              Timber::render( 'product-features.twig', $context );
	            // product video section
	            elseif (get_row_layout() == 'product_video' ):
								$context['row'] = get_row(true);
	              Timber::render( 'product-video.twig', $context );
								// whitepaper hero section
							elseif (get_row_layout() == 'whitepaper_hero' ):
								$context['row'] = get_row(true);
								Timber::render( 'whitepaper-hero.twig', $context );
	            endif; // get_row_layout if
	          endwhile;
	        endif;  // flexible content if
					// always render the whitepaper content body
					Timber::render( 'whitepaper-body.twig', $context );
					?>
					</body>
	  </article><!-- #post-## -->
	</div>
</div>
<?php do_action( 'fusion_after_content' ); ?>
<?php get_footer(); ?>
<?php
//Omit closing PHP tag to avoid "Headers already sent" issues.
