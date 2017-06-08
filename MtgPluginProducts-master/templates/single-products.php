<?php get_header(); ?>
<div id="content" class="avalara-cpt-no-sidebar ava-products">
<?php
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render( 'product-single-content.twig', $context );
?>
</div>
<?php do_action( 'fusion_after_content' ); ?>
<?php get_footer(); ?>
<?php
//Omit closing PHP tag to avoid "Headers already sent" issues.


