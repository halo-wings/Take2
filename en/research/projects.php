<?php
$langue = 'en';
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
			<img src="../../images/img_gauche_projects.jpg" alt="Our projects" />
			<a href="publications.php" id="publications" title="Publications">Publications</a>
		</div>
		<div class="right">
			<div class="container_sous_menu">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/menu.php'); ?>
			</div>
			<section>
				<div class="wrapper">
				<h1>Projects</h1>
				
				<h2>Chalcogenide Nanowires</h2>
				<p>The chalcogenide microwire is a compact and versatile nonlinear engine for application including lasers, wavelength conversion, optical switching, amplification, and supercontinum sources. We develop the first practical version of the highly nonlinear optical nanowire. With a length in the order of the centimeter, this device holds the highest nonlinearity coefficient achieved thus far in a glass with &gamma; = 185W-1m-1 and replaces >1 km of commercially available highly nonlinear silica fibre. The microwire with a diameter in the order of a micron is made of chalcogenide glass, it can be pigtailed to standard single mode fibres from adiabatically tapered ends, its chromatic dispersion coefficient is adjustable within a wide range from normal to anomalous, and it is conveniently contained within a polymer jacket to ensure mechanical robustness and optical insulation from the external environment. The nanowire is currently the subject of 3 patent applications pending approval by the Canadian and US patent offices. </p>
				
				<ul class="album-projects"><li><a class="group1" href="../../images/projets/nanowire/kerr.jpg" title="Schematic of a  Kerr-shutter setup"><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/nanowire/kerr_petit.jpg" width="117" height="75" /></a></li>
					<li><a class="group1" href="../../images/projets/nanowire/micrography_nano.jpg" title="Micrography of a nanowire tapered from a fiber."><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/nanowire/micrography_nano_petit.jpg" /></a></li>
					<li><a class="group1" href="../../images/projets/nanowire/experimental_results.jpg" title="DFWM output spectra and idler wavelength conversion efficiencies. (b)-(g) Idler conversion efficiencies spectra for a range of As2Se3 microwire diameters and a fixed length of 10 cm. The diameter value and the peak pump power used in the experiments are included as inset in each figure. Red (dotted) curves : experimental data, blue (continuous) lines: simulation."><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/nanowire/experimental_results_petit.jpg" /></a></li>
				
				</ul>
				
				
				<h2>Self-Pulsating Laser Sources</h2>
				<p>We develop self-pulsating fibre lasers based on the regenerative properties of self-phase modulation, nonlinear polarization rotation, and soliton self-frequency shift for applications such as supercontinuum generation, mid-infrared sources, device characterization and data storage. The operation of those pulsed lasers also include mode-locking and Q-switched.</p>
				
				<ul class="album-projects">
				<li><a class="group2" href="../../images/projets/laser-pulse/north_fig1.jpg" title="(a) Schematic of the self-pulsating laser experimental setup. (b), (c) Spectra representing the pulse before (dashed line) and after (solid line) propagation in each HNLF. OC, optical circulator; OSA, optical spectrum analyzer; HNLF, highly nonlinear fiber; EDFA, erbium-doped fiber amplifier; BPF, bandpass filter; FBG, fiber Bragg grating; BW, bandwidth; PD, photodiode; SMF, single-mode fiber; PSD, power spectral density.
"><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/laser-pulse/north_fig1_petit.jpg" /></a></li>
				<li><a class="group2" href="../../images/projets/laser-pulse/north_fig4.jpg" title="Soliton fission in the time domain and propagation of the resulting fundamental solitons in the first 300 m of HNLF2."><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/laser-pulse/north_fig4_petit.jpg" /></a></li>
				<li><a class="group2" href="../../images/projets/laser-pulse/north_fig5.jpg" title="Pulses with an initial temporal width and peak power are launched in HNLF2. (top) Their final peak power is represented after filtering at the BPF.
"><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/laser-pulse/north_fig5_petit.jpg" /></a></li>
				</ul>
				
				
				<h2>Mid-Infrared Light Sources</h2>
				<p>Wavelength converters are known to be fundamental component in optical communications systems and have more recently become an approach of great promises to generate light in the mid-infrared. We use this approach in combination with the wide transparency window of chalcogenide glasses to make wavelength converters from widespread light sources in the 1550-2000 nm wavelength range to an output of 2000 nm up to 10000 nm with broad tunability.</p>
	
				<ul class="album-projects">
				<li><a class="group3" href="../../images/projets/mid-infrared/fig2.jpg" title="Schematic structure of a tapered fiber with non-uniform microwire. The non-uniform microwire consists of a uniform and a taper segment. The taper segment is subdivided into uniform subsegments. Each subsegment induces a finite wavelength-shift on a propagating soliton."><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/mid-infrared/fig2_petit.jpg" /></a></li>
				<li><a class="group3" href="../../images/projets/mid-infrared/fig7.jpg" title="Spectral energy density versus propagation length of soliton shifting with N=1.4 and input pulse width of 50 fs. The microwire considered is nonuniform and designed using the E-threshold condition of E=0.1. Output soliton wavelength is 2860 nm."><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/mid-infrared/fg7_petit.jpg" /></a></li>
				<li><a class="group3" href="../../images/projets/mid-infrared/soliton.jpg" title="Soliton self frequency shift: Fission of a high order soliton into fundamental solitons"><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/mid-infrared/soliton_petit.jpg" /></a></li>
				</ul>
				
				
				<h2>Optical Signal Monitoring</h2>
				<p>We have developed innovative and low cost solutions to monitor the signal quality of high data rate optical fiber communication systems. In contrast with most electronics-based technologies, solutions provided by nonlinear optics do not require high data rate photodetection and subsequent electrical processing. Optical technologies thus provide advantages in terms of simplicity and costs when facing the signal monitoring of high-data rate optical signals. Instead, our solutions precisely monitor the Polarisation Mode Dispersion (PMD) and the Optical Signal to Noise Ratio (OSNR) of high data rate signals using simple nonlinear signal processing and optical power detection.</p>
				
				<ul class="album-projects">
				<li><a class="group4" href="../../images/projets/optical-signal-monitoring/nonlinear.jpg" title="Polarization-dependent nonlinear coupled equations"><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/optical-signal-monitoring/nonLinear_petit.jpg" /></a></li>
				<li><a class="group4" href="../../images/projets/optical-signal-monitoring/optical.jpg" title="Optical link with chromatic dispersion and polarization mode dispersion monitored using nonlinear signal processing"><img src="../../images/icone_plus.png" class="icone_plus" /><img src="../../images/projets/optical-signal-monitoring/optical_petit.jpg" /></a></li>
				</ul>
				
			</div>
			</section>
<?php
include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/footer.php');
?>