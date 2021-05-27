<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;


class Strategy_Content extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-strategy-content';
    }

    public function get_title(){
        return esc_html__( 'Strategy Content', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-post-content';
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
            '_kcg_strategy_preset_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_strategy',
            [
                'label' => esc_html__( 'Design Format', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Default',
                ],
                'default' => 'default',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_kcg_strategy_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_strategy_c_text',
            [
                'label' => 'Content',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam turpis ligula, placerat et arcu in, tristique volutpat urna. Duis vitae aliquet eros. Quisque pretium eget eros a volutpat.', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter content (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_strategy_c_btn',
            [
                'label' => 'Button Text',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Get in Touch', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter button text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_strategy_c_link',
            [
                'label' => __( 'Link', 'kcg' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
                'placeholder' => __( 'https://your-link.com', 'kcg' ),
                'condition' => [
                    '_kcg_strategy_c_btn!' => ''
                ]
            ]
        );
        $this->end_controls_section();
         $this->start_controls_section(
            '_kcg_strategy_c_style_section',
            [
                'label' => __( 'General', 'kcg' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_kcg_strategy_c_section_bg',
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
        $sec_bg = isset($settings['_kcg_strategy_c_section_bg']) && !empty($settings['_kcg_strategy_c_section_bg']) ? $settings['_kcg_strategy_c_section_bg'] : '#ffffff';
        
        $this->__open_wrap();
        ?>
        <div class="services-content" style="background-color:<?php echo esc_attr($sec_bg); ?>" data-scroll-section>
            <div class="inner">
                <div class="col col-3"></div>
                <div class="col col-6">
                    <?php if( !empty($settings['_kcg_strategy_c_text']) ) :  ?>
                        <p class="paragraph p-bigger p-center"><?php echo $this->parse_text_editor($settings['_kcg_strategy_c_text']); ?></p>
                    <?php endif; ?>
                    <?php if( !empty($settings['_kcg_strategy_c_btn']) ) : 
                        $st_links = !empty($settings['_kcg_strategy_c_link']) ? $settings['_kcg_strategy_c_link']['url'] : '';
                        ?>
                    <a href="<?php echo esc_url($st_links); ?>" class="button b-black b-align-center">
                        <div class="wrapper">
                            <div class="background"></div>
                            <span class="label"><?php echo $this->parse_text_editor($settings['_kcg_strategy_c_btn']); ?></span>
                        </div>
                    </a>
                    <?php endif; ?>

                </div>
                <div class="col col-3"></div>
            </div>
        </div>
        <?php $this->__close_wrap();?>
    <?php }
    
}
