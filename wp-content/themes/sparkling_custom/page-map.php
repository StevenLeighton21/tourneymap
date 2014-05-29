<?php
/**
 * Template name: Map Template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sparkling
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<!-- 		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					// get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?> -->
				<div class="container">
			    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
				   
				    <script type="text/javascript"
				      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeUevYX8rOl_W_P9jxKZz7G9eiTqFdvj8">
				    </script>
				    <script type="text/javascript">
				    
				      function initialize() {
				        var mapOptions = {
				          center: new google.maps.LatLng(51.0, 0.0),
				          zoom: 8
				        };
				        var map = new google.maps.Map(document.getElementById("map-canvas"),
				            mapOptions);
				      }
				      google.maps.event.addDomListener(window, 'load', initialize);
				    </script>

				    <div id="map-canvas"/>
				    </div>


<!-- 				    var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
var mapOptions = {
  zoom: 4,
  center: myLatlng
}
var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

// To add the marker to the map, use the 'map' property
var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    title:"Hello World!"
});
 -->

			<section id="events">
				<div class="container">
				<?php
				    $args = array(
				      'post_type' => 'event',
				    );
				    $events = new WP_Query( $args );
				    //var_dump($events);
				    if( $events->have_posts() ) {
						 while ( $events->have_posts() ) : $events->the_post(); 
	
				        ?>
				          <h1><?php the_title() ?></h1>
				          <div class='content'>
				            <?php the_content();
				             $postcode = get_post_meta( get_the_ID(), 'event_location_postcode', true );
				             $latlng = geocode_pc($postcode);
				             echo $postcode;
				            // echo $latlng['latitude'];
				             //echo $latlng['longitude'];
				             // print_r($latlng);
				             ?>

				             <script type="text/javascript" onLoad="addMarker()">

								// var myLatlng = new google.maps.LatLng(<?php echo $latlng['latitude'];?> , <?php echo $latlng['longitude'];?>);
								// //alert(myLatlng);
								// // To add the marker to the map, use the 'map' property
								// var marker = new google.maps.Marker({
								//     position: myLatlng,
								//     title:"Hello World!"
								// });

								// marker.setMap(map);

								function addMarker(){
								var myLatlng = new google.maps.LatLng(<?php echo $latlng['latitude'];?> , <?php echo $latlng['longitude'];?>);
								//alert(myLatlng);
								// To add the marker to the map, use the 'map' property
								var marker = new google.maps.Marker({
								    position: myLatlng,
								    title:"Hello World!"
								});
								alert("bp 1");
								marker.setMap(map);
								alert("bp 2");
								}
							
				             </script>
				            <!--  <div id="evenloader" onLoad="addMarker()"/> -->
				          </div>
				        <?php endwhile;
				      }
				    
				    else {
				      echo 'Oh ohm no events!';
				    }
				  ?>
  				</div>
			</section>

			<?php sparkling_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>