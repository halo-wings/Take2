<?php
$langue = 'fr';
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
    return $images = array_diff($images, array('.', '..')); // sécurité supplémentaire
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
<script>
$(document).ready(function(){
    $('.rotator').cycle({ fx: 'fade', timeout: 3000 });
});
</script>

<div class="content home">
  <div class="left">
    <div class="rotator">
      <img src="../images/img_gauche_home1.jpg" alt="Groupe de recherche de photonique nonlinéaire - Martin Rochette" />
      <img src="../images/img_gauche_home2.jpg" alt="Groupe de recherche de photonique nonlinéaire - Martin Rochette" />
      <img src="../images/img_gauche_home3.jpg" alt="Groupe de recherche de photonique nonlinéaire - Martin Rochette" />
      <img src="../images/img_gauche_home4.jpg" alt="Groupe de recherche de photonique nonlinéaire - Martin Rochette" />
      <img src="../images/img_gauche_home5.jpg" alt="Groupe de recherche de photonique nonlinéaire - Martin Rochette" />
      <img src="../images/img_gauche_home6.jpg" alt="Groupe de recherche de photonique nonlinéaire - Martin Rochette" />
    </div>
    <a href="recherche/projets.php" id="projects" title="Projets">Projets</a>
    <a href="recherche/publications.php" id="publications" title="Publications">Publications</a>
  </div>

  <div class="right">
    <div class="container_sous_menu" style="display: none;">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/menu.php'); ?>
    </div>

    <section>
      <img src="<?php echo $path . $img ?>" alt="Résumé des activités" class="imghome" />

      <div class="wrapper">
        <p>Le <strong>Groupe de photonique de Martin Rochette</strong> concentre ses recherches sur les phénomènes non linéaires et quantiques dans les fibres optiques et les guides d’ondes intégrés, avec des applications en télécommunications, en détection et en photonique moyen infrarouge.</p>

        <p>Les axes de recherche actuels comprennent :</p>
        <ul>
          <li>Optique non linéaire dans les fibres et génération de supercontinuum</li>
          <li>Sources lumineuses moyen infrarouge et visibles à base de fibres en verres mous</li>
          <li>Dispositifs photoniques intégrés en chalcogénure et en nitrure de silicium</li>
          <li>Traitement ultrafast du signal optique et commutation tout-optique</li>
          <li>Capteurs à fibre optique pour environnements extrêmes</li>
          <li>Optique quantique dans les systèmes à guides d’ondes</li>
        </ul>

        <p>Le groupe développe des fibres optiques spécialisées, des dispositifs non linéaires sur puce, des sources supercontinuum moyen infrarouge et des composants photoniques à très haute vitesse qui repousser les limites des technologies optiques actuelles.</p>

        <p>Plus de détails sur les projets en cours et les publications récentes sont disponibles dans les sections <a href="recherche/projets.php">Projets</a> et <a href="recherche/publications.php">Publications</a>.</p>
      </div>
    </section>
  </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/'.$langue.'/inc/footer.php'); ?>
