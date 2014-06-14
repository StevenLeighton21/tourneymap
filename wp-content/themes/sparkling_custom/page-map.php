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
			  <div id="map-canvas"/>
			  </div>

	<script type="text/javascript">
		function centreMap(){
			var address = document.getElementById("userPostCode").value;
			var geocoder = new google.maps.Geocoder();
			geocoder.geocode( { 'address': address}, function(results, status) {
	      if (status == google.maps.GeocoderStatus.OK) {
		        map.setCenter(results[0].geometry.location);
		        map.setZoom(11);
		        //var marker = new google.maps.Marker({
	            //map: map,
	            //position: results[0].geometry.location
        //});
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
		}
	</script>

	<div class="container" id="map-controls">
	<form id="map-controls">
	<input type ="textarea" placeholder="Insert Postcode" id="userPostCode"/>
	<input type="button" id="setMap" onclick="centreMap()" value="Centre Map"/>
	</form>
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
					$postData = array();
				    $args = array(
				      'post_type' => 'event',
				    );
				    $events = new WP_Query( $args );
				    if( $events->have_posts() ) {
						 while ( $events->have_posts() ) : $events->the_post(); 
	
				        ?>
				          <h1><?php the_title() ?></h1>
				          <div class='content'>
				            <?php the_content();
				             $postcode = get_post_meta( get_the_ID(), 'event_location_postcode', true );
				             $lat = get_post_meta(get_the_ID(), 'event_location_lat', true);
				             $lng = get_post_meta(get_the_ID(), 'event_location_lng', true);
				             $locData = [
				             	'postcode' => $postcode,
				             	'lat' => $lat,
				             	'lng' => $lng,
				             	'id' => get_the_ID(),
				             	//'title' => the_title()
				             	];
				             array_push($postData, $locData);
				             echo "$postcode - ($lat) ($lng) ";
				             ?>
				          </div>
				        <?php endwhile;
				      }	    
				    else {
				      echo 'Sorry, no events were found!';
				    }
				 	 ?>
  				</div>
			</section>

			<?php sparkling_paging_nav(); ?>

				<div class="container">
			    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
				   
				    <script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeUevYX8rOl_W_P9jxKZz7G9eiTqFdvj8"></script>
				    <script type="text/javascript">
				    var map;
				      function initialize() {
				        var mapOptions = {
				          center: new google.maps.LatLng(51.0, 0.0),
				          zoom: 9
				        };
				          map = new google.maps.Map(document.getElementById("map-canvas"),
				            mapOptions);
				      
				      

				      <?php foreach ($postData as $key => $value) { ?>
				      	

						
						var myLatlng = new google.maps.LatLng(<?php echo $value['lng'];?> , <?php echo $value['lat'];?>);
					
						var marker = new google.maps.Marker({
						    position: myLatlng,
						    title: "HW",
						    //map:map
						});
						//alert("bp 1");
						marker.setMap(map);
						//alert("bp 2");
						

						//var add = addMarker();

						<?php } ?>
					}
					google.maps.event.addDomListener(window, 'load', initialize);


		             </script>
					
				  
				    </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>