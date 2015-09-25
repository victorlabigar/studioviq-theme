<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Author: Vludio
 * Author URI: http://vludio.nl/
 * 
 *
 * Template Name: Diensten
 *	
 *	
 */ ?>

<?php get_header(); ?>


<section class="white-bg section-txt paddingTop100 paddingBottom40">
	<div class="wrap">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="contain">
			<!-- <h2><?php the_title(); ?></h2> -->
			<?php the_content(); ?>
		</div>
	</div>
	<?php endwhile; ?>
</section> <!-- end introduction -->


<!--
<section class="clients-wrap grey-bg section-txt">
	<div class="wrap">
		<div class="centered-text">
			<h2>Werkwijze</h2>
		</div>
	</div>
	
	<div id="werkwijze-slider" class="owl-carousel owl-theme">
		<div class="item">
			<div class="media-wrap">
				<img src="<?php echo get_template_directory_uri(); ?>/images/help-with-improve.png" alt="" />
			</div>
			<div class="wayofwork-wrap">
				<p>
					<strong>1. Kennismaking</strong><br />
					Vludio nodigt jou uit voor een kop koffie en een kennismakingsgesprek. Alle wensen worden in kaart gebracht en al je vragen worden beantwoord. Samen werken we aan een plan om uw website zo goed mogelijk bij uw doelgroep aan te sluiten.  
				</p>
			</div>
			<div class="clearfix"></div>
		</div>
		
		<div class="item">
			<div class="media-wrap">
				<img src="<?php echo get_template_directory_uri(); ?>/images/help-with-improve.png" alt="" />
			</div>
			<div class="wayofwork-wrap">
				<p>
					<strong>2. Debriefing / Research</strong><br />
					Vludio gaat aan de slag! Alle wensen en eisen voor jouw website worden op papier gezet en  binnen 48 uur ontvang je een vrijblijvende offerte die bestaat uit een debriefing, een tijdsplanning en een kostenoverzicht. 
				</p>
			</div>
			<div class="clearfix"></div>
		</div> 
		
		<div class="item">
			<div class="media-wrap">
				<img src="<?php echo get_template_directory_uri(); ?>/images/help-with-improve.png" alt="" />
			</div>
			<div class="wayofwork-wrap">
				<p>
					<strong>3. Content verzamelen</strong> <br />
					Nadat wij jouw akkoord en een aanbetaling hebben ontvangen gaan we van start met het verzamelen van content, zoals beeldmateriaal en copy (teksten). U ontvangt van ons een copydoc waarin precies staat vermeld wat voor teksten op jouw website moeten komen en welke structuur en aanpak we aanhouden. Overigens is het ook mogelijk om de realisatie van webteksten en beeldmateriaal uit te besteden. Vludio heeft een breed netwerk en werkt nauw samen met ervaren copywriters en fotografen die weten hoe je met tekst en beeld de achtergrond en visie van jouw boodschap kan versterken.
				</p>
			</div>
			<div class="clearfix"></div>
		</div>
		
		<div class="item">
			<div class="media-wrap">
				<img src="<?php echo get_template_directory_uri(); ?>/images/help-with-improve.png" alt="" />
			</div>
			<div class="wayofwork-wrap">
				<p>
					<strong>4. Schetsen / ontwerpen</strong> <br />
					Vludio start met het schetsen van de website. Als alles op papier staat zullen wij ze op interactieve wijze aan jou presenteren, zodat we er direct een juist beleving aan kunnen koppelen. Zodra de schetsen naar wens zijn, begint de de realisatie van de website.
				</p>
			</div>
		</div> 
		
		<div class="item">
			<div class="media-wrap">
				<img src="<?php echo get_template_directory_uri(); ?>/images/help-with-improve.png" alt="" />
			</div>
			<div class="wayofwork-wrap">
				<p>
					<strong>5. Realiseren en testen</strong> <br />
					Nu begint het echte werk! De ontwerpen worden vertaald naar een functioneel staande website en de webteksten en beeldmateriaal worden toegevoegd. Tijdens dit proces heeft u te allen tijde toegang tot een testomgeving om de voortgang te bekijken.
				</p>
			</div>
		</div> 
		
		<div class="item">
			<div class="media-wrap">
				<img src="<?php echo get_template_directory_uri(); ?>/images/help-with-improve.png" alt="" />
			</div>
			<div class="wayofwork-wrap">
				<p>
					<strong>6. Get ready for the launch!</strong> <br />
					Bij de oplevering van de website biedt Vludio jou een korte cursus aan waarin we het beheer van de website nader zullen toelichten. Staat alles op zijn plek? Dan is jouw website klaar om live te gaan en kan de promotie van start gaan. 
				</p>
			</div>
		</div> 
	</div>
	
</section>
--> <!-- end latest-news -->


<!-- PAGE SIDEBAR -->
<?php if( dynamic_sidebar('page_sidebar') ); ?>




<?php get_footer(); ?>