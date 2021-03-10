<?php

namespace GutenbergBlocksWithMetabox;
/**
 * The Gutenberg Block related functionality of the plugin.
 *
 * @link       https://booskills.com/rao
 * @since      1.0.0
 *
 * @package    GutenbergBlocksWithMetabox
 * @subpackage GutenbergBlocksWithMetabox/blocks
 */
class Blocks {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Enqueue block JavaScript and CSS for the editor
	 *
	 * @hooked enqueue_block_editor_assets
	 */
	function enqueue_block_editor_assets() {

		// Enqueue block editor JS
		wp_enqueue_script(
			$this->plugin_name . '-block-editor-js',
			plugins_url( '/js/editor.js', __FILE__ ),
			[ 'jquery' ],
			filemtime( plugin_dir_path( __FILE__ ) . 'js/editor.js' )
		);

		// Enqueue block editor styles
		wp_enqueue_style(
			$this->plugin_name . '-block-editor-css',
			plugins_url( '/css/editor.css', __FILE__ ),
			[],
			filemtime( plugin_dir_path( __FILE__ ) . 'css/editor.css' )
		);

	}

	/**
	 * Enqueue frontend and editor JavaScript and CSS
	 *
	 * @hooked enqueue_block_assets
	 */
	function enqueue_block_assets() {

		// Enqueue block editor styles
		wp_enqueue_style(
			$this->plugin_name . '-block-public-css',
			plugins_url( '/css/public.css', __FILE__ ),
			[],
			filemtime( plugin_dir_path( __FILE__ ) . 'css/public.css' )
		);

	}

	/**
	 * @param $meta_boxes
	 *
	 * @return mixed
	 * @hooked rwmb_meta_boxes
	 */
	public function register_blocks_with_metabox( $meta_boxes ) {
		$prefix = 'mb_';

		$meta_boxes[] = [
			'title'           => __( 'MB Testimonial Block', 'gutenberg-blocks-with-metabox' ),
			'id'              => 'mb-testimonial-block',
			'description'     => 'MB Testimonial Block Description',
			'category'        => 'widgets',
			'keywords'        => [ 'testimonial', 'author', 'quote' ],
			'supports'        => [
				'align' => 'left',
			],
			'render_callback' => [ $this, 'testimonial_block_cb' ],

			'type'    => 'block',
			'context' => 'content',
			'fields'  => [
				[
					'name'              => __( 'Textarea', 'gutenberg-blocks-with-metabox' ),
					'id'                => $prefix . 'testimonial_text',
					'type'              => 'textarea',
					'label_description' => __( 'The words of the author', 'gutenberg-blocks-with-metabox' ),
					'desc'              => __( 'Enter the words of the author', 'gutenberg-blocks-with-metabox' ),
					'required'          => true,
				],
				[
					'name'              => __( 'Author Name', 'gutenberg-blocks-with-metabox' ),
					'id'                => $prefix . 'testimonial_author_name',
					'type'              => 'text',
					'label_description' => __( 'Testimonial Author Name', 'gutenberg-blocks-with-metabox' ),
				],
				[
					'name' => __( 'Author Title', 'gutenberg-blocks-with-metabox' ),
					'id'   => $prefix . 'testimonial_author_title',
					'type' => 'text',
				],
				[
					'name' => __( 'Author Image', 'gutenberg-blocks-with-metabox' ),
					'id'   => $prefix . 'testimonial_author_image',
					'type' => 'single_image',
				],
			],
		];

		$meta_boxes[] = [
			'title'           => 'Hero Content',
			'id'              => 'hero-content',
			'description'     => 'A custom hero content block',
			'type'            => 'block',
			'icon'            => 'awards',
			'category'        => 'layout',
			'context'         => 'side',
			'render_template' => plugin_dir_path( __FILE__ ) . '/templates/hero/template.php',
			'enqueue_style'   => plugins_url( '/templates/hero/style.css', __FILE__ ),
			'supports'        => [
				'align' => [ 'wide', 'full' ],
			],
			'fields'          => [
				[
					'type' => 'single_image',
					'id'   => 'image',
					'name' => 'Image',
				],
				[
					'type' => 'text',
					'id'   => 'title',
					'name' => 'Title',
				],
				[
					'type' => 'text',
					'id'   => 'subtitle',
					'name' => 'Subtitle',
				],
				[
					'type' => 'textarea',
					'id'   => 'content',
					'name' => 'Content',
				],
				[
					'type' => 'single_image',
					'id'   => 'signature',
					'name' => 'Signature',
				],
				[
					'type' => 'text',
					'id'   => 'button_text',
					'name' => 'Button Text',
				],
				[
					'type' => 'text',
					'id'   => 'button_url',
					'name' => 'Button URL',
				],
				[
					'type' => 'color',
					'id'   => 'background_color',
					'name' => 'Background Color',
				],
			],
		];

		return $meta_boxes;
	}


	/**
	 * Testimonial Block Callback function
	 */
	public function testimonial_block_cb( $attributes, $is_preview = false, $post_id = null ) {

		// Fields data.
		if ( empty( $attributes['data'] ) ) {
			return;
		}

		// Unique HTML ID if available.
		$id = 'testimonial-' . ( $attributes['id'] ?? '' );
		if ( ! empty( $attributes['anchor'] ) ) {
			$id = $attributes['anchor'];
		}

		// Custom CSS class name.
		$class = 'testimonial-list ' . ( $attributes['className'] ?? '' );
		if ( ! empty( $attributes['align'] ) ) {
			$class .= " align{$attributes['align']}";
		}
		?>

        <div id="<?= $id ?>" class="<?= $class ?>">
            <section>

				<?php
				$image = mb_get_block_field( 'mb_testimonial_author_image' );
				if ( ! empty( $image ) ) {
					printf(
						'<div class="top-box"></div><img src="%s" alt="%s" />',
						$image['full_url'],
						$image['alt']
					);
				}
				?>
                <div class="bottom-box">
                    <blockquote>
                        <p><?= mb_get_block_field( 'mb_testimonial_text' ) ?></p>
                    </blockquote>
                    <div class="test-details">
                        <p>
                            <span><?= mb_get_block_field( 'mb_testimonial_author_name' ) ?></span><br><small><?= mb_get_block_field( 'mb_testimonial_author_title' ) ?></small>
                        </p>
                    </div>
                </div>
            </section>
        </div>

		<?php


	}

}
