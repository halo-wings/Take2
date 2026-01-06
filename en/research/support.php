<?php
$langue = 'en';
$section = "research";
$sous_section = "support";
$title = "";
$meta_description = "";
$meta_keywords = "";

include($_SERVER['DOCUMENT_ROOT']."/".$langue."/inc/header.php");
?>
	<div class="content">
		<div class="left">
			<img src="../../images/img_gauche_support.jpg" alt="Support" />
			<a href="projects.php" id="projects" title="Projects">Projects</a>
			<a href="publications.php" id="publications" title="Publications">Publications</a>
		</div>
		<div class="right">
			<div class="container_sous_menu">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/menu.php'); ?>
			</div>
			<section>
				<div class="wrapper">
				<h1>Support</h1>
				<p>This research was achieved thanks to the financial support of the following organisations:</p>
				<img src="../../images/logos-support.gif" alt="Organisations that support Martin Rochette's research Group" />
				</div>
			</section>
			
<?php
include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/footer.php');
?>