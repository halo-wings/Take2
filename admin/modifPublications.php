<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
}

require("general/entete.php");
include("FCKeditor/fckeditor.php") ;

// Pagination générique d'un listing

function pagine(
   &$sql      // Elément commun de requête : "FROM..." auquel sera ajouté le "LIMIT..."
   ,$mpp      // Nombre max de lignes par page
   ,$query      // Elément de querystring indiquant le n° de page
   ,$url      // URL de la page
   ,$long=5   // Nombre max de pages avant et après la page courante
   ) {
   // Pour construire les liens, regarde si $url contient déjà un ?
   $t = (strpos($url,"?"))?"&":"?";
   // Nombre total d'enregistrements retournés
   $res = SQL("SELECT count(*) ".$sql);
   $nbres = mysql_result($res,0,0);
   // Calcul du nombre de pages
   $nbpage = ceil($nbres/$mpp);
   // La page courante est
   $p=@$_GET[$query]; if(!$p) $p=1;
   if($p>$nbpage) $p = $nbpage;
   // Longueur de la liste de pages
   $deb = max(1,$p-$long);
   $fin = min($nbpage,$p+$long);
   // Construction de la liste de pages
   $pagine = "";
   if($nbpage>1) {
      for($i=$deb;$i<=$fin;$i++) {
         // Page courante ?
         if($i==$p) $pagine.="<font color=red><strong>&nbsp;".$i."&nbsp;</strong></font>";
         // Page 1 > lien sans query
         elseif($i==1) $pagine.="<A href='".$url."'  class='lienmenu'>&nbsp;".$i."&nbsp;</A>";
         // Autre page -> lien avec query
         else $pagine.="<A href='".$url.$t.$query."=".$i."'  class='lienmenu'>&nbsp;".$i."&nbsp;</A>";
      }
      if($pagine) $pagine = "&nbsp;Page".$pagine;
      // Premier, précédent
      if($pagine&&($p>1)) {
         if($p==2) $pagine ="<A href='".$url."' class='lienmenu'>&nbsp;&lt;&lt;&nbsp;</A>".$pagine;
         else $pagine ="<A href='".$url.$t.$query."=".($p-1)."'  class='lienmenu'>&nbsp;&lt;&lt;&nbsp;</A>".$pagine;
         if($p>2) $pagine ="<A href='".$url."'  class='lienmenu'>&nbsp;&lt;&nbsp;</A>".$pagine;
      }
      // Suivant, dernier
      if($pagine&&($p<$nbpage)) {
         $pagine.="<A href='".$url.$t.$query."=".($p+1)."'  class='lienmenu'>&nbsp;&gt;&gt;&nbsp;</A>";
         if($p<$nbpage-1) $pagine.="<A href='".$url.$t.$query."=".($nbpage)."'  class='lienmenu'>&nbsp;&gt;&nbsp;</A>";
      }
      // Modification de la requête
      $sql .= " LIMIT ".(($p-1)*$mpp).",".$mpp;
   }
   return $pagine;
}

$s_sql = "FROM publications where id=" . $_REQUEST['id'];
$pagine = pagine($s_sql,30,"p","modifPublications.php?id=" . $_REQUEST['id']);
$result1 = SQL("SELECT * ".$s_sql);
if (!$result1) {
	die('Could not query:' . mysql_error());}

$publications = mysql_fetch_assoc($result1);

/*$s_sql = "from abonnes where idListe=" . $_REQUEST['id'] . " order by courriel";
$pagine = pagine($s_sql,30,"p","modifListeEnvoi.php?id=" . $_REQUEST['id']);
$result = SQL("SELECT courriel,id ".$s_sql);*/
//echo("SELECT courriel,prenom,nom,id ".$s_sql); 


?>
<script src="calendar.js"></script>


			<table width="650" cellspacing="2" align="center">
			<tr>
			<td colspan="5"><h1>Publications</h1>
			
				<form name="formPublications" method="post" action="updatePublications.php?id=<?php echo $_REQUEST['id']?>" enctype="multipart/form-data">
					<table width="650" cellspacing="0" cellpadding="0" border="0" class="texte" align="left">
					<tr>
						 <td colspan="2">&nbsp;</td>
					 </tr>  
				 <tr>
					 <td align="left" colspan="2" valign="top"><b>Catégorie</b><br>
						<select name="categorie">
						<option value="0">-- Choisir la catégorie --</option>
						<?php
						$s_sql = "SELECT nom_fr,id from categories where 1=1 order by id";
						$result = SQL($s_sql);
						while($row = mysql_fetch_array($result)) {
							echo  '<option value="'.$row[1].'"';
							if ($publications['categorie'] == $row[1])
								echo " selected";
							echo '>'.utf8_encode($row[0]).'</option>';
						}
						?>
						</select>
						</td>
				 </tr>  		
					  		  
				 <tr>
					 <td colspan="5">&nbsp;</td>
				 </tr>    
					 
					 <tr>
						 <td width="150" valign="top" colspan="2" align="left"><b>Titre français</b><br>
							<input type="text" name="titre_fr" value="<?php echo $publications['titre_fr']; ?>" id="titre_fr" maxlength="250" size="120"  />	 
						 </td>
					 </tr>	  			
					<tr>
						 <td colspan="2">&nbsp;</td>
					 </tr> 	
					 <tr>
						 <td width="150" valign="top" colspan="2" align="left"><b>Titre anglais</b><br>
							<input type="text" name="titre_en" value="<?php echo $publications['titre_en']; ?>" id="titre_en" maxlength="250" size="120"  /> 
						 </td>
					 </tr>
					<tr>
						 <td colspan="2">&nbsp;</td>
					 </tr> 
					 
					 <tr>
						 <td width="150" valign="top" colspan="2" align="left"><b>Détail français</b><br>
							<table border="0" cellpadding="0" cellspacing="0" width="650"><tr><td>
							<?php
							$oFCKeditor = new FCKeditor('detail_fr');
							$oFCKeditor->BasePath = 'FCKeditor/';
							$oFCKeditor->Value = $publications['detail_fr'];
							$oFCKeditor->Width  = '780' ;
							$oFCKeditor->Height = '300' ;
							$oFCKeditor->Create();
							?>
							</td></tr></table>				 
						 </td>
					 </tr>	  			
					<tr>
						 <td colspan="2">&nbsp;</td>
					 </tr> 	
					 <tr>
						 <td width="150" valign="top" colspan="2" align="left"><b>Détail anglais</b><br>
							<table border="0" cellpadding="0" cellspacing="0" width="550"><tr><td>
							<?php
							$oFCKeditor = new FCKeditor('detail_en');
							$oFCKeditor->BasePath = 'FCKeditor/';
							$oFCKeditor->Value = $publications['detail_en'];
							$oFCKeditor->Width  = '780' ;
							$oFCKeditor->Height = '300' ;
							$oFCKeditor->Create();
							?>
							</td></tr></table>				 
						 </td>
					 </tr>						 
						
					<tr>
						 <td colspan="2">&nbsp;</td>
					 </tr> 	
									 
					
					 <tr>
						 <td width="150" valign="top" colspan="2" align="left">URL français<br>
							<input type="text" name="url_fr" value="<?php echo $publications['url_fr']; ?>" id="url_fr" maxlength="250" size="120"  />
						 </td>
					 </tr>	
					<tr>
						 <td colspan="2">&nbsp;</td>
					 </tr> 	
					 <tr>
						 <td width="150" valign="top" colspan="2" align="left">URL anglais<br>
							<input type="text" name="url_en" value="<?php echo $publications['url_en']; ?>" id="url_en" maxlength="250" size="120"  />
						 </td>
					 </tr>	
					<tr>
						 <td colspan="2">&nbsp;</td>
					 </tr> 	
									 
					
					 <tr>
						 <td width="150" valign="top" colspan="2" align="left">PDF français<br>
							<input type="file" name="pdf_fr" value="" id="pdf_fr" maxlength="250" size="60"  />
						 </td>
					 </tr>	
				  <? if($publications['pdf_fr']!=''){?>
				 <tr>
					 <td colspan="5" align="left"><a href="../pdf/<?php echo $publications['pdf_fr']; ?>" target="_blank" style="font-size: 12px;"><?php echo $publications['pdf_fr']; ?></a></td>
				 </tr>  
				 <? }?>								 
						
					<tr>
						 <td colspan="2">&nbsp;</td>
					 </tr> 
					
				  <tr>
						 <td width="150" valign="top" colspan="2" align="left">PDF anglais<br>
							<input type="file" name="pdf_en" value="" id="pdf_en" maxlength="250" size="60"  />
						 </td>
					 </tr>		
					  		  
				 <? if($publications['pdf_en']!=''){?>
				 <tr>
					 <td colspan="5" align="left"><a href="../pdf/<?php echo $publications['pdf_en']; ?>" target="_blank" style="font-size: 12px;"><?php echo $publications['pdf_en']; ?></a></td>
				 </tr>  
				 <? }?>						 
					
					 <tr>
					 <td colspan="5">&nbsp;</td>
				 </tr>   
				 <tr>
					 <td align="left" colspan="2" valign="top">Date publication<br>
						<input type="text" name="date_publication" size="15" value="<?php echo $publications['date_publication']; ?>"><A HREF="javascript:doNothing();" onclick="setDateField(document.formPublications.date_publication);top.newWin = window.open('calendar.html','cal','WIDTH=208,HEIGHT=230')"><img src="CALENDAR.GIF" border="0" style="border: 0;"></a></td>
				 </tr>  
					
					<tr>
						 <td colspan="2">&nbsp;</td>
					 </tr> 	
					 <tr>
						 <td width="50" valign="top" align="left">État</td>
						 <td align="left" width="350">
							<select name="etat">
								<option value="1" <?php if($etat==1) echo('selected')?>>Actif</option>
								<option value="2" <?php if($etat==2) echo('selected')?>>Inactif</option>
							</select>
						</td>						
					 </tr>  					 
													
					<tr>
						 <td colspan="2"><br><br></td>
					 </tr> 			
					 
					<tr>
						 <td colspan="2" align="right"><input type="button" value="Retour" onClick="javascript:history.back();">&nbsp;&nbsp;<input type="submit" value="Enregistrer" >&nbsp;&nbsp;</td>
					</tr>  
					<tr>
						 <td colspan="2"><br><br></td>
					 </tr> 			
								
					</table>
				</form>			
				<?php  /*if ($_REQUEST['id'] != 0){?>
				<br><br><a href="modifAbonne.php?id=0&idListe=<?php echo $_REQUEST['id']?>" class="lien">Ajouter un courriel</a><br><br>
				<?php  }*/?>
			</td>
			</tr>
			</table>
			<table width="650">
			<?php  /*while($row = mysql_fetch_array($result)) {?>
				
				<?php echo  '<tr  align="left"><td width="300">' . $row[0] . '</td><td><a href="modifAbonne.php?idListe=' . $_REQUEST['id'] . '&id=' . $row[1] . '"  class="lien">éditer</a></td><td><a href="updateAbonne.php?idListe=' . $_REQUEST['id'] . '&del=1&id=' . $row[1] . '" class="lien">Supprimer</td></tr>'?>
			<?php  }*/
			
			echo '<tr><td colspan="3" align="center"><br><br>' . $pagine . '</td></tr>';
			?>
				
			</table>

<?php  
mysql_free_result($result1);
require("general/pied.php");?>
