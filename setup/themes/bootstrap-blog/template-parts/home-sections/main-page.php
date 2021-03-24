<?php
?>
<div class="content-area">
  <div class="container">
    <div class="row">
      <div class="">
				<?php
				while ( have_posts() ) {
					the_post();
					the_content();
				}
				 wp_reset_postdata();
				?>
      </div>
    </div>
  </div>
</div>