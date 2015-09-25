<?php

class Widget_Intro extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array(
                'classname'     => 'intro-widget',
                'description'   => __( "Display a introduction")
            );
        parent::__construct( 'intro-widget', __('Intro Widget'), $widget_ops );
    }

    function form( $instance )
    {
        $title     	= esc_attr( isset( $instance['title'] ) ? $instance['title'] : '' );
        $content   	= esc_attr( isset( $instance['content'] ) ? $instance['content'] : '' );
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
        
<?php
    }

    function widget( $args, $instance )
    {
        extract($args);

        $title     	= $instance['title'];
        $content   	= $instance['content'];

        echo $before_widget;

?>
        <section class="introduction white-bg section-txt">
        	<div class="wrap">
        		<div class="contain">

	            <?php if( !empty( $title ) ) : ?>
	                <h2><?php echo $title; ?></h2>
	            <?php endif; ?>
	
	            <?php if( !empty( $content ) ) : ?>
	                <?php echo $content; ?>
	            <?php endif; ?>

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
		
        return $instance;
    }
}

?>