<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package areavoices
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<h1 id="nativo-title" class="entry-title"> </h1>
	</header>
	<!-- .entry-header -->

	<!--<div id="nativo-content" class="entry-content">-->
		<?php
		$post_id = get_the_ID();

		# Client Term Meta
		// NOTE: update to get_term_meta when ACF v5.5 is released
		$client_term_id = get_post_meta( $post_id, 'marketplace_campaign_client', true );
		$campaign_client = get_term( $client_term_id, 'marketplace_client' );
		$campaign_client_name = $campaign_client->name;
		//$client_term_meta = get_term_meta( $client_term_id );
		$client_id = get_option( "marketplace_client_{$client_term_id}_marketplace_client_id" );
		$client_logo_id = get_option( "marketplace_client_{$client_term_id}_marketplace_client_logo" );
		$client_logo_url = wp_get_attachment_image_src( $client_logo_id, 'full' )[0];
		$client_phone = get_option( "marketplace_client_{$client_term_id}_marketplace_client_phone" );
		$client_website = get_option( "marketplace_client_{$client_term_id}_marketplace_client_website" );
		$client_street_address = get_option( "marketplace_client_{$client_term_id}_marketplace_client_street_address" );
		$client_city = get_option( "marketplace_client_{$client_term_id}_marketplace_client_city" );
		$client_state = get_option( "marketplace_client_{$client_term_id}_marketplace_client_state" );
		$client_zip = get_option( "marketplace_client_{$client_term_id}_marketplace_client_zip" );
		$client_address = $client_street_address . $client_city . $client_state . $client_zip;

		# Campaign Meta
		$campaign_start_date = get_post_meta( $post_id, 'marketplace_campaign_start_date', true );
		$campaign_end_date = get_post_meta( $post_id, 'marketplace_campaign_end_date', true );
		$campaign_tagline = get_post_meta( $post_id, 'marketplace_campaign_tagline', true );
		$campaign_slug = get_post_meta( $post_id, 'marketplace_campaign_slug', true );
		$campaign_details = get_post_meta( $post_id, 'marketplace_campaign_details', true );
		$campaign_content = get_post_meta( $post_id, 'marketplace_campaign_content', true );

		?>
		<div class="marketplace-campaign__title">
		<?php the_title( '<h1 class="marketplace-campaign__title">', '</h1>' ); ?>
		</div>
			<div class="marketplace-campaign__logo">
				<img src="<?php echo $client_logo_url; ?>" height="" width="">
			</div>

			<div class="marketplace-campaign__address">
				<div class="marketplace-campaign__client-name">
					<?php echo $campaign_client_name; ?>
				</div>
				<div class="marketplace-campaign__street-address">
					<?php if ( $client_address ) { ?>
					<div class="avicons avicon-map-marker"></div>
					<?php echo $client_street_address . ', ' . $client_city  . ', ' . $client_state . ' ' . $client_zip; ?>
					<?php } ?>
				</div>
				<div id="phone">
					<?php if ( $client_phone ) { ?>
					<div class="avicons avicon-phone"></div>
					<?php echo $client_phone; ?>
					<?php } ?>
				</div>
				<div class="marketplace-campaign__website">
					<?php if ( $client_website ) { ?>
						<div class="avicons avicon-link3"></div>
						<a href="<?php echo $client_website; ?>">Website&nbsp;</a>
					<?php } ?>
				</div>
			</div>



		<div class="marketplace-campaign__bottom
		<?php if ( $campaign_content ) { echo ' marketplace-campaign__has-content'; }?>">
			<div class="marketplace-campaign__tagline"><?php echo $campaign_tagline; ?></div>
			<div class="marketplace-campaign__details"><?php echo $campaign_details; ?></div>
		</div>

		<div class="marketplace-campaign__content"><?php echo $campaign_content; ?></div>

		<?php //the_content(); ?>
	<!--</div>--><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'areavoices' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
