<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;


class Services extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-services';
    }

    public function get_title(){
        return esc_html__( 'Services', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-globe';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'globe', 'kcg globe', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        
        $this->start_controls_section(
            '_kcg_services_content_section',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        
        $repeater = new Repeater();
    
        $repeater->add_control(
            '_kcg_services_layout',
            [
                'label' => esc_html__( 'Layout', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Default',
                    'style_one' => 'Style One',
                ],
                'default' => 'default',
            ]
        );
        $repeater->add_control(
            '_kcg_services_title',
            [
                'label' => 'Title & Description',
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'label_block' => true,
                'show_label' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('Strategy', 'kcg'),
                'placeholder' => __('Enter your title', 'kcg'),
                'description' => __('If the field is empty, title will not be shown.', 'kcg'),
            ]
        );
        $repeater->add_control(
            '_kcg_services_desc',
            [
                'label' => __('Description', 'kcg'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'rows' => 10,
                'show_label' => false,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('It all begins with an idea. We help businesses we believe in to take their idea from the drawing board to the board room.', 'kcg'),
                'placeholder' => __('Enter your description', 'kcg'),
                'description' => __('If the field is empty, description will not be shown.', 'kcg'),
                'condition' => [
                    '_kcg_services_layout' => 'default'
                ]
            ]
        );
        $repeater->add_control(
            '_kcg_service_text',
            [
                'label' => 'Content',
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'rows' => 10,
                'show_label' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('', 'kcg'),
                'placeholder' => __('Enter your content', 'kcg'),
                'description' => __('If the field is empty, content will not be shown.', 'kcg'),
                'condition' => [
                    '_kcg_services_layout' => 'default'
                ]
            ]
        );
        $repeater->add_control(
            '_kcg_services_ic_both',
            [
                'label' => 'Icon Name',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'i-stg', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter icon name', 'kcg' ),
                'description' => __( 'Enter icon name (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $repeater->add_control(
          '_kcg_icon_subtitle_both',
          [
              'label' => 'Icon Title',
              'type' => Controls_Manager::TEXT,
              'label_block' => true,
              'show_label' => true,
              'dynamic' => [
                  'active' => true,
              ],
              'default' => __('Strategy', 'kcg'),
              'placeholder' => __('Enter your title', 'kcg'),
              'description' => __('If the field is empty, title will not be shown.', 'kcg'),
              'condition' => [
                '_kcg_services_layout' => 'style_one'
            ]
          ]
      );
        $repeater->add_control(
            '_kcg_services_ic_one',
            [
                'label' => 'Icon Name',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'i-stg', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter icon name', 'kcg' ),
                'description' => __( 'Enter icon name (or) Leave it empty to hide.', 'kcg' ),
                'condition' => [
                    '_kcg_services_layout' => 'style_one'
                ]
            ]
        );
        $repeater->add_control(
          '_kcg_icon_subtitle_one',
          [
              'label' => 'Icon Title',
              'type' => Controls_Manager::TEXT,
              'label_block' => true,
              'show_label' => true,
              'dynamic' => [
                  'active' => true,
              ],
              'default' => __('Strategy', 'kcg'),
              'placeholder' => __('Enter your title', 'kcg'),
              'description' => __('If the field is empty, title will not be shown.', 'kcg'),
              'condition' => [
                '_kcg_services_layout' => 'style_one'
            ]
          ]
      );
        $repeater->add_control(
            '_kcg_services_ic_tw',
            [
                'label' => 'Icon Name',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'i-pdt', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter icon name', 'kcg' ),
                'description' => __( 'Enter icon name (or) Leave it empty to hide.', 'kcg' ),
                'condition' => [
                    '_kcg_services_layout' => 'style_one'
                ]
            ]
        );
        $repeater->add_control(
          '_kcg_icon_subtitle_tw',
          [
              'label' => 'Icon Title',
              'type' => Controls_Manager::TEXT,
              'label_block' => true,
              'show_label' => true,
              'dynamic' => [
                  'active' => true,
              ],
              'default' => __('Strategy', 'kcg'),
              'placeholder' => __('Enter your title', 'kcg'),
              'description' => __('If the field is empty, title will not be shown.', 'kcg'),
              'condition' => [
                '_kcg_services_layout' => 'style_one'
            ]
          ]
      );
        $repeater->add_control(
            '_kcg_services_btn',
            [
                'label' => 'Button Text',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'READ MORE', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter button text', 'kcg' ),
                'description' => __( 'Enter button text (or) Leave it empty to hide.', 'kcg' ),
                'condition' => [
                    '_kcg_services_layout' => 'default'
                ]
            ]
        );
        $repeater->add_control(
            '_kcg_services_link',
            [
                'label' => __('Link', 'kcg'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => '#',
                ],
                'condition' =>[
                    '_kcg_services_btn!' => '',
                ],
                'placeholder' => __('https://your-link.com', 'kcg'),
                "description" => __("Enter link (or) Leave it to apply default.", 'kcg'),
            ]
        );

        $this->add_control(
            '_kcg_services_list',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        '_kcg_services_layout' => 'style_one',
                        '_kcg_services_title' => __( 'We solve complex business challenges with strategy and marketing, delivering products.', 'kcg' ),
                        '_kcg_services_btn'    => 'READ MORE',
                        '_kcg_services_ic_both'    => 'i-stg',
                        '_kcg_services_ic_one'    => 'i-pdt',
                        '_kcg_services_ic_tw'    => 'i-mktg',
                        '_kcg_services_link' => [
                            'url' => '#',
                        ],
                    ],
                    [
                        '_kcg_services_layout' => 'default',
                        '_kcg_services_title' => __( 'Strategy', 'kcg' ),
                        '_kcg_services_desc' => __( 'It all begins with an idea. We help businesses we believe in to take their idea from the drawing board to the board room.', 'kcg' ),
                        '_kcg_services_text' => __( '', 'kcg' ),
                        '_kcg_services_ic_both'    => 'i-stg',
                        '_kcg_services_btn'    => 'READ MORE',
                        '_kcg_services_link' => [
                            'url' => '#',
                        ],
                    ],
                    [
                        '_kcg_services_layout' => 'default',
                        '_kcg_services_title' => __( 'Product', 'kcg' ),
                        '_kcg_services_desc' => __( 'Designing and delivering products to help you change the world.', 'kcg' ),
                        '_kcg_services_text' => __( '', 'kcg' ),
                        '_kcg_services_ic_both'    => 'i-pdt',
                        '_kcg_services_btn'    => 'READ MORE',
                        '_kcg_services_link' => [
                            'url' => '#',
                        ],
                    ],
                    [
                        '_kcg_services_layout' => 'default',
                        '_kcg_services_title' => __( 'Marketing', 'kcg' ),
                        '_kcg_services_desc' => __( 'Your story matters. Our brand development specialism ensures that your story gets told.', 'kcg' ),
                        '_kcg_services_text' => __( '• Research & Discovery<br> • Business Consultancy<br> • Digital Transformation<br> • Branding ', 'kcg' ),
                        '_kcg_services_ic_both'    => 'i-mktg',
                        '_kcg_services_btn'    => 'READ MORE',
                        '_kcg_services_link' => [
                            'url' => '#',
                        ],
                    ],
                ],
                
                'title_field' => '{{ _kcg_services_title }}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_kcg_menu_section',
            [
                'label' => __( 'Menu Content', 'kcg' ),
            ]
        );
        $repeater_menu = new Repeater();
        $repeater_menu->add_control(
            '_kcg_menu_name',
            [
                'label' => 'Name & Url',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('STRATEGY', 'kcg'),
                'placeholder' => __('Enter menu name', 'kcg'),
                'description' => __('If the field is empty, menu name will not be shown.', 'kcg'),
            ]
        );
        $repeater_menu->add_control(
            '_kcg_menu_link',
            [
                'label' => __('Link', 'kcg'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => '#',
                ],
                'condition' =>[
                    '_kcg_services_btn!' => '',
                ],
                'placeholder' => __('https://your-link.com', 'kcg'),
                "description" => __("Enter link (or) Leave it to apply default.", 'kcg'),
            ]
        );
        
        $this->add_control(
            '_kcg_services_maps',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater_menu->get_controls(),
                'default' => [
                    [
                        '_kcg_menu_name' => __( 'STRATEGY', 'kcg' ),
                        '_kcg_menu_link' => [
                            'url' => "#",
                        ],
                    ],
                    [
                        '_kcg_menu_name' => __( 'PRODUCT', 'kcg' ),
                        '_kcg_menu_link' => [
                            'url' => "#",
                        ],
                    ],
                    [
                        '_kcg_menu_name' => __( 'MARKETING', 'kcg' ),
                        '_kcg_menu_link' => [
                            'url' => "#",
                        ],
                    ],
                ],
                
                'title_field' => '{{ _kcg_menu_name }}',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 1 );
        
        $this->__open_wrap();
        ?>
        <div class="services-content sc-slides">
            <div class="services-bckg"></div>
                <div class="infos" data-color="#FFFFFF" id="slide-1">
                <div class="submenu">
                    <a href="services-strategy.html" class="item"><span>STRATEGY</span></a>
                    <a href="services-product.html" class="item"><span>PRODUCT</span></a>
                    <a href="services-marketing.html" class="item"><span>MARKETING</span></a>
                </div>

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col col-7">
                        <h1 class="title t-medium t-center"><strong>We solve complex business challenges with strategy and marketing, delivering products.</strong></h1>
                    </div>
                </div>
            
                <div class="row justify-content-center">
                    <div class="col col-10">
                        <div class="services-icons">
                        <div class="item" data-target="slide-2">
                            <div class="ico svg i-stg i-black"></div>
                            <span>Strategy</span>
                        </div>
                        <div class="item" data-target="slide-3">
                            <div class="ico svg i-pdt i-black"></div>
                            <span>Product</span>
                        </div>
                        <div class="item" data-target="slide-4">
                            <div class="ico svg i-mktg i-black"></div>
                            <span>Marketing</span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="infos" data-color="#2D3294" id="slide-2">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                    <div class="col col-3">
                        <span class="type">Strategy</span>
                        <div class="paragraph p-white">It all begins with an idea. We help businesses we believe in to take their idea from the drawing board to the board room.</div>
                        <a href="services-strategy.html" class="button b-white">
                        <div class="wrapper">
                            <span class="text">READ MORE</span>
                        </div>
                        </a>
                    </div>
                    <div class="col col-3">
                        <div class="ico svg i-stg"></div>
                    </div>
                    <div class="col col-3">
                        <div class="list">
                        • Research & Discovery<br>
                        • Business Consultancy<br>
                        • Digital Transformation<br>
                        • Branding 
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="infos" data-color="#4C9F91" id="slide-3">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                    <div class="col col-3">
                        <span class="type">Product</span>
                        <div class="paragraph p-white">Designing and delivering products to help you change the world.</div>
                        <a href="services-product.html" class="button b-white">
                        <div class="wrapper">
                            <span class="text">READ MORE</span>
                        </div>
                        </a>
                    </div>
                    <div class="col col-3">
                        <div class="ico svg i-pdt"></div>
                    </div>
                    <div class="col col-3">
                        <div class="list">
                        • Research & Discovery<br>
                        • Business Consultancy<br>
                        • Digital Transformation<br>
                        • Branding 
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="infos" data-color="#B27EE4" id="slide-4">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                    <div class="col col-3">
                        <span class="type">Marketing</span>
                        <div class="paragraph p-white">Your story matters. Our brand development specialism ensures that your story gets told.</div>
                        <a href="services-marketing.html" class="button b-white">
                        <div class="wrapper">
                            <span class="text">READ MORE</span>
                        </div>
                        </a>
                    </div>
                    <div class="col col-3">
                        <div class="ico svg i-mktg"></div>
                    </div>
                    <div class="col col-3">
                        <div class="list">
                        • Research & Discovery<br>
                        • Business Consultancy<br>
                        • Digital Transformation<br>
                        • Branding 
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="services-content sc-black">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col col-11">
          <div class="highlights">
            <div class="item">
              <div class="h-text">
                <div class="caption c-white"><span>How we do it</span></div>
                <div class="title t-small t-white">Our <strong>innovative approach</strong> is centered around your business’s lifecycle</div>
                <a href="about-approach.html" class="button b-white">
                  <div class="wrapper">
                    <span class="text">OUR APPROACH</span>
                  </div>
                </a>
              </div>
              <div class="image">
                <img src="<?php echo KCG_IMAGES; ?>/about/highlights-2.png" alt="" />
              </div>
            </div>
            <div class="item">
              <div class="h-text">
                <div class="caption c-white"><span>Who Make it</span></div>
                <div class="title t-small t-white">A <strong>global team</strong> commited to help our clients build a better world.</div>
                <a href="about-team.html" class="button b-white">
                  <div class="wrapper">
                    <span class="text">MORE ABOUT US</span>
                  </div>
                </a>
              </div>
              <div class="image">
                <img src="<?php echo KCG_IMAGES; ?>/about/highlights-3.png" alt=""/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="services-content sc-clients">
    <div class="caption c-center"><span>Our Clients</span></div>
    <h2 class="title t-small t-center">Partnering to reach the <strong>next level.</strong></h2>
    <div class="clients">
      <div class="wrapper">
        <div class="line">
          <div class="logos">
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-1.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-2.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-3.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-4.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-5.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-6.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-7.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-8.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-9.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-10.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-11.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-12.png" alt="" />
            
          </div>
          <div class="logos">
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-1.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-2.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-3.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-4.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-5.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-6.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-7.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-8.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-9.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-10.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-11.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-12.png" alt="" />
            
          </div>
        </div>
        <div class="line">
          <div class="logos">
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-1.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-2.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-3.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-4.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-5.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-6.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-7.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-8.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-9.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-10.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-11.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-12.png" alt="" />
            
          </div>
          <div class="logos">
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-1.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-2.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-3.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-4.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-5.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-6.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-7.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-8.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-9.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-10.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-11.png" alt="" />
            
            <img class="image" src="<?php echo KCG_IMAGES; ?>/clients/logo-12.png" alt="" />
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="services-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col col-9 c-testimonial">
          <div class="testimonial">
            <div class="slides">
            
              <div class="item">
                <div class="wrapper">
                  <div class="stars svg"></div>  
                  <div class="phrase">"You're probably luckier to have them<br>than they are to have you."</div>
                  <div class="info">
                    <img class="photo" src="<?php echo KCG_IMAGES; ?>/photos/person-7.png" alt="" />
                    <span class="name">PHIL P</span>
                    <span class="occupation">Founder The Swoup App</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="wrapper">
                  <div class="stars svg"></div>  
                  <div class="phrase">"You're probably luckier to have them<br>than they are to have you."</div>
                  <div class="info">
                    <img class="photo" src="<?php echo KCG_IMAGES; ?>/photos/person-7.png" alt="" />
                    <span class="name">PHIL P</span>
                    <span class="occupation">Founder The Swoup App</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="wrapper">
                  <div class="stars svg"></div>  
                  <div class="phrase">"You're probably luckier to have them<br>than they are to have you."</div>
                  <div class="info">
                    <img class="photo" src="<?php echo KCG_IMAGES; ?>/photos/person-7.png" alt="" />
                    <span class="name">PHIL P</span>
                    <span class="occupation">Founder The Swoup App</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="wrapper">
                  <div class="stars svg"></div>  
                  <div class="phrase">"You're probably luckier to have them<br>than they are to have you."</div>
                  <div class="info">
                    <img class="photo" src="<?php echo KCG_IMAGES; ?>/photos/person-7.png" alt="" />
                    <span class="name">PHIL P</span>
                    <span class="occupation">Founder The Swoup App</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="wrapper">
                  <div class="stars svg"></div>  
                  <div class="phrase">"You're probably luckier to have them<br>than they are to have you."</div>
                  <div class="info">
                    <img class="photo" src="<?php echo KCG_IMAGES; ?>/photos/person-7.png" alt="" />
                    <span class="name">PHIL P</span>
                    <span class="occupation">Founder The Swoup App</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="wrapper">
                  <div class="stars svg"></div>  
                  <div class="phrase">"You're probably luckier to have them<br>than they are to have you."</div>
                  <div class="info">
                    <img class="photo" src="<?php echo KCG_IMAGES; ?>/photos/person-7.png" alt="" />
                    <span class="name">PHIL P</span>
                    <span class="occupation">Founder The Swoup App</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="wrapper">
                  <div class="stars svg"></div>  
                  <div class="phrase">"You're probably luckier to have them<br>than they are to have you."</div>
                  <div class="info">
                    <img class="photo" src="<?php echo KCG_IMAGES; ?>/photos/person-7.png" alt="" />
                    <span class="name">PHIL P</span>
                    <span class="occupation">Founder The Swoup App</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="wrapper">
                  <div class="stars svg"></div>  
                  <div class="phrase">"You're probably luckier to have them<br>than they are to have you."</div>
                  <div class="info">
                    <img class="photo" src="<?php echo KCG_IMAGES; ?>/photos/person-7.png" alt="" />
                    <span class="name">PHIL P</span>
                    <span class="occupation">Founder The Swoup App</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="wrapper">
                  <div class="stars svg"></div>  
                  <div class="phrase">"You're probably luckier to have them<br>than they are to have you."</div>
                  <div class="info">
                    <img class="photo" src="<?php echo KCG_IMAGES; ?>/photos/person-7.png" alt="" />
                    <span class="name">PHIL P</span>
                    <span class="occupation">Founder The Swoup App</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="wrapper">
                  <div class="stars svg"></div>  
                  <div class="phrase">"You're probably luckier to have them<br>than they are to have you."</div>
                  <div class="info">
                    <img class="photo" src="<?php echo KCG_IMAGES; ?>/photos/person-7.png" alt="" />
                    <span class="name">PHIL P</span>
                    <span class="occupation">Founder The Swoup App</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="wrapper">
                  <div class="stars svg"></div>  
                  <div class="phrase">"You're probably luckier to have them<br>than they are to have you."</div>
                  <div class="info">
                    <img class="photo" src="<?php echo KCG_IMAGES; ?>/photos/person-7.png" alt="" />
                    <span class="name">PHIL P</span>
                    <span class="occupation">Founder The Swoup App</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="wrapper">
                  <div class="stars svg"></div>  
                  <div class="phrase">"You're probably luckier to have them<br>than they are to have you."</div>
                  <div class="info">
                    <img class="photo" src="<?php echo KCG_IMAGES; ?>/photos/person-7.png" alt="" />
                    <span class="name">PHIL P</span>
                    <span class="occupation">Founder The Swoup App</span>
                  </div>
                </div>
              </div>
              
            </div>
            
            <div class="button b-black b-icon t-prev">
              <div class="wrapper">
                <div class="background"></div>
                <div class="arrow svg a-left"></div>
              </div>
            </div>
            <div class="button b-black b-icon t-next">
              <div class="wrapper">
                <div class="arrow svg a-right"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        <?php $this->__close_wrap();?>
    <?php }
    
}
