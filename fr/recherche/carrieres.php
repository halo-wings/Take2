<?php
$langue = 'fr';
$section = "research";
$sous_section = "openings";
$title = "";
$meta_description = "";
$meta_keywords = "";

include($_SERVER['DOCUMENT_ROOT']."/".$langue."/inc/header.php");
?>
	<div class="content">
		<div class="left">
			<img src="../../images/img_gauche_openings.jpg" alt="Carri&egrave;res" />
			<a href="../recherche/projets.php" id="projects" title="Projets">Projets</a>
			<a href="../recherche/publications.php" id="publications" title="Publications">Publications</a>
		</div>
		<div class="right">
			<div class="container_sous_menu">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/menu.php'); ?>
			</div>
			<section>
				<div class="wrapper">
				<h1>Carri&egrave;res</h1>
				<p>De nouveaux&nbsp;postes sont offerts&nbsp;r&eacute;guli&egrave;rement pour des&nbsp;candidats int&eacute;ress&eacute;s &agrave; faire&nbsp;leur ma&icirc;trise et/ou leur doctorat en&nbsp;optique nonlin&eacute;aire. La&nbsp;recherche&nbsp;dans ce domaine requiert des aptitudes pour le travail de&nbsp;laboratoire physique, le&nbsp;d&eacute;veloppement &nbsp;th&eacute;orique et les simulations num&eacute;riques, en plus de&nbsp;r&eacute;ussir des&nbsp;cours gradu&eacute;s. Des&nbsp;postes sont &eacute;galement ouverts&nbsp;p&eacute;riodiquement aux&nbsp;stagiaires post-doctoraux.</p>
				<p>Faites parvenir vos CV et plus r&eacute;cents relev&eacute;s de notes &agrave; <a href="mailto:martin.rochette@mcgill.ca">martin.rochette@mcgill.ca</a>.  </p>
				<!--<p>Et profitez-en pour <a href="http://www.mcgill.ca/community/fr/loisirs-detente" target="_blank" title="Loisirs et d&eacute;tente &agrave; McGill">d&eacute;couvrir la qualit&eacute; de vie</a> qu'offre l'Universit&eacute; McGill!</p>-->
				</div>
			</section>
			
<?php
include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/footer.php');
?>