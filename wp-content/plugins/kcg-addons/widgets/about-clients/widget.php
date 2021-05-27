<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class About_Clients extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-about-clients';
    }

    public function get_title(){
        return esc_html__( 'About Clients', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-post-slider';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'about clients', 'clients', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_about_clients_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_about_clients_section',
            [
                'label' => esc_html__( 'Design Format', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Default',
                    'style_1' => 'Style One',
                ],
                'default' => 'default',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_kcg_about_client_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_about_client_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Our Clients', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter title text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_about_client_txt',
            [
                'label' => 'Content',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Partnering to reach the <strong>next level.</strong>', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_kcg_about_clients_logo_section',
            [
                'label' => __( 'Logo', 'kcg' ),
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
            '_kcg_about_clients_logo', [
                'label' => __('Image', 'kcg'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'show_label' => true,
                'description' => __('Please choose client image (or) Leave it empty to hide.', 'kcg'),
            ]
        );
         $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ],
                'description' => __('Select image size (or) Leave it empty to apply theme default.', 'kcg'),
            ]
        );
         $repeater->end_controls_tab();
         $repeater->start_controls_tab( '_kcg_slider_data_scroll',
            [ 
                'label' => esc_html__( 'Data Scroll', 'kcg')
            ] 
        );
        $repeater->add_control(
            '_kcg_about_client_data',
            [
                'label' => 'Data Speed',
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'show_label' => true,
                'default' => '',
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter data speed number after 24 images(like 25) text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $repeater->end_controls_tab();
                
        $repeater->end_controls_tabs();
          $this->add_control(
            '_kcg_about_client_logos',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        
        $this->__open_wrap();
        ?>
       <div class="about-content" data-scroll-section>
            
            <?php if (isset($settings['_kcg_about_client_title']) && !empty($settings['_kcg_about_client_title'])): ?>
                <div class="caption c-center" data-scroll data-scroll-speed="1"><span><?php echo $this->parse_text_editor($settings['_kcg_about_client_title']); ?></span>
                </div>
            <?php endif; ?>
            
            <?php if (isset($settings['_kcg_about_client_txt']) && !empty($settings['_kcg_about_client_txt'])): ?>
                <h2 class="title t-small t-center" data-scroll data-scroll-speed="3"><?php echo $this->parse_text_editor($settings['_kcg_about_client_txt']); ?></h2>
            <?php endif; ?>
            <div class="clients">
                <div class="wrapper">
                    <?php 
                         if ( empty( $settings['_kcg_about_client_logos'] ) ) {
                                return;
                            }
                        $count = 1;
                         foreach ( $settings['_kcg_about_client_logos'] as $item ) : 
                            $image = wp_get_attachment_image_url( $item['_kcg_about_clients_logo']['id'], $settings['thumbnail_size'] );
                            if ( ! $image ) {
                                $image = $item['_kcg_about_clients_logo']['url'];
                            }
                            $dataSpeed = isset($item['_kcg_about_client_data']) && !empty($item['_kcg_about_client_data']) ? $item['_kcg_about_client_data'] : '';
                            if ($count%24 == 1)
                            {  
                                echo '<div class="line" data-scroll data-scroll-speed="'.$dataSpeed.'">';
                            }
                            if ($count%12 == 1)
                            {  
                                echo "<div class='logos'>";
                            }
                            ?>
                        <img class="image" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr($item['_kcg_about_clients_logo']['id'] ); ?>" />
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
        <?php
        $this->__close_wrap();
    }
    
}
