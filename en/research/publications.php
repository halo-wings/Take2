<?php
$langue = 'en';
$section = "research";
$sous_section = "publications";
$title = "";
$meta_description = "";
$meta_keywords = "";

include($_SERVER['DOCUMENT_ROOT']."/".$langue."/inc/header.php");
?>
	<div class="content">
		<div class="left">
			<img src="../../images/img_gauche_publications.jpg" alt="Our publications" />
			<a href="projects.php" id="projects" title="Projects">Projects</a>
		</div>
		<div class="right">
			<div class="container_sous_menu">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/menu.php'); ?>
			</div>
			<section>
				<div class="wrapper">
				<h1>Publications and intellectual property since 2008</h1>
				<ul>
					<li><a href="#Publications in Refereed Journals" title="Journals">Journals</a></li>
					<li><a href="#Publications in Refereed Conference Proceedings" title="Conferences">Conferences</a></li>
					<li><a href="#Contribution to practical applications" title="Practical applications">Practical applications</a></li>
				</ul>
				
				
				<?php 
				// PUBLICATIONS
				$s_sql = "select p.*, c.nom_".$langue." as nom_cat, p.titre_".$langue." as titre, p.url_".$langue." as url, p.detail_".$langue." as detail, p.pdf_".$langue." as pdf FROM publications as p JOIN categories as c ON p.categorie = c.id WHERE p.etat = 1 ORDER BY p.categorie, p.date_publication desc";
				//echo $s_sql;
				$result = SQL($s_sql);
				$ancien_cat = "";
				while($row = mysql_fetch_assoc($result))
				{
					$cat 	= stripslashes($row['nom_cat']);
					$titre 	= stripslashes($row['titre']);
					$detail = stripslashes($row['detail']);
					$url 	= stripslashes($row['url']);
					$pdf 	= stripslashes($row['pdf']);
					
					if ($ancien_cat != $cat)
					{
						?>
						<h2 id="<?php echo utf8_encode($cat); ?>"><?php echo utf8_encode($cat); ?></h2>
						<?php
						$ancien_cat = $cat;
					}
					?>
					<strong><?php echo $titre; ?></strong><br />
					<?php echo $detail; ?>
					<?php 
					if ($url != "")
					{
						$u = ((strpos($url, 'http://') !== false || strpos($url, 'https://') !== false) ? $url: 'http://'.$url);
						?>
						<a href="<?php echo $u; ?>" target="_blank">[&nbsp;View&nbsp;website&nbsp;]</a>&nbsp;&nbsp;&nbsp;&nbsp;
						
						<?php
					}
					if ($pdf != "")
					{
						?>
						<a href="/pdf/<?php echo $pdf; ?>" target="_blank">[&nbsp;View&nbsp;PDF&nbsp;]</a>
						
						<?php
					}
					?><br /><br /><?php
				}
				?>
				</div>
			</section>
			
<?php
include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/footer.php');
?>