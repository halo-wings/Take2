<?php
$langue = 'fr';
$section = "research";
$sous_section = "publications";

include('inc/header.php');
?>
	<div class="content">
		<div class="left">
			<img src="images/img_gauche_01.jpg" border=0 />
			<br /><br /><br />
			<a href="" id="publications">Our publications</a>
		</div>
		<div class="right">
			<div style="height: 29px;">
				<div class="container_sous_menu">
					<?php include('inc/menu.php'); ?>
				</div>
			</div>
			<section>
				
				<h1>Our publications</h1>
				
				<?php 
				$s_sql = "select p.*, c.nom_".$langue." as nom_cat, p.titre_".$langue." as titre, p.url_".$langue." as url, p.detail_".$langue." as detail, p.pdf_".$langue." as pdf FROM publications as p JOIN categories as c ON p.categorie = c.id WHERE p.etat = 1 ORDER BY p.date_publication desc";
				//echo $s_sql;
				$result = SQL($s_sql);
				while($row = mysql_fetch_assoc($result))
				{
					$cat 	= stripslashes($row['nom_cat']);
					$titre 	= stripslashes($row['titre']);
					$detail = stripslashes($row['detail']);
					$url 	= stripslashes($row['url']);
					$pdf 	= stripslashes($row['pdf']);
					?>
					<h2><?php echo utf8_encode($cat); ?></h2>
					<strong><?php echo $titre; ?></strong><br />
					<?php echo $detail; ?>
					<?php 
					if ($url != "")
					{
						$u = ((strpos($url, 'http://') !== false || strpos($url, 'https://') !== false) ? $url: 'http://'.$url);
						?>
						<a href="<?php echo $u; ?>" target="_blank">View URL</a>
						<br />
						<?php
					}
					if ($pdf != "")
					{
						?>
						<a href="pdf/<?php echo $pdf; ?>" target="_blank">View PDF</a>
						<br />
						<?php
					}
					?><br /><?php
				}
				?>
				
			</section>
			
<?php
include('inc/footer.php');
?>