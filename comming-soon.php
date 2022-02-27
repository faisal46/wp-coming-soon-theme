<?php
/**
* Template Name: Comming Soon Home
*/

get_header();

$email_placeholder = get_post_meta( get_the_ID(), 'email_placeholder', true );
$button_label      = get_post_meta( get_the_ID(), 'button_label', true );
$input_label       = get_post_meta( get_the_ID(), 'input_label', true );

?>

	<body>
	<div class="fh5co-loader"></div>
	<?php
    while( have_posts() ){
      the_post();
    ?>
	<aside id="fh5co-aside" role="sidebar" class="text-center home-banner">
		<h1 id="fh5co-logo">
            <a href="<?php echo site_url(); ?>">
                <?php bloginfo( 'name' ); ?>
            </a>
        </h1>
	</aside>

	<div id="fh5co-main-content">
		<div class="dt js-dt">
			<div class="dtc js-dtc">
				<div class="simply-countdown-one animate-box" data-animate-effect="fadeInUp"></div>

				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-lg-7">
								<div class="fh5co-intro animate-box">
									<h2><?php the_title(); ?></h2>
                                    <?php the_content(); ?>								
                                </div>
							</div>
							
							<div class="col-lg-7 animate-box">
								<form action="#" id="fh5co-subscribe">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="<?php echo esc_attr( $email_placeholder ); ?>">
										<input type="submit" value="<?php echo esc_attr( $button_label ); ?>" class="btn btn-primary">
										<p class="tip">
											<?php echo esc_html( $input_label ); ?>
										</p>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
					
			</div>
		</div>
		<?php } ?>
		<div id="fh5co-footer">
			<div class="row">
				<div class="col-md-6">
					<?php
                     if ( is_active_sidebar( 'footer-left' ) ) {
                         dynamic_sidebar( 'footer-left' );
                     }
                    ?>
				</div>
				<div class="col-md-6 fh5co-copyright">
                <?php
                     if ( is_active_sidebar( 'footer-right' ) ) {
                         dynamic_sidebar( 'footer-right' );
                     }
                    ?>
				</div>
			</div>
		</div>
		
	</div>
   

   <?php get_footer(); ?>

