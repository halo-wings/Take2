<?php
$langue = 'en';
$section = "home";
$sous_section = "";
$title = "";
$meta_description = "";
$meta_keywords = "";
include($_SERVER['DOCUMENT_ROOT']."/".$langue."/inc/header.php");

function getImagesFromDir($path) {
    $images = array();
    if ($img_dir = @opendir($path)) {
        while (false !== ($img_file = readdir($img_dir))) {
            if (preg_match("/(\.gif|\.jpg|\.jpeg|\.png)$/i", $img_file)) {
                $images[] = $img_file;
            }
        }
        closedir($img_dir);
    }
    return $images;
}

function getRandomFromArray($ar) {
    if (empty($ar)) return '';
    return $ar[array_rand($ar)];
}

$root = $_SERVER['DOCUMENT_ROOT'];
$path = '/images/accueil/';
$imgList = getImagesFromDir($root . $path);
$img = getRandomFromArray($imgList);
?>
<script src="/inc/js/jquery.min.js"></script>
<script src="/inc/js/jquery.cycle.all.latest.js"></script>
<script>$(document).ready(function(){ $('.rotator').cycle({ fx: 'fade', timeout: 3000 }); });</script>

<div class="content home">
  <div class="left">
    <div class="rotator">
      <img src="../images/img_gauche_home1.jpg" alt="Martin Rochette's Research Group" />
      <img src="../images/img_gauche_home2.jpg" alt="Martin Rochette's Research Group" />
      <img src="../images/img_gauche_home3.jpg" alt="Martin Rochette's Research Group" />
      <img src="../images/img_gauche_home4.jpg" alt="Martin Rochette's Research Group" />
      <img src="../images/img_gauche_home5.jpg" alt="Martin Rochette's Research Group" />
      <img src="../images/img_gauche_home6.jpg" alt="Martin Rochette's Research Group" />
    </div>
    <a href="research/projects.php" id="projects" title="Projects">Projects</a>
    <a href="research/publications.php" id="publications" title="Publications">Publications</a>
  </div>

  <div class="right">
    <div class="container_sous_menu" style="display: none;">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/menu.php'); ?>
    </div>

    <section>
      <img src="<?php echo $path . $img ?>" alt="Our activities" class="imghome" />

      <div class="wrapper">
        <p>The <strong>Martin Rochette’s Photonic Systems Group</strong> focuses on nonlinear and quantum phenomena in optical fibers and integrated waveguides, with applications in telecommunications, sensing, and mid-infrared photonics.</p>

        <p>Current research directions include:</p>
        <ul>
          <li>Nonlinear fiber optics and supercontinuum generation</li>
          <li>Mid-infrared and visible light sources based on soft-glass fibers</li>
          <li>Integrated photonic devices in chalcogenide and silicon nitride platforms</li>
          <li>Ultrafast optical signal processing and all-optical switching</li>
          <li>Fiber-based sensors for harsh environments</li>
          <li>Quantum optics in waveguide systems</li>
        </ul>

        <p>The group develops novel specialty optical fibers, on-chip nonlinear devices, mid-IR supercontinuum sources, and high-speed photonic components that push the limits of current optical technologies.</p>

        <p>More details about ongoing projects and recent publications can be found in the <a href="research/projects.php">Projects</a> and <a href="research/publications.php">Publications</a> sections.</p>
      </div>
    </section>
  </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/footer.php'); ?>
