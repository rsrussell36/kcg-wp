<?php 
$bordercolor = kcg_get_meta_value( get_the_id(), '_kcg_bordercolor' );
$current_border = !empty($bordercolor) ? $bordercolor : 'orange';
$writer = kcg_get_meta_value( get_the_id(), '_kcg_writer_name' );
$publish = kcg_get_meta_value( get_the_id(), '_kcg_publish' );
$url = get_permalink();
?>
<div class="webdoor w-journal-inner" data-color="<?php echo esc_attr($current_border); ?>">
    <div class="inner">
        <div class="col col-1">
            <a href="#" onclick="window.history.back();" class="button b-icon b-white">
                <div class="wrapper">
                    <div class="background"></div>
                    <div class="arrow svg a-left"></div>
                </div>
            </a>
        </div>
        <div class="col col-7">
            <h1 class="title t-medium t-white"><strong><?php the_title(); ?></strong></h1>
            <?php if( !empty($writer) ) : ?>
                <div class="paragraph p-white p-bigger"><?php echo esc_html__('Written by ' . $writer, 'kcg'); ?> </div>
            <?php endif; ?>
        </div>
        <div class="col col-4"></div>
    </div>
    <div class="inner">
        <div class="col col-1"></div>
        <div class="col col-10">
            <div class="image-journal-inner">
            <?php 
                if ( has_post_thumbnail() ) : 
                        the_post_thumbnail('blog_single', []); 
                endif; 
            ?>
            </div>
        </div>
        <div class="col col-1"></div>
    </div>
</div>
<div class="journal-content">
    <div class="inner">
        <div class="col col-1"></div>
        <div class="col col-2">
        <?php if( !empty($publish) ) : ?>
            <div class="details">
                <span><?php echo esc_html__( 'Published', 'kcg' ) ?></span>
                <br><?php echo $publish; ?>
            </div>
            <?php endif; ?>
            <?php if( !empty($writer) ) : ?>
                <div class="details"><?php echo esc_html__('<span>Written by </span> <br>' . $writer, 'kcg'); ?> </div>
            <?php endif; ?>
            <div class="details">
                <span><?php echo esc_html__( 'Share', 'kcg' ) ?></span>
                <br>
                <a href="<?php echo 'https://twitter.com/home?status='. esc_url( $url ); ?>" target="_blank">Twitter</a>
                <br>
                <a href="<?php echo 'https://www.facebook.com/sharer/sharer.php?u='. esc_url( $url ); ?>" target="_blank" >Facebook</a>
                <br>
                <a href="<?php echo 'https://pinterest.com/pin/create/button/?url='. esc_url( $url ); ?>" target="_blank">Pinterest</a>
                <br>
            </div>
        </div>
        <div class="col col-1"></div>
        <div class="col col-6">
            <?php the_content();  ?>
            <div class="journal-ended">
                <?php esc_html_e( '<span>CATEGORIES</span>', 'kcg' ); ?></span><?php the_category( '•' ); ?>
                <?php the_tags( '<div class="details">'. esc_html__( '<span>Tags</span> ', 'kcg' ), ', ', '</div>' ); ?>
            </div>
        </div>
        <div class="col col-1"></div>
    </div>
</div>
<?php 
$category = get_the_category();

if( !empty( $category ) ) :

    foreach ( $category as $key => $cat ) :
        $slug[] = $cat->slug;
    endforeach;

    $slug_string = implode( ', ', $slug );

endif;
$id = get_the_ID();
$args = array(		
    'post_type' => 'post',		
    'order' => 'asc',
    'posts_per_page' => 3,
    'post__not_in' => array( $id ),
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
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $slug
        ),
    )
);

$q = new WP_Query( $args );
if ( $q->have_posts() ) :
?>

<div class="journal-content jc-border">
    <div class="inner">
        <div class="col col-12">
            <div class="caption">
                <span><?php echo esc_html__( 'Related Posts', 'kcg' ) ?></span>
                <a href="#" class="button b-black b-icon">
                    <span class="label"><?php echo esc_html__( 'SEE ALL', 'kcg' ) ?></span>
                    <div class="wrapper">
                        <div class="background"></div>
                        <div class="arrow svg a-right"></div>
                    </div>
                </a>
            </div>
            <div class="journal-list">
            <?php $i = 0; 
                while ( $journal_query->have_posts() ) : $journal_query->the_post();
                $_link = get_permalink();
                $target = kcg_get_meta_value( get_the_id(), '_kcg_target' );
                $bordercolor = kcg_get_meta_value( get_the_id(), '_kcg_bordercolor' );
                $current_border = !empty($bordercolor) ? $bordercolor : 'orange';
            ?>
               <a href="<?php echo esc_url($_link); ?>" target="<?php echo esc_attr($target); ?>" class="item" data-color="<?php echo esc_attr($current_border); ?>">
                                
               <?php 
                    if ( has_post_thumbnail() ) : 
                            the_post_thumbnail('blog_front', []); 
                    endif; 
                ?>
                    <div class="j-title"><?php the_title(); ?></div>
                </a>
                <?php $i++; endwhile; wp_reset_postdata();?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>