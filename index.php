<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JM-theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
<div id="content">
    <article class="post">
        <h2 class="entry-title">Test Post 1</h2>
        <div class="entry-content">
            <p>This is a static test post for verifying the infinite scroll functionality.</p>
        </div>
    </article>
    <article class="post">
        <h2 class="entry-title">Test Post 2</h2>
        <div class="entry-content">
            <p>This is another static test post for verifying the infinite scroll functionality.</p>
        </div>
    </article>
</div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
