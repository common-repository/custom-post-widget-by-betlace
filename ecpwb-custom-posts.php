<?php
namespace Elementor;

class Ecpwb_Custom_Posts_Widget extends Widget_Base {
	
  public function get_name(){
    return 'customPost';
  }
  public function get_title(){
    return __('Custom Post');
  }
  public function get_icon() {
    return 'fa fa-eye';
  }
  public function get_categories(){
    return ['general'];
  }

  protected function _register_controls() {

		$this->start_controls_section(
			'custom_post_settings',
			[
				'label' => __( 'Settins', 'elementor' ),
			]
    );
    
    $this->add_control(
			'post_type',
			[
        'label' => __( 'Post type', 'elementor' ),
        'label_block' => true,
				'type' => \Elementor\Controls_Manager::SELECT,
        'options' => $this->get_my_post_types(),
        'default' => 'post',
			]
    );
		
		$this->add_control(
			'post-number',
			[
				'label' => __( 'Posts per page', 'elementor' ),
				'type' => Controls_Manager::NUMBER,
				'placeholder' => __( 'Post number', 'elementor' ),
			]
    );

    $this->add_control(
			'show_categories',
			[
        'label' => __( 'Categories', 'elementor' ),
        'label_block' => true,
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $this->get_my_categories(),
			]
    );
    
    $this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
          '100%'  => __( '1', 'elementor' ),
					'50%'  => __( '2', 'elementor' ),
					'33.333%'  => __( '3', 'elementor' ),
				],
				'default' => '33.333%',
			]
    );
    
    $this->add_responsive_control(
			'show_image',
			[
				'label' => __( 'Show image', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
          'block'  => __( 'Yes', 'elementor' ),
					'none'  => __( 'No', 'elementor' )
				],
				'default' => 'block',
				'selectors' => [
					'{{WRAPPER}} .custom-post-item img' => 'display: {{VALUE}};',
				],
			]
    );

    $this->add_responsive_control(
			'image_height',
			[
				'label' => __( 'Image size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .custom-post-image img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
    );
    
    $this->add_responsive_control(
			'space_between_posts',
			[
				'label' => __( 'Space betweend posts', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
            'max' => 10,
            'step' => 0.5,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => '',
				]
			]
    );
    
    $this->add_responsive_control(
			'margin_bottom_posts',
			[
				'label' => __( 'Posts bottom space', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '25',
        ],
        'selectors' => [
					'{{WRAPPER}} .custom-post-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

    $this->add_control(
			'pagination',
			[
				'label' => __( 'Pagination', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
          'true'  => __( 'Yes', 'elementor' ),
					'false'  => __( 'No', 'elementor' ),
				],
			]
    );

    $this->add_control(
			'order_by',
			[
				'label' => __( 'Order by', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
          'date'  => __( 'Date', 'elementor' ),
					'id'  => __( 'ID', 'elementor' ),
				],
			]
    );
    $this->add_control(
			'order',
			[
				'label' => __( 'Order', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
          'DESC'  => __( 'DESC', 'elementor' ),
					'ASC'  => __( 'ASC', 'elementor' ),
				],
			]
    );

    $this->add_responsive_control(
			'border_radius',
			[
				'label' => __( 'Border radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .custom-post-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
    );
    
    $this->end_controls_section();

    //------------ content ------------
    $this->start_controls_section(
			'custom_post_content',
			[
				'label' => __( 'Content', 'elementor' ),
			]
    );

    $this->add_responsive_control(
			'show_title',
			[
				'label' => __( 'Show title', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
          'block'  => __( 'Yes', 'elementor' ),
					'none'  => __( 'No', 'elementor' )
				],
        'default' => 'block',
        'selectors' => [
					'{{WRAPPER}} .custom-post-title' => 'display: {{VALUE}};',
				],
			]
    );
    $this->add_control(
			'title_color',
			[
				'label' => __( 'Title color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
        ],
        'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .custom-post-title' => 'color: {{VALUE}}',
				],
			]
    );
    $this->add_control(
			'html-tag',
			[
				'label' => __( 'Title tag', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
          'h1'  => __( 'H1', 'elementor' ),
					'h2'  => __( 'H2', 'elementor' ),
					'h3'  => __( 'H3', 'elementor' ),
					'h4'  => __( 'H4', 'elementor' ),
					'h5'  => __( 'H5', 'elementor' ),
				],
			]
    );
    $this->add_responsive_control(
			'title_align',
			[
				'label' => __( 'Title alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .custom-post-title'  => 'text-align: {{VALUE}};',
				],
			]
    );
    $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .custom-post-title',
			]
    );

    $this->add_responsive_control(
			'display_categories',
			[
				'label' => __( 'Show categories', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
          'block'  => __( 'Yes', 'elementor' ),
					'none'  => __( 'No', 'elementor' )
				],
        'default' => 'block',
        'selectors' => [
					'{{WRAPPER}} .custom-post-categories' => 'display: {{VALUE}};',
				],
			]
    );
    $this->add_responsive_control(
			'link_categories',
			[
				'label' => __( 'Categories link', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
          'true'  => __( 'Yes', 'elementor' ),
					'false'  => __( 'No', 'elementor' )
				],
        'default' => 'false',
			]
    );
    $this->add_control(
			'categories_color',
			[
				'label' => __( 'Categories color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
        ],
        'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .custom-post-categories span' => 'color: {{VALUE}}',
				],
			]
    );
    
    $this->add_control(
			'not_view_categories',
			[
        'label' => __( 'Hide categories from template', 'elementor' ),
        'label_block' => true,
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $this->get_my_categories(),
			]
    );
    $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'categories_typography',
				'label' => __( 'Categories typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .custom-post-categories span',
			]
    );

    $this->add_responsive_control(
			'show_excerpt',
			[
				'label' => __( 'Show exerpt', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
          'block'  => __( 'Yes', 'elementor' ),
					'none'  => __( 'No', 'elementor' )
				],
        'default' => 'block',
        'selectors' => [
					'{{WRAPPER}} .custom-post-text' => 'display: {{VALUE}};',
				],
			]
    );
    $this->add_control(
			'excerpt_length',
			[
				'label' => __( 'Excerpt length', 'elementor' ),
				'type' => Controls_Manager::NUMBER,
        'placeholder' => __( 'Excerpt length', 'elementor' ),
        'default' => 20,
			]
		);
    $this->add_responsive_control(
			'excerpt_align',
			[
				'label' => __( 'Excerpt alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .custom-post-text'  => 'text-align: {{VALUE}};',
				],
			]
    );

    $this->add_control(
			'show_date',
			[
				'label' => __( 'Show date', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
          'true'  => __( 'Yes', 'elementor' ),
					'false'  => __( 'No', 'elementor' ),
				],
			]
    );

    $this->add_control(
			'show_author',
			[
				'label' => __( 'Show author', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
          'true'  => __( 'Yes', 'elementor' ),
					'false'  => __( 'No', 'elementor' ),
				],
			]
    );

    $this->add_control(
			'content_background_color',
			[
				'label' => __( 'Content background color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
        ],
        'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .custom-post-content' => 'background-color: {{VALUE}}',
				],
			]
    );
    $this->add_control(
			'content_color',
			[
				'label' => __( 'Content color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
        ],
        'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .custom-post-content' => 'color: {{VALUE}}',
				],
			]
    );

    $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Content typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .custom-post-content',
			]
    );

    $this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Content padding', 'plugin-domain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .custom-post-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
    );

    $this->end_controls_section();
    
    //------------ read more button ------------
    $this->start_controls_section(
			'custom_post_btn',
			[
				'label' => __( 'Read more button', 'elementor' ),
			]
    );
    
    $this->add_responsive_control(
			'show_read_more',
			[
				'label' => __( 'Show read more', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
          'block'  => __( 'Yes', 'elementor' ),
					'none'  => __( 'No', 'elementor' )
				],
        'default' => 'block',
        'selectors' => [
					'{{WRAPPER}} .custom-post-btn-wrap' => 'display: {{VALUE}};',
				],
			]
    );
    $this->add_control(
			'btn_text',
			[
				'label' => __( 'Button text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Read more', 'elementor' ),
				'placeholder' => __( 'Button text', 'elementor' ),
			]
		);
    $this->add_responsive_control(
			'btn_padding',
			[
				'label' => __( 'Button padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .custom-post-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
    );
    $this->add_control(
			'btn_color',
			[
				'label' => __( 'Button color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
        ],
        'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .custom-post-btn' => 'color: {{VALUE}}',
				],
			]
    );
    $this->add_control(
			'btn_background_color',
			[
				'label' => __( 'Button background color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
        ],
        'default' => '',
				'selectors' => [
					'{{WRAPPER}} .custom-post-btn' => 'background-color: {{VALUE}}',
				],
			]
    );
    $this->add_responsive_control(
			'btn_border_radius',
			[
				'label' => __( 'Border radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .custom-post-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
    );
    $this->add_responsive_control(
			'btn_align',
			[
				'label' => __( 'Button alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .custom-post-btn-wrap'  => 'text-align: {{VALUE}};',
				],
			]
    );
    $this->add_responsive_control(
			'btn_display',
			[
				'label' => __( 'Button full length', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
          'block'  => __( 'Yes', 'elementor' ),
					'inline-block'  => __( 'No', 'elementor' )
				],
        'default' => 'inline-block',
        'selectors' => [
					'{{WRAPPER}} .custom-post-btn' => 'display: {{VALUE}};',
				],
			]
    );
    $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => __( 'Button typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .custom-post-btn',
			]
    );

		$this->end_controls_section();
  }
  
  protected function get_my_categories() {
    $categories = get_categories([ 'taxonomy' => 'category' ]);
    $options = [ '' => '' ];
    foreach ( $categories as $category ) {
			$options[ $category->term_id ] = $category->name;
		}

    $args = array(
      'public'   => true,
      '_builtin' => false
    );
    $output   = 'names';
    $post_types = get_post_types($args, $output);

    foreach ( $post_types as $post_type ) {
      if($post_type != 'elementor_library') {
        $post_type_data = get_post_type_object($post_type);
        $categories = get_categories([ 'taxonomy' => $post_type_data->taxonomies[0] ]);
        foreach ( $categories as $category ) {
          $options[ $category->term_id ] = $category->name;
        }
      }
		}

		return $options;
  }
  protected function get_my_post_types() {
    $options = [ 'post' => 'post' ];

		$args = array(
      'public'   => true,
      '_builtin' => false
    );
    $output   = 'names';
    $post_types = get_post_types($args, $output);
    foreach ( $post_types as $post_type ) {
      if($post_type != 'elementor_library') {
        $options[ $post_type ] = $post_type;
      }
    }

		return $options;
  }
 
  protected function render() {
    $settings = $this->get_settings_for_display();

    $catNotShowList = array();
    if(is_array($settings['not_view_categories'])) {
      foreach ($settings['not_view_categories'] as $catItem) {
        array_push($catNotShowList, $catItem);
      }
    }

  ?>
  <!-- HTML DESIGN HERE -->
    <div class="custom-post-container">
      <?php
      $post_width = 33.333;
      $space_between_posts = $settings['space_between_posts']['size'];

      if($settings['columns'] == "33.333%") {
        $post_width = 33.333;
        if($space_between_posts > 0) {
          $post_width = $post_width - $space_between_posts;
        }
      }
      else if($settings['columns'] == "50%") {
        $post_width = 50;
        if($space_between_posts > 0) {
          $post_width = $post_width - $space_between_posts;
        }
      }
      else if($settings['columns'] == "100%") {
        $post_width = 100;
        if($space_between_posts > 0) {
          $post_width = $post_width - $space_between_posts;
        }
      }

      
      if($space_between_posts > 0) {
        if($settings['columns'] == "33.333%") {
          $space_between_posts = 33.333 - $space_between_posts;
        }
        if($settings['columns'] == "50%") {
          $space_between_posts = 50 - $space_between_posts;
        }
      }

      if($settings['post_type'] == 'post') {
        $taxonomy = 'category';
      }
      else {
        $post_type_data = get_post_type_object($settings['post_type']);
        $taxonomy = $post_type_data->taxonomies[0];
      }
      
      if(count($settings['show_categories']) == 0) {
        $tax_operator = 'EXISTS';
      }
      elseif(count($settings['show_categories']) == 1) {
        if($settings['show_categories'][0] == "") {
          $tax_operator = 'EXISTS';
        }
        else {
          $tax_operator = 'IN';
        }
      }
      else {
        $tax_operator = 'IN';
      }
      
      global $wp_query;
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $save_wpq = $wp_query;
      $args = array (
      'numberposts' => '',
      'posts_per_page' => $settings['post-number'],
      'tax_query' => array(
        array(
          'taxonomy' => $taxonomy,
          'field'    => 'term_id',
          'terms'    => $settings['show_categories'],
          'operator' => $tax_operator
        ),
      ),
      'paged' => $paged,
      'post_type' => $settings['post_type'],
      'orderby' => $settings['order_by'],
      'order' => $settings['order'],
      'suppress_filters' => true,
      );
      $wp_query = new \WP_Query($args);
      $postList = ($wp_query->posts);
      if (!empty($postList)) : ?>
        <?php 
          while( $wp_query->have_posts() ) : 
            $wp_query->the_post();
        ?>
          
          <div class="custom-post-item" style="width: <?php echo $post_width ?>%">
            <div class="custom-post-image">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
            </div>

            <div class="custom-post-content">
              <a href="<?php echo get_permalink(); ?>"><<?php echo $settings['html-tag'] ?> class="custom-post-title"><?php the_title(); ?></<?php echo $settings['html-tag'] ?>></a>
              <div class="custom-post-categories">
                <?php
                  $categories = get_the_terms(get_the_ID(), $taxonomy);
                  if(! is_array($categories)) {
                    $categories = array();
                  }
                  foreach ($categories as $category) {
                    if(! in_array($category->term_id, $catNotShowList)) {
                  ?>
                    <?php 
                      if($settings['link_categories'] == 'true') {
                    ?>
                      <a href="/category/<?php echo $category->slug ?>" class="custom-post-categories-link"><span class="custom-post-categories-span"><?php echo $category->name ?></span></a>
                    <?php
                      }
                      else {
                    ?>
                      <span class="custom-post-categories-span"><?php echo $category->name ?></span>
                    <?php } ?>
                  <?php
                    }
                  }
                ?>
              </div>
              <div class="custom-post-metainfo">
                <?php
                if($settings['show_author'] == 'true') {
                ?>
                  <span class="custom-post-metainfo-date"><?php the_author(); ?></span>
                <?php
                }
                if($settings['show_date'] == 'true') {
                ?>
                  <span class="custom-post-metainfo-author"><?php the_date(); ?></span>
                <?php
                }
                ?>
              </div>

              <p class="custom-post-text"><?php echo wp_trim_words(wp_strip_all_tags(get_the_content()), $settings['excerpt_length']); ?></p>
              <div class="custom-post-btn-wrap">
                <a href="<?php echo get_permalink(); ?>" class="custom-post-btn"><?php echo $settings['btn_text'] ?></a>
              </div>
            </div>
          </div>

          <?php endwhile; ?>

        <?php
        $args = array(
          'end_size'     => 1,
          'mid_size'     => 2,
          'prev_next'    => True,
          'prev_text'    => __('<'),
          'next_text'    => __('>')
        );
        if($settings['pagination'] == 'true') {
        ?>
        <div class="custom-post-pagination">
          <?php echo paginate_links( $args ); ?>
        </div>

        <?php
        }
          wp_reset_postdata();
          $wp_query = $save_wpq;
        ?>

      <?php endif; ?>
    </div>

    <style>
    .custom-post-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }
    .custom-post-item {
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }
    .custom-post-image img {
      object-fit: cover;
    }
    .custom-post-content {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }
    .custom-post-content p {
      flex-grow: 1;
      margin-bottom: 15px;
    }
    .custom-post-categories span {
      display: inline-block;
      margin-bottom: 10px;
    }
    .custom-post-categories span:after {
      content: ', ';
      display: inline-block;
      margin-right: 5px;
    }
    .custom-post-categories-link:last-child span:after {
      display: none;
    }
    .custom-post-categories > span:last-child:after {
      display: none;
    }
    .custom-post-metainfo {
      display: flex;
      justify-content: space-between;
    }
    .custom-post-metainfo span {
      display: inline-block;
      margin-bottom: 10px;
    }
    .custom-post-title {
      margin-bottom: 10px;
    }

    .custom-post-pagination {
      width: 100%;
      text-align: center;
      margin-top: 25px;
    }
    .page-numbers {
      padding: 6px 12px;
      background-color: #efefef;
      transition: all 0.25s ease;
    }
    .page-numbers:hover {
      background-color: #b7b7b7;
    }
    .custom-post-pagination .current {
      background-color: #b7b7b7;
    }
    </style>
  <!-- HTML END DESIGN HERE -->
  <?php
  }
  
}