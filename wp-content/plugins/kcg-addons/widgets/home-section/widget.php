<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;


class Home_Section extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-home-section';
    }

    public function get_title(){
        return esc_html__( 'Home Section', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-settings';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'text', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_home_main_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_home_section',
            [
                'label' => esc_html__( 'Design Format', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Select',
                    'style_one' => 'Style One',
                ],
                'default' => 'default',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_kcg_home_section_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_home_section_l',
            [
                'label' => 'First Text',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Enter Text here', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'condition' => [
                    '_kcg_design_home_section' => ['default', 'style_one']
                ],
                'placeholder' => __( 'Enter text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_home_section_r',
            [
                'label' => 'Second Text',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Enter Text here', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'condition' =>[
                    '_kcg_design_home_section' => ['default']
                ],
                'placeholder' => __( 'Enter text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_home_section_btn',
            [
                'label' => 'Button Text',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Get Started', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'condition' =>[
                    '_kcg_design_home_section' => ['default']
                ],
                'placeholder' => __( 'Enter button text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_home_section_link',
            [
                'label' => __( 'Link', 'kcg' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
                'placeholder' => __( 'https://your-link.com', 'kcg' ),
                'condition' =>[
                    '_kcg_home_section_btn!' => '',
                    '_kcg_design_home_section' => ['default']
                ]
            ]
        );
        $this->add_control(
            '_kcg_home_section_scroll_number',
            [
                'label' => 'Scroll Number',
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'show_label' => true,
                'default' => '',
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter slider scroll number', 'kcg' ),
            ]
        );
        $this->end_controls_section();
         $this->start_controls_section(
            '_kcg_home_section_image',
            [
                'label' => __( 'Image', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_home_image_desktop', [
                'label' => __('Desktop Image', 'kcg'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'show_label' => true,
                'condition' =>[
                    '_kcg_design_home_section' => ['default']
                ],
                'description' => __('Please choose client image (or) Leave it empty to hide.', 'kcg'),
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail_d',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ],
                'condition' =>[
                    '_kcg_design_home_section' => ['default']
                ],
                'description' => __('Select image size (or) Leave it empty to apply theme default.', 'kcg'),
            ]
        );
         $this->add_control(
            '_kcg_home_image_mobile', [
                'label' => __('Mobile Image', 'kcg'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' =>[
                    '_kcg_design_home_section' => ['default']
                ],
                'show_label' => true,
                'description' => __('This image display in image section. NB: Keep empty for hide.', 'kcg'),
            ]
        );
         $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail_m',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ],
                'condition' =>[
                    '_kcg_design_home_section' => ['default']
                ],
                'description' => __('Select image size (or) Leave it empty to apply theme default.', 'kcg'),
            ]
        );
         $repeater = new Repeater();
         $repeater->start_controls_tabs( '_kcg_slider_content_tabs' );
            $repeater->start_controls_tab( '_kcg_slider_repeat_content',
                [ 
                    'label' => esc_html__( 'Content', 'kcg'),
                ] 
            );
         $repeater->add_control(
            '_kcg_home_image_logo', [
                'label' => __('Image', 'kcg'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'show_label' => true,
                'description' => __('Please choose client image (or) Leave it empty to hide.', 'kcg'),
            ]
        );
         $repeater->end_controls_tab();
         $repeater->start_controls_tab( '_kcg_slider_data_scroll',
            [ 
                'label' => esc_html__( 'Data Scroll', 'kcg')
            ] 
        );
         $repeater->add_control(
            '_kcg_home_image_data',
            [
                'label' => 'Data Speed',
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'show_label' => true,
                'default' => '',
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter data speed number after 24 images(like 25) (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $repeater->end_controls_tab();
                
        $repeater->end_controls_tabs();
         $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail_l',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ],
                'condition' =>[
                    '_kcg_design_home_section' => ['style_one']
                ],
                'description' => __('Select image size (or) Leave it empty to apply theme default.', 'kcg'),
            ]
        );
          $this->add_control(
            '_kcg_client_logos',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_home_image_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_kcg_home_style_section',
            [
                'label' => __( 'General', 'kcg' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_kcg_home_section_bg',
            [
                'label' => __('Background Color', 'kcg'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 1 );
        $sec_bg = isset($settings['_kcg_home_section_bg']) && !empty($settings['_kcg_home_section_bg']) ? $settings['_kcg_home_section_bg'] : '#161717';
        $scroll_number = isset($settings['_kcg_home_section_scroll_number']) && !empty($settings['_kcg_home_section_scroll_number']) ? $settings['_kcg_home_section_scroll_number'] : '';
        $this->__open_wrap();
        ?>
        <div class="home-content" style="background-color:<?php echo esc_attr($sec_bg); ?>" data-scroll-section id="scroll-<?php echo esc_attr($scroll_number);?>">
        <?php if ($settings['_kcg_design_home_section'] == 'default'): 
            $this->add_link_attributes( 'kcg_button', $settings['_kcg_home_section_link'] );
            $image_desktop = wp_get_attachment_image_url( $settings['_kcg_home_image_desktop']['id'], $settings['thumbnail_d_size'] );
        $image_mobile = wp_get_attachment_image_url( $settings['_kcg_home_image_mobile']['id'], $settings['thumbnail_m_size'] );
           
            ?>
            
                <?php if (!empty($image_desktop)): ?>
                <div class="shape s-desktop" data-scroll data-scroll-speed="4">
                    <figure style="background-image:url(<?php echo wp_get_attachment_image_url($settings['_kcg_home_image_desktop']['id'], $settings['thumbnail_d_size']); ?>);"></figure>
                </div>
                <?php endif; ?>
                <?php if (!empty($image_mobile)): ?>
                <div class="shape s-mobile" data-scroll data-scroll-speed="4">
                    <figure style="background-image:url(<?php echo wp_get_attachment_image_url($settings['_kcg_home_image_mobile']['id'], $settings['thumbnail_m_size']); ?>);"></figure>
                </div>
                <?php endif; ?>
                <div class="inner">
                    <div class="col col-1"></div>
                    <div class="col col-4">
                        <?php if (!empty($settings['_kcg_home_section_l'])): ?>
                        <div class="title t-white" data-scroll data-scroll-speed="3">
                            <?php echo $this->parse_text_editor($settings['_kcg_home_section_l']); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col col-5"></div>
                    <div class="col col-2">
                        <div class="infos">
                            <?php if (!empty($settings['_kcg_home_section_l'])): ?>
                                <p class="paragraph p-rigth p-white" data-scroll data-scroll-speed="1">
                                    <?php echo $this->parse_text_editor($settings['_kcg_home_section_r']); ?>
                                </p>
                            <?php endif; ?>
                            <?php if (!empty($settings['_kcg_home_section_btn'])): ?>
                            <a <?php $this->print_render_attribute_string( 'kcg_button' ); ?> class="button" data-scroll data-scroll-speed="2">
                                <div class="wrapper">
                                    <div class="background"></div>
                                    <span class="text"><?php echo esc_html($settings['_kcg_home_section_btn']); ?></span>
                                </div>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

        <?php else: ?>
                <div class="inner">
                    <div class="col col-1"></div>
                    <div class="col col-4">
                        <?php if (!empty($settings['_kcg_home_section_l'])): ?>
                        <div class="title" data-scroll data-scroll-speed="4">
                            <?php echo $this->parse_text_editor($settings['_kcg_home_section_l']); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col col-1"></div>
                    <div class="col col-6 c-clients" data-scroll data-scroll-speed="1">
                        <div class="clients c-home">
                            <div class="wrapper">
                                    
                             <?php 
                             if ( empty( $settings['_kcg_client_logos'] ) ) {
                                    return;
                                }
                            $count = 1;
                             foreach ( $settings['_kcg_client_logos'] as $item ) : 
                                $image = wp_get_attachment_image_url( $item['_kcg_home_image_logo']['id'], $settings['thumbnail_l_size'] );
                                if ( ! $image ) {
                                    $image = $item['_kcg_home_image_logo']['url'];
                                }
                                $dataSpeed = isset($item['_kcg_home_image_data']) && !empty($item['_kcg_home_image_data']) ? $item['_kcg_home_image_data'] : '';
                                if ($count%24 == 1)
                                {  
                                    echo '<div class="line" data-scroll data-scroll-speed="'.$dataSpeed.'">';
                                }
                                if ($count%12 == 1)
                                {  
                                    echo "<div class='logos'>";
                                }
                                ?>
                                    <img class="image" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr($item['_kcg_home_image_logo']['id'] ); ?>" />
                            <?php 

                                if ($count%12 == 0)
                                {
                                    echo "</div>";
                                }
                                    if ($count%24 == 0)
                                {
                                    echo "</div>";
                                }
                            $count++; endforeach; 
                            if ($count%12 != 1) echo "</div>";
                            if ($count%24 != 1) echo "</div>";
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endif ?>
            </div>
        <?php $this->__close_wrap();?>
    <?php }
    
}
