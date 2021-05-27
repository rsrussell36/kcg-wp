<?php
/**
 * The template for displaying all single portfolios
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kcg
 */

get_header();
$kcg_portfolio_thumb = kcg_get_meta_value( get_the_id(), '_kcg_portfolio_image' );
$kcg_images_gallery = htmlspecialchars_decode( $kcg_portfolio_thumb );
$thumb_image = json_decode( $kcg_images_gallery,true );
$client_name = kcg_get_meta_value( get_the_id(), '_kcg_client_name' );
$scope = kcg_get_meta_value( get_the_id(), '_kcg_scope' );
$year = kcg_get_meta_value( get_the_id(), '_kcg_year' );
$gallery = json_decode(kcg_get_meta_value( get_the_id(), '_kcg_portfolio_gallery' ));
?>
<div class="main-content pages" id="pages">
	<div class="webdoor w-work" data-scroll-section>
		<div class="inner">
			<div class="col col-1">
				<a href="#" onclick="window.history.back();" class="button b-black b-icon">
					<div class="wrapper">
						<div class="background"></div>
						<div class="arrow svg a-left"></div>
					</div>
				</a>
			</div>
			<div class="col col-10">
				<h1 class="title"><strong><?php the_title(); ?></strong></h1>
			</div>
			<div class="col col-1"></div>
		</div>
	</div>
	<div class="works-content no-padding" data-scroll-section>
		<figure class="image" style="background-image: url(<?php echo esc_url($thumb_image[0]['full']); ?>);"></figure>
	</div>
	<div class="works-content" data-scroll-section>
		<div class="inner">
			<div class="col col-1"></div>
			<div class="col col-4">
				<div class="details" data-scroll data-scroll-speed="1">
					<span><?php echo esc_html__('YEAR', 'kcg'); ?></span>
					<br><?php echo esc_html($year); ?>
				</div>
				<div class="details" data-scroll data-scroll-speed="1">
					<span><?php echo esc_html__('CLIENT', 'kcg'); ?></span>
					<br><?php echo esc_html($client_name); ?>
				</div>
				<div class="details" data-scroll data-scroll-speed="1">
					<span><?php echo esc_html__('SCOPE', 'kcg'); ?></span>
					<br><?php echo esc_html($scope); ?>
				</div>
			</div>
			<div class="col col-1"></div>
			<div class="col col-4">
				<?php the_content(); ?>
			</div>
			<div class="col col-1"></div>
		</div>
	</div>
	<div class="works-content" data-scroll-section>
		<div class="inner">
			<div class="col col-1"></div>
			<div class="col col-10">
				<?php if( !empty( $gallery ) ) : ?>
					<?php foreach( $gallery as $src ) :  ?>

				<div class="work-image">
					<img src="<?php echo esc_url($src->full); ?>" alt="image-<?php echo esc_attr($src->itemId); ?>"/>
				</div>
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<div class="col col-1"></div>
		</div>
	</div>

	<div class="works-content w-borderT" data-scroll-section>
		<div class="inner">
			<div class="col col-12">
				<div class="caption" data-scroll data-scroll-speed="1">
					<span>Related Portfolio</span>
					<a href="" class="button b-black b-icon">
						<span class="label">SEE ALL</span>
						<div class="wrapper">
							<div class="background"></div>
							<div class="arrow svg a-right"></div>
						</div>
					</a>
				</div>
				<div class="works-list">
					<?php 
					$category = get_the_terms( get_the_id(), 'kcg_categories' );

					if( !empty( $category ) ) :
					
						foreach ( $category as $key => $cat ) :
							$slug[] = $cat->slug;
						endforeach;
					
						$slug_string = implode( ', ', $slug );
					
					endif;
					$args = array(		
						'post_type' => 'kcg_portfolio',		
						'order' => 'asc',
						'posts_per_page' => 3,
						'ignore_sticky_posts' => 1,
						'post_status' => 'publish',
						'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array( 'post-format-quote', 'post-format-link' ),
								'operator' => 'NOT IN'
							),
							array(
								'taxonomy' => 'kcg_categories',
								'field' => 'slug',
								'terms' => $slug
							),
						)
					);
					$portfolio_related = new \WP_Query( $args );
					?>
					<?php $i = 0; if ( $portfolio_related->have_posts() ): 
                        while ( $portfolio_related->have_posts() ) : $portfolio_related->the_post();
                        $_link = get_permalink();
                        $target = kcg_get_meta_value( get_the_id(), '_kcg_target' );
                        $kcg_portfolio_thumb = kcg_get_meta_value( get_the_id(), '_kcg_portfolio_image' );
                        $kcg_images_gallery = htmlspecialchars_decode( $kcg_portfolio_thumb );
                        $thumb_image = json_decode( $kcg_images_gallery,true );
                        ?>
                        <a href="<?php echo esc_url($_link); ?>" target="<?php echo esc_attr($target); ?>" class="item" data-scroll data-scroll-speed="0">
                            <div class="wrapper">
                            <?php if(!empty($kcg_portfolio_thumb)): ?>
                                <figure class="image" style="background-image:url(<?php echo esc_url($thumb_image[0]['full']); ?>);"></figure>
                                <?php endif; ?>
                                <div class="infos">
                                    <div class="name"><?php the_title(); ?></div>
                                    <div class="type"><?php 
                                        $kcg_cats = kcg_get_the_term_list( get_the_ID() , 'kcg_categories','',', ' );
                                        $kcg_cats = !empty( $kcg_cats ) ? strip_tags( $kcg_cats ) : '';
                                        echo $kcg_cats;
                                    ?></div>
                                </div>
                            </div>
                        </a>
                        <?php $i++; endwhile; wp_reset_postdata(); endif;?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

get_footer();
