<?php
$langue = 'fr';
$section = "research";
$sous_section = "support";
$title = "";
$meta_description = "";
$meta_keywords = "";

include($_SERVER['DOCUMENT_ROOT']."/".$langue."/inc/header.php");
?>
	<div class="content">
		<div class="left">
			<img src="../../images/img_gauche_support.jpg" alt="Soutien" />
			<a href="../recherche/projets.php" id="projects" title="Projets">Projets</a>
			<a href="../recherche/publications.php" id="publications" title="Publications">Publications</a>
		</div>
		<div class="right">
			<div class="container_sous_menu">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/menu.php'); ?>
			</div>
			<section>
				<div class="wrapper">
				<h1>Soutien</h1>
				<p>Cette recherche a &eacute;t&eacute; rendue possible gr&acirc;ce au support financier des organisations suivantes :</p>
				<img src="../../images/logos-support.gif" alt="Les organisations qui soutiennent le groupe de recherche Martin Rochette" />
				</div>
			</section>
			
<?php
include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/footer.php');
?>