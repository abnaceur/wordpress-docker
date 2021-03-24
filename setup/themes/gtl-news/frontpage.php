<?php
/*
*	Template Name: Gtl News
*
*/	
	get_header();
?>


	<?php
          if( is_active_sidebar( 'sidebar-front-highlight' ) ) :
              dynamic_sidebar( 'sidebar-front-highlight' );
          endif;  
      ?>

     

      <?php  if( is_active_sidebar( 'sidebar-front-secondary' ) || is_active_sidebar( 'sidebar-front-sidebar' ) ) : ?>
   <section class="wrapper wrapper-main-gtl-mag-content">
	<div class="container">
		<div class="row">
			<!-- Main-panel Content -->
			<div class="col-xs-12 col-sm-8 col-md-8">  
				<?php
		          if( is_active_sidebar( 'sidebar-front-secondary' ) ) :
		              dynamic_sidebar( 'sidebar-front-secondary' );
		          endif;  
		      ?>
			</div>

			<div class="col-xs-12 col-sm-4 col-md-4">  
				<?php
		          if( is_active_sidebar( 'sidebar-front-sidebar' ) ) :
		              dynamic_sidebar( 'sidebar-front-sidebar' );
		          endif;  
		      ?>
			</div>
			</div>
		</div>
	</section>
	<?php endif;?>
	

<?php get_footer(); ?>

<script>
	$(document.ready(function(){
			$(document).keydown(
			    function(e)
			    {    
			        if (e.keyCode == 40) {      
			          if($('li').is(':focus')){
			            $("li:focus").next().focus();
			          }
			          else{
			            $("li:first-child").focus();
			          }
			           
			        }
			        else if (e.keyCode == 38) {      
			          if($('li').is(':focus')){
			            $("li:focus").prev().focus();
			          }
			          else{
			            $("li:first-child").focus();
			          }
			        }
			    }
			);
	});
</script>