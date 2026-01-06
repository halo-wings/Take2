<?php
$langue = 'en';
$section = "openings";
$title = "";
$meta_description = "";
$meta_keywords = "";

include($_SERVER['DOCUMENT_ROOT']."/".$langue."/inc/header.php");
?>
	<div class="content">
		<div class="left">
			<img src="../../images/img_gauche_openings.jpg" alt="Openings" />
			<a href="/en/research/projects.php" id="projects" title="Projects">Projects</a>
			<a href="/en/research/publications.php" id="publications" title="Publications">Publications</a>
		</div>
		<div class="right">
			<div class="container_sous_menu" style="display: none;">
>
				<?php include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/menu.php'); ?>
			</div>
			<section>
				<div class="wrapper">
				<?php 
				// TEXTE CARRIÈRES
				$texte = ($langue == "en") ? 'texteA': 'texte';
				$s_sql = "select *, ".$texte." as texte FROM textpool WHERE idTextpool = 2";
				//echo $s_sql;
				$result = SQL($s_sql);
				$row = mysql_fetch_assoc($result);
				echo $row['texte']."<br />";
				?>
				</div>
			</section>
			
<?php
include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/footer.php');
?>