<?php
$langue = 'en';
$section = "research";
$sous_section = "openings";
$title = "";
$meta_description = "";
$meta_keywords = "";

include($_SERVER['DOCUMENT_ROOT']."/".$langue."/inc/header.php");
?>
	<div class="content">
		<div class="left">
			<img src="../../images/img_gauche_openings.jpg" alt="Openings" />
			<a href="projects.php" id="projects" title="Projects">Projects</a>
			<a href="publications.php" id="publications" title="Publications">Publications</a>
		</div>
		<div class="right">
			<div class="container_sous_menu">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/menu.php'); ?>
			</div>
			<section>
				<div class="wrapper">
				<h1>Openings</h1>
				<p>New research positions are regularly opened to candidates interested in making an MSc, MEng, and/or a PhD in nonlinear photonics. Research in this field requires abilities with physical laboratory work, theoretical development and numerical simulations, in addition to succeed in graduated courses. Positions are also opened periodically to post-doctoral researchers.</p>
				<p>Send your CV and recent transcripts to <a href="mailto:martin.rochette@mcgill.ca">martin.rochette@mcgill.ca</a>.  </p>
				<!--<p><a href="http://www.mcgill.ca/community/thingstodo" target="_blank" title="Things to do at McGill">Take a look at the life quality</a> you can get at McGill.</p>-->
				</div>
			</section>
			
<?php
include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/footer.php');
?>
