<?php 
	$sqlslideshow = "select * from " . TABLE_SLIDERSHOW . " where status = 1";
	$stmt = $conn->prepare($sqlslideshow);
	$stmt->execute();
	$slides = $stmt->fetchAll();
 ?>
 <div class="container-fluid">
 		<div class="row slide">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			   <ol class="carousel-indicators">
			   	<?php 
				$count = 0;
				foreach ($slides as $slide): 
					$act = $count == 0 ? "active" : "";						
				?>
					<li data-target="#myCarousel" data-slide-to="<?= $count?>" class="<?= $act ?>"></li>
				<?php 
					$count++;
					endforeach 
				?>
			  </ol>
			  <div class="carousel-inner">
			  	<?php 
				$count = 0;
				foreach ($slides as $slide): 
					$act = $count == 0 ? "active" : "";						
				?>
					<div class="carousel-item <?= $act?>">
						<img class="d-block w-100" src="<?= $slide['image']?>">
					</div>
					
				<?php 
					$count++;
					endforeach 
				?>
			  </div>
			  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
 	</div>
 