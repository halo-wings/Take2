<?php
$langue = 'fr';
$section = "research";
$sous_section = "overview";
$title = "";
$meta_description = "";
$meta_keywords = "";

include($_SERVER['DOCUMENT_ROOT']."/".$langue."/inc/header.php");
?>
	<div class="content">
		<div class="left">
			<img src="../../images/img_gauche_overview.jpg" alt="Overview" />
			<a href="../recherche/projets.php" id="projects" title="Projets">Projets</a>
			<a href="../recherche/publications.php" id="publications" title="Publications">Publications</a>
		</div>
		<div class="right">
			<div class="container_sous_menu">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/menu.php'); ?>
			</div>
			<section>
				<div class="wrapper">
				<h1>R&eacute;sum&eacute;</h1>
				<p>Notre&nbsp;recherche en&nbsp;optique nonlin&eacute;aire comprend la fabrication de&nbsp;dispositifs pour le&nbsp;traitement de signal&nbsp;nonlin&eacute;aire&nbsp;tels que des sources laser,&nbsp;convertisseurs de&nbsp;longueur d'onde, et&nbsp;dispositifs pour les communications optiques,&nbsp;ainsi que la fabrication de&nbsp;m&eacute;dia&nbsp;hautement nonlin&eacute;aires compacts et &agrave;&nbsp;faible consommation de puissance.</p>
				</div>
			</section>
			
<?php
include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/footer.php');
?>