<?php
require "config.php";
//$conn = Database::getInstance(); Class Database for connecting.
?>
<!DOCTYPE html>
<html>
<head>
  <title>Mobile store</title>
  <link href="https://fonts.googleapis.com/css?family=Oswald:300,700|Varela+Round" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div id="wrapper">
	
		<nav><!-- Navigation bar -->
		  <ul class="nav">
			<li><a href="./">Naslovna</a></li>
			<li><a href="?page=2">Proizvodi</a></li>
			<li><a href="?page=4">Faq</a></li>
			<li><a href="?page=5">Kontakt</a></li>
			<li><a href="?page=3">Korpa</a></li>
		  </ul>
		</nav>
		
		<header><!-- HEADER -->
			<div class="welcome">
				<a href="index.php"><img src="img/logo.png" alt="Mobile" /></a>
				<h3>Dobro dosli u prodavnicu telefona</h3>
				<p>Nudimo iskljucivo nove proizvode</p>
			</div>
		</header><!-- END OF HEADER -->
		
		<aside id="sidebar">
		
			<article class="block">
				<h3>Pretraga</h3>
			<div class="form">
			  <form action="" method="GET"><!-- Form for searching products -->
			  	<input type="hidden" name="page" value="6" />
			  	<select name="cat">
			  		<option value=""  selected="selected">Modeli</option>
			  		<?php
			  		// Instantiate class Model and calling method getAll from database
			  		$models = Model::getAll();
			  		foreach($models as $rw){ ?>
						<option value="<?php echo $rw->id ?>"><?php echo $rw->name_model; ?></option>
					<?php } ?>
				</select><br /><br />
					<input type="text" name="q" placeholder="Mobilni telefoni..." />
					<input type="submit" value="Trazi" />
			  </form>
			<div/>

			</article>
			
			<article class="block">
			
				<h4>Modeli</h4>
					<table>
			<?php
				foreach($models as $rw){
			?>
				<tr>
				  <td><a href="index.php?page=2&pid=<?php echo $rw->id; ?>"><?php echo $rw->name_model; ?></a></td>
				</tr>
			<?php
				}
			?>
					</table>
			
			</article>
			
		</aside>
		
		<div id="main">
		
			<?php
			// Making array with dynamic pages
				$default_page = (isset($_GET['page']))?$_GET['page']:1;
				
				$pages = array(
					"1"=>"main.php",
					"2"=>"product.php",
					"3"=>"card.php",
					"4"=>"faq.php",
					"5"=>"contact.php",
					"6"=>"search.php",
					"7"=>"buy.php",
					"8"=>"buyrelated.php",
					"9"=>"checkout.php"
				);
				
				include "modules/" . $pages[$default_page];
			?>
			
			
			
		</div>
		
		<div id="footer">
		
		<h5><em>Copyright &copy; Mobilestore</em></h5>
		
		</div>
	
	</div> <!-- End of wrap div -->

</body>
</html>