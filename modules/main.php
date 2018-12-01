<a href="#"><img src="img/1.jpg" alt="Phones" width="800px" /></a>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at nibh egestas, consectetur eros eget, tempus orci. Sed aliquam, leo non egestas dictum, neque felis finibus nunc, vitae elementum nisl lacus eget nulla. Maecenas ac commodo risus. Quisque nec lacinia nulla. Aenean mollis velit vel sollicitudin aliquet. Aenean viverra nisl massa, a feugiat nulla faucibus id. Donec orci erat, pulvinar ut laoreet sed, feugiat vel mi. Etiam commodo augue quis ipsum varius, ac iaculis libero tempus.

			Sed consectetur risus non odio tempus blandit. Praesent lobortis libero sed odio blandit vehicula. Fusce interdum auctor erat, et ornare neque condimentum eget. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras felis urna, tristique sed risus et, malesuada varius erat. Pellentesque id ultrices diam. Maecenas a condimentum augue, non pellentesque purus.</p>
			
			<h4 class="center">Najnoviji Modeli</h4>
			
			<?php
			//$query = mysqli_query($conn,"select * from related_products");
			$related_products = Related::getAll();
				foreach($related_products as $rw){
			?>
			
			
			
			<div class="product">
			
				<h5><?php echo $rw->name_brand; ?></h5>
		
				<p><?php echo $rw->name_model; ?></p>
		
				<img src="img/<?php echo $rw->image; ?>" width="180px" height="160px"/>
		
				<p>Cena:<?php echo $rw->price; ?>€</p>
	
				<a href="?page=8&pid=<?php echo $rw->id; ?>">Kupi sada</a>
	
			</div>
			
			<?php
			}
			?>
			<div class="products">
			
			</div>	