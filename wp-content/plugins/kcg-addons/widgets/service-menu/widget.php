<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Service_Menu extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-service-menu';
    }

    public function get_title(){
        return esc_html__( 'Service Menu', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-menu-bar';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'service menu', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_service_menu_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_service_menu_section',
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
            '_kcg_service_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_service_menu_content',
            [
                'label' => 'Content',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( '<strong>We solve complex business<br>challenges with strategy and<br>marketing, delivering products.</strong>', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter content (or) Leave it empty to hide.', 'kcg' ),
            ]
        );

         $repeater = new Repeater();
         $repeater->add_control(
            '_kcg_service_menu_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Strategy', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter title (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         
          $this->add_control(
            '_kcg_service_menu_items',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        '_kcg_service_menu_title' => __('Strategy' ,'kcg')
                    ],
                    [
                        '_kcg_service_menu_title' => __('Product' ,'kcg')
                    ],
                    [
                        '_kcg_service_menu_title' => __('Marketing' ,'kcg')
                    ],
                ],
                'title_field' => '{{ _kcg_service_menu_title }}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        
        $this->__open_wrap();
        ?>
        <div class="webdoor w-services" data-scroll-section>
            <div class="submenu">
                 <?php 
                $i = 1;
                    $service_menu_id = kcg_options('service_menu_id', '');
                    foreach ($service_menu_id as $menu_item):
                        $active_class =  ($i == 1) ? 'active' : '';
                ?>
                    <a href="<?php echo esc_url($menu_item['url']); ?>" class="item <?php echo esc_attr($active_class); ?>" data-scroll data-scroll-speed="1"><span><?php echo esc_html($menu_item['title']); ?></span></a>
                <?php $i++; endforeach; ?>
            </div>
            <div class="inner">
                <div class="col col-1"></div>
                <div class="col col-10">
                    <?php if (!empty($settings['_kcg_service_menu_content'])): ?>
                    <h1 class="title t-medium t-center" data-scroll data-scroll-speed="1"><?php echo $this->parse_text_editor($settings['_kcg_service_menu_content']); ?></h1>
                    <?php endif; ?>
                </div>
                <div class="col col-1"></div>
            </div>
            <div class="inner">
                <div class="col col-1"></div>
                <div class="col col-10">
                    <div class="services-icons">
                        <?php 
                            if ( empty( $settings['_kcg_service_menu_items'] ) ) {
                                    return;
                                }
                            $i = 1;
                            foreach ( $settings['_kcg_service_menu_items'] as $item ) :
                            $icon = 'stg';
                            if($i == 1){
                                $icon = 'stg';
                            }elseif($i == 2){
                                $icon = 'pdt';
                            }elseif($i == 3){
                                $icon = 'mktg';
                            }else{
                                $icon = 'stg';
                            } 
                        ?>
                            <?php if (!empty($item['_kcg_service_menu_title'])): ?>
                                <div class="item">
                                    <div class="ico svg i-<?php echo esc_attr($icon); ?>"></div>
                                    <span><?php echo $this->parse_text_editor($item['_kcg_service_menu_title']); ?></span>
                                </div>
                            <?php endif; ?>
                        <?php $i++; endforeach; ?>
                    </div>
                </div>
                <div class="col col-1"></div>
            </div>
        </div>
        <div class="services-bullets">
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
