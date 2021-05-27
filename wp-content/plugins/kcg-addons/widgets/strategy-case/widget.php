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
                'default' => 3,
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );

        $args = [];
        $order_by = !empty($settings['_kcg_strategy_case_order_by']) ? $settings['_kcg_strategy_case_order_by'] : 'date';
        $order = !empty($settings['_kcg_strategy_case_order']) ? $settings['_kcg_strategy_case_order'] : 'asc';
        $per_page = !empty($settings['_kcg_strategy_case_per_page']) ? $settings['_kcg_strategy_case_per_page'] : 3;
        $strategy_case_cats = !empty($settings['_kcg_strategy_case_cats']) ? $settings['_kcg_strategy_case_cats'] : '';
        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
        $args = array(
            'post_type'   => 'post',
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'orderby'             => $order_by,
            'order'               => $order,
            'posts_per_page'      => $per_page,
            'paged' => $paged,
        );

        $strategy_case_query = new \WP_Query( $args );
        $this->__open_wrap();
        ?>
        <div class="works-content w-borderT" data-scroll-section>
            <div class="inner">
                <div class="col col-12">
                    <div class="caption" data-scroll data-scroll-speed="1">
                    <?php if (!empty($settings['_kcg_strategy_case_title'])): ?>
                        <span><?php echo $this->parse_text_editor($settings['_kcg_strategy_case_title']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['_kcg_strategy_case_btn'])): 
                            $case_link = !empty($item['_kcg_strategy_case_link']) ? $item['_kcg_strategy_case_link']['url'] : '';
                            ?>
                        <a href="<?php echo esc_url($case_link); ?>" class="button b-black b-icon">
                            <span class="label"><?php echo $this->parse_text_editor($settings['_kcg_strategy_case_btn']); ?></span>
                            <div class="wrapper">
                                <div class="background"></div>
                                <div class="arrow svg a-right"></div>
                            </div>
                        </a>
                        <?php endif; ?>
                    </div>
                    <div class="works-list">
                    <?php $i = 0; if ( $strategy_case_query->have_posts() ): 
                            while ( $strategy_case_query->have_posts() ) : $strategy_case_query->the_post();
                            $_link = get_permalink();
                            $target = kcg_get_meta_value( get_the_id(), '_kcg_target' );
                        ?>
                        <a href="<?php echo esc_url($_link); ?>" target="<?php echo esc_attr($target); ?>" class="item" data-scroll data-scroll-speed="0">
                            <div class="wrapper">
                                <figure class="image" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'blog_front')); ?>);"></figure>
                                <div class="infos">
                                    <div class="name"><?php the_title(); ?></div>
                                </div>
                            </div>
                        </a>
                        <?php $i++; endwhile; wp_reset_postdata(); endif;?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
