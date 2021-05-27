<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Strategy_Case extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-strategy-case';
    }

    public function get_title(){
        return esc_html__( 'Strategy Case', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-document-file';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'strategy case', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_strategy_case_preset_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_strategy_case_section',
            [
                'label' => esc_html__( 'Design Format', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Select',
                ],
                'default' => 'default',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            '_kcg_strategy_case_content_section',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_strategy_case_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Related Case', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter title (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_strategy_case_btn',
            [
                'label' => 'Button Text',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'See All', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter button text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_strategy_case_link',
            [
                'label' => __( 'Link', 'kcg' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
                'placeholder' => __( 'https://your-link.com', 'kcg' ),
                'condition' => [
                    '_kcg_strategy_case_btn!' => ''
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_kcg_strategy_case_query_section',
            [
                'label' => __( 'Query', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_strategy_case_order_by',
            [
                'label' => __('Order By', 'kcg'),
                'type' => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'modified' => __('Modified', 'kcg'),
                    'date' => __('Date', 'kcg'),
                    'rand' => __('Rand', 'kcg'),
                    'ID' => __('ID', 'kcg'),
                    'title' => __('Title', 'kcg'),
                    'author' => __('Author', 'kcg'),
                    'name' => __('Name', 'kcg'),
                    'parent' => __('Parent', 'kcg'),
                    'menu_order' => __('Menu Order', 'kcg'),
                ],
                'separator' => 'before',
            ]
        );
         $this->add_control(
            '_kcg_strategy_case_order',
            [
                'label' => __('Order', 'kcg'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ase',
                'options' => [
                    'ase' => __('Ascending Order', 'kcg'),
                    'desc' => __('Descending Order', 'kcg'),
                ],
            ]
        );
         $this->add_control(
            '_kcg_strategy_case_per_page', [
                'label' => esc_html__('Posts Per Page', 'kcg'),
                'type' => Controls_Manager::NUMBER,
                'placeholder' => esc_html__('Enter Number', 'kcg'),
                'default' => 5,
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        if(!empty($settings['_kcg_strategy_case_cats'])){
            $cats = $settings['_kcg_strategy_case_cats'];
        }else{
            $cats = get_terms(array(
                'taxonomy' => 'category',
                'hide_empty' => true,
                'orderby'    => !empty($settings['_kcg_strategy_case_order_by_filter']) ? $settings['_kcg_strategy_case_order_by_filter'] : 'date',
                'order'      => !empty($settings['_kcg_strategy_case_order_filter']) ? $settings['_kcg_strategy_case_order_filter'] : 'asc',
                'number'     => !empty($settings['_kcg_strategy_case_per_page_filter']) ? $settings['_kcg_strategy_case_per_page_filter'] : 5,
            ));
        }
        $args = [];
        $order_by = !empty($settings['_kcg_strategy_case_order_by']) ? $settings['_kcg_strategy_case_order_by'] : 'date';
        $order = !empty($settings['_kcg_strategy_case_order']) ? $settings['_kcg_strategy_case_order'] : 'asc';
        $per_page = !empty($settings['_kcg_strategy_case_per_page']) ? $settings['_kcg_strategy_case_per_page'] : 5;
        $strategy_case_cats = !empty($settings['_kcg_strategy_case_cats']) ? $settings['_kcg_strategy_case_cats'] : '';
        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
        if(!empty($strategy_case_cats)){
            $args = array(
                'post_type'   => 'post',
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
                'orderby'             => $order_by,
                'order'               => $order,
                'posts_per_page'      => $per_page,
                'paged' => $paged,
                'tax_query' => array(
                    array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $strategy_case_cats,
                     )
                  )
            );
        }else{
            $args = array(
                'post_type'   => 'post',
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
                'orderby'             => $order_by,
                'order'               => $order,
                'posts_per_page'      => $per_page,
                'paged' => $paged,
            );
        }

        $strategy_case_query = new \WP_Query( $args );
        $this->__open_wrap();
        ?>
        <div class="webdoor w-strategy_case">
				<div class="inner">
					<div class="col col-1"></div>
					<div class="col col-10">
						<div class="caption c-center"><span>strategy_case</span>
						</div>
						<h1 class="title t-medium t-center"><strong>Here is where we tell stories.</strong></h1>
					</div>
					<div class="col col-1"></div>
				</div>
			</div>
			<div class="strategy_case-content jc-dark">
				<div class="inner">
					<div class="col col-12">
						<div class="strategy_case-highlights">
							<div class="info" data-color="green">
								<div class="caption c-white"><span>Highlight</span>
								</div>
								<h1 class="title t-medium t-white"><strong>How to bring teams together and manage time zones.</strong></h1>
							</div>
							<div class="image">
								<img src="assets/strategy_case/highlight.jpg" />
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php if( isset($settings['_kcg_strategy_case_filter_enable']) && 'yes' == !empty($settings['_kcg_strategy_case_filter_enable']) ) : ?>
			<div class="filter f-marginT">
				<div class="inner">
					<div class="col col-12">
						<?php if( !empty($cats) ) : ?>
                        <a href="#" class="item active strategy_case-filter" data-nonce="<?php echo wp_create_nonce( 'kcg-nonce' ); ?>" data-id="0" data-order="<?php echo esc_attr($order); ?>" data-orderby="<?php echo esc_attr($order_by); ?>" data-perpage="<?php echo esc_attr($per_page); ?>" data-type="<?php echo esc_html('all');?>"><span><?php echo esc_html__('All Categorie', 'kcg'); ?></span></a>
                        <?php
                            foreach ( $cats as $index => $cat ) :
                                if(!empty($settings['_kcg_strategy_case_cats'])):
                                $term = get_cat_name($cat);
                        ?>
                    
                            <a href="#" class="item strategy_case-filter" data-nonce="<?php echo wp_create_nonce( 'kcg-nonce' ); ?>" data-id="<?php echo esc_attr($cat); ?>" data-order="<?php echo esc_attr($order); ?>" data-orderby="<?php echo esc_attr($order_by); ?>" data-perpage="<?php echo esc_attr($per_page); ?>" data-type="<?php echo esc_html('indivisual');?>"><span><?php echo esc_html( $term ); ?></span></a>
                        <?php else: ?>
                            <a href="#" class="item strategy_case-filter" data-nonce="<?php echo wp_create_nonce( 'kcg-nonce' ); ?>" data-id="<?php echo esc_attr($cat->term_id); ?>" data-order="<?php echo esc_attr($order); ?>" data-orderby="<?php echo esc_attr($order_by); ?>" data-perpage="<?php echo esc_attr($per_page); ?>" data-type="<?php echo esc_html('indivisual');?>"><span><?php echo esc_html( $cat->name ); ?></span></a>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
					</div>
				</div>
			</div>
            <?php endif; ?>
			<div class="strategy_case-content">
				<div class="inner">
					<div class="col col-12">
						<div class="strategy_case-list">
                        <?php $i = 0; if ( $strategy_case_query->have_posts() ): 
                            while ( $strategy_case_query->have_posts() ) : $strategy_case_query->the_post();
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
							<?php $i++; endwhile; wp_reset_postdata(); endif;?>
						</div>
					</div>
				</div>
                <?php
                    if ( function_exists( 'kcg_strategy_case_loadmore' ) ) {
                        $argument = base64_encode( serialize( $args ) );
                        echo kcg_strategy_case_loadmore( $argument, $strategy_case_query->max_num_pages, $paged + 1 );
                    }
                ?>
			</div>
        <?php
        $this->__close_wrap();
    }
    
}
