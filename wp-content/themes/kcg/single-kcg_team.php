<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kcg
 */

get_header();


?>

	<main id="primary" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>
		<section id="scroll" class="page" data-scroll-container>
			<div class="webdoor w-person">
				<div class="inner">
					<div class="col col-1">
						<a href="#" onclick="window.history.back();" class="button b-black b-icon">
							<div class="wrapper">
								<div class="background"></div>
								<div class="arrow svg a-left"></div>
							</div>
						</a>
					</div>
					<?php 
		                $role = get_post_meta( get_the_ID(), '_kcg_designation_role', true );
					 ?>
					<div class="col col-4">
						<h1 class="title"><strong><?php echo esc_html(the_title()); ?></strong></h1>
						<div class="subtitle"> <?php echo esc_html($role); ?> </div>
						<br>
						<br>
						<div class="paragraph">
							 <?php the_content();?>
						</div>
					</div>
					<div class="col col-1"></div>
					<div class="col col-5">
						<div class="people p-full">
							<?php if(has_post_thumbnail( )) {  ?>
					           <?php the_post_thumbnail(); ?>
					        <?php } ?>
						</div>
					</div>
					<div class="col col-1"></div>
				</div>
			</div>
		</section>
		<?php endwhile; wp_reset_postdata(); ?>
	</main>

<?php

get_footer();
