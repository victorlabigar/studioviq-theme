<?php

class Widget_Green extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array(
                'classname'     => 'green-widget',
                'description'   => __( "Display some content + buttons")
            );
        parent::__construct( 'green-widget', __('Green Widget'), $widget_ops );
    }

    function form( $instance )
    {
        $title     	= esc_attr( isset( $instance['title'] ) ? $instance['title'] : '' );
        $content   	= esc_attr( isset( $instance['content'] ) ? $instance['content'] : '' );
        $linkTitle 	= esc_attr( isset( $instance['link-title'] ) ? $instance['link-title'] : '' );
        $url       	= esc_attr( isset( $instance['url'] ) ? $instance['url'] : '' );
        $linkTitle2 = esc_attr( isset( $instance['link-title2'] ) ? $instance['link-title2'] : '' );
        $url2       = esc_attr( isset( $instance['url2'] ) ? $instance['url2'] : '' );
?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
           <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content:' ); ?></label>
           <textarea class="widefat" rows="4" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" ><?php echo $content; ?></textarea>
            
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'link-title' ); ?>"><?php _e( 'Button label 1:' ); ?>
                <input class="widefat" id="<?php echo $this->get_field_id( 'link-title' ); ?>" name="<?php echo $this->get_field_name( 'link-title' ); ?>" type="text" value="<?php echo $linkTitle; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Button link 1:' ); ?>
                <input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo $url; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'link-title2' ); ?>"><?php _e( 'Button label 2:' ); ?>
                <input class="widefat" id="<?php echo $this->get_field_id( 'link-title2' ); ?>" name="<?php echo $this->get_field_name( 'link-title2' ); ?>" type="text" value="<?php echo $linkTitle2; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'url2' ); ?>"><?php _e( 'Button link 2:' ); ?>
                <input class="widefat" id="<?php echo $this->get_field_id( 'url2' ); ?>" name="<?php echo $this->get_field_name( 'url2' ); ?>" type="text" value="<?php echo $url2; ?>" />
            </label>
        </p>
<?php
    }

    function widget( $args, $instance )
    {
        extract($args);

        $title     	= $instance['title'];
        $content   	= $instance['content'];
        $linkTitle 	= $instance['link-title'];
				$url       	= $instance['url'];
				$linkTitle2 = $instance['link-title2'];
				$url2       = $instance['url2'];

        echo $before_widget;

?>
        <section class="green-bg section-txt">
        	<div class="wrap">
        		<div class="centered-text">

	            <?php if( !empty( $title ) ) : ?>
	                <h2><?php echo $title; ?></h2>
	            <?php endif; ?>
	
	            <?php if( !empty( $content ) ) : ?>
	                <?php echo $content; ?>
	            <?php endif; ?>
							
							<ul class="contact-options-wrap">
								<?php if( !empty( $url ) && !empty($linkTitle) ) : ?>
								<li><a href="<?php echo $url; ?>" class="calltoaction-btn"><?php echo $linkTitle ?></a></li>
								<?php endif; ?>
								
								<?php if( !empty( $url2 ) && !empty($linkTitle2) ) : ?>
								<li><a href="<?php echo $url2; ?>" class="calltoaction-btn"><?php echo $linkTitle2 ?></a></li>
								<?php endif; ?>
							</ul>

						</div>
        	</div>
        </section>
<?php

        echo $after_widget;
    }

    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;

        $instance['title']      	= strip_tags( $new_instance['title'] );
        $instance['content']    	= $new_instance['content'];
        $instance['link-title'] 	= strip_tags( $new_instance['link-title'] );
				$instance['url']        	= strip_tags( $new_instance['url'] );
				$instance['link-title2'] 	= strip_tags( $new_instance['link-title2'] );
				$instance['url2']        	= strip_tags( $new_instance['url2'] );
		
        return $instance;
    }
}

?>