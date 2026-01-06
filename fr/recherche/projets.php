<?php
$langue = 'fr';
$section = "research";
$sous_section = "projects";
$title = "";
$meta_description = "";
$meta_keywords = "";

include($_SERVER['DOCUMENT_ROOT']."/".$langue."/inc/header.php");
?>
<script>
$(document).ready(function(){
	$(".group1").colorbox({rel:'group1'});
	$(".group2").colorbox({rel:'group2'});
	$(".group3").colorbox({rel:'group3'});
	$(".group4").colorbox({rel:'group4'});
});
</script>

	<div class="content">
		<div class="left">
			<img src="../../images/img_gauche_projects.jpg" alt="Projets" />
			<a href="../recherche/publications.php" id="publications" title="Publications">Publications</a>
		</div>
		<div class="right">
			<div class="container_sous_menu">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/menu.php'); ?>
			</div>
			<section>
				<div class="wrapper">
				<h1>Projets</h1>
				
				<h2>Microfils&nbsp;en Chalcog&eacute;nure</h2>
				<p>Le&nbsp;microfil de&nbsp;chalcog&eacute;nure est un&nbsp;moteur de&nbsp;nonlin&eacute;arit&eacute; compact et versatile pour les applications&nbsp;telles&nbsp;que les lasers, la conversion en&nbsp;longueur d'onde, la commutation optique,&nbsp;l'amplification et les sources &agrave; supercontinuum. Nous&nbsp;d&eacute;veloppons la premi&egrave;re version&nbsp;pratique de&nbsp;microfil &nbsp;hautement nonlin&eacute;aire. Avec&nbsp;une longueur de&nbsp;l'ordre&nbsp;du&nbsp;centim&egrave;tre,&nbsp;ce dispositif &nbsp;poss&egrave;de&nbsp;le coefficient&nbsp;nonlin&eacute;aire le plus&nbsp;&eacute;lev&eacute;&nbsp;jamais atteint dans un&nbsp;verre avec&nbsp;&gamma;  = 185W -1m -1 et&nbsp;remplace &nbsp;&gt;1 km de fibre&nbsp;hautement&nbsp;nonlin&eacute;aire en&nbsp;verre de&nbsp;sillice commercialement disponible. Le&nbsp;microfil avec un&nbsp;diam&egrave;tre de&nbsp;l'ordre du micron&nbsp;est fait de&nbsp;verre chalcog&eacute;nure,&nbsp;il &nbsp;peut &nbsp;&ecirc;tre &nbsp;connectoris&eacute; &agrave; la fibre&nbsp;optique standard &agrave;&nbsp;l'aide d'une&nbsp;g&eacute;om&eacute;trie adiabatique,&nbsp;sa dispersion&nbsp;chromatique est ajustable &agrave;&nbsp;l'int&eacute;rieur d'une &nbsp;vaste &nbsp;plage de&nbsp;normale to anormale, et&nbsp;il &nbsp;est&nbsp;contenu &agrave;&nbsp;l'int&eacute;rieur d'un&nbsp;recouvrement de&nbsp;polym&egrave;re pour assurer&nbsp;une&nbsp;bonne robustesse m&eacute;canique et&nbsp;une bonne isolation &agrave;&nbsp;l'environnement ext&eacute;rieur. Le&nbsp;microfil est pr&eacute;sentement assujetti &agrave; 3 brevets&nbsp;sous &eacute;tude aupr&egrave;s des bureaux&nbsp;Canadien et&nbsp;Am&eacute;ricain des brevets.</p>
				
				<ul class="album-projects"><li><a class="group1" href="../../images/projets/nanowire/kerr.jpg" title="Schema d'un montage Kerr"><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/nanowire/kerr_petit.jpg" width="117" height="75" /></a></li>
					<li><a class="group1" href="../../images/projets/nanowire/micrography_nano.jpg" title="Micrographie de la section biseaut&eacute;e d'un microfil"><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/nanowire/micrography_nano_petit.jpg" /></a></li>
					<li><a class="group1" href="../../images/projets/nanowire/experimental_results.jpg" title="Spectre de sortie DFWM et efficacit&eacute; de la conversion de fr&eacute;quence idler. (b)-(g) Efficacit&eacute; de la conversion de fr&eacute;quence idler pour une plage de diam&egrave;tres de microfils As2Se3 et une longuer fixe de 10 cm. Le diam&egrave;tre et la puissance maximale de pompe utilis&eacute;e pour chaque exp&eacute;rience est inscrite sur chaque figure. Courbes rouge (pointill&eacute;es) : Donn&eacute;es exp&eacute;rimentales, Courbes bleues (continues) : simulations."><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/nanowire/experimental_results_petit.jpg" /></a></li>
				
				</ul>
				
				
				<h2>Sources Laser Auto-Pulsantes</h2>
				<p>Nous d&eacute;veloppons des lasers auto-pulsants &agrave; base des propri&eacute;t&eacute;s reg&eacute;n&eacute;ratives de l'auto-modulation de phase, la rotation de polarization nonlin&eacute;aire, et l'auto-glissement de fr&eacute;quence des solitons pour les applications de sources &agrave; supercontinuum, les sources infrarouges-moyennes, la caract&eacute;risation des dispositifs et le storage de l'information. Le mode d'op&eacute;ration de ces lasers inclut &eacute;galement le verrouillage des modes et Q-switch. </p>
				
				<ul class="album-projects">
				<li><a class="group2" href="../../images/projets/laser-pulse/north_fig1.jpg" title="(a) Schema d'un montage exp&eacute;rimental de laser auto-pulsant (b), (c) Spectres repr&eacute;sentant l'impulsion avant (pointill&eacute;) et apr&egrave;s la propagation dans chaque HNLF. OC, circulateur optique; OSA, analyseur de spectre optique; HNLF, fibre hautement nonlin&eacute;aire; EDFA, amplificateur &agrave; fibre dop&eacute;e &agrave; l'erbium; BPF, filtre passebande; FBG, r&eacute;seau de Bragg; BW, largeur de bande; PD, photodiode; SMF, fibre monomode; PSD, densit&eacute; spectrale de puissance."><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/laser-pulse/north_fig1_petit.jpg" /></a></li>
				<li><a class="group2" href="../../images/projets/laser-pulse/north_fig4.jpg" title=" Fission de soliton dans le domaine temporel et propagation des solitons r&eacute;sultants dans les premiers 300 m de HNLF2."><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/laser-pulse/north_fig4_petit.jpg" /></a></li>
				<li><a class="group2" href="../../images/projets/laser-pulse/north_fig5.jpg" title="Pulses avec une largeur temporelle initiale et puissance maximale sp&eacute;cifi&eacute;s inject&eacute;s dans HNLF2.  Leur puissance finale maximl est repr&eacute;sent&eacute;e apr&egrave;s filtrage au BPF."><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/laser-pulse/north_fig5_petit.jpg" /></a></li>
				</ul>
				
				
				<h2>Sources pour l'Infrarouge Moyen</h2>
				<p>Les convertisseurs en longueur d'onde sont reconnus comme composants fondamentaux des syst&egrave;mes de communication optique et sont plus r&eacute;cemment devenus une approche prometteuse pour la g&eacute;n&eacute;ration de lumi&egrave;re dans l'infrarouge moyen. Nous utilisons cette approche combin&eacute;e &agrave; la large fen&ecirc;tre de transparence des verres de chalcog&eacute;nure pour la fabrication de convertisseurs en longueur d'onde &agrave; partir de sources dans la plage de 1550-2000 nm pour la conversion vers 2000-5000 nm avec une grande accordabilit&eacute;.</p>
	
				<ul class="album-projects">
				<li><a class="group3" href="../../images/projets/mid-infrared/fig2.jpg" title="Schema de la structure d'une fibre biseaut&eacute;e en microfil non-uniforme. Le microfil non-uniforme contient un segment uniforme un segment biseaut&eacute;. Le segment biseaut&eacute; est subdivis&eacute; en parties uniformes. Chaque sous-segment induit une conversion de longueur d'onde finie sur un soliton de passage."><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/mid-infrared/fig2_petit.jpg" /></a></li>
				<li><a class="group3" href="../../images/projets/mid-infrared/fig7.jpg" title="Densit&eacute; spectrale d'&eacute;nergie versus longueur de propagation de soliton &agrave; fr&eacute;quence d'auto-glissement avec N=1.4 et largeur d'impulsion initiale de 50 fs. The microfil consid&eacute;r&eacute; est considr&eacute; non-uniforme et optimis&eacute; pour une condition de seuil E=0.1. La longueur d'onde de sortie du soliton est 2860 nm."><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/mid-infrared/fg7_petit.jpg" /></a></li>
				<li><a class="group3" href="../../images/projets/mid-infrared/soliton.jpg" title="Auto-glissement de fr&eacute;quence: Fission d'un soliton d'ordre sup&eacute;rieur en solitons fondamentaux."><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/mid-infrared/soliton_petit.jpg" /></a></li>
				</ul>
				
				
				<h2>Suveillance des signaux optique</h2>
				<p>Nous avons d&eacute;velopp&eacute; des solutions innovatives et &agrave; faible co&ucirc;t pour la surveillance de qualit&eacute; des signaux de comunication &agrave; haut d&eacute;bit. En contraste avec la plupart des technologies bas&eacute;s sur l'&eacute;lectronique, les solution &agrave; base de l'optique nonlin&eacute;aire ne n&eacute;cessitent pas de photod&eacute;tection &agrave; haut d&eacute;bit et traitement &eacute;lectronique subs&eacute;quent. Par exemple, l'optique nonlin&eacute;aire permet de surveiller pr&eacute;cis&eacute;ment la Dispersion Modale de Polarisation (PMD) et le Rapport Optique Signal &agrave; Bruit (OSNR) des signaux &agrave; haut d&eacute;bit par une simple mesure de la puissance optique suite au traitement nonlin&eacute;aire.</p>
				
				<ul class="album-projects">
				<li><a class="group4" href="../../images/projets/optical-signal-monitoring/nonlinear.jpg" title="&Egrave;quations nonlin&eacute;aires coupl&eacute;es d&eacute;pendantes en polarisation"><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/optical-signal-monitoring/nonLinear_petit.jpg" /></a></li>
				<li><a class="group4" href="../../images/projets/optical-signal-monitoring/optical.jpg" title="Lien de communication par fibre optique dont la dispersion chromatique et la dispersion modale de polarisation sont surveill&eacute;s par optique nonlin&eacute;aire."><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/optical-signal-monitoring/optical_petit.jpg" /></a></li>
				</ul>
				
			</div>
			</section>
<?php
include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/footer.php');
?>