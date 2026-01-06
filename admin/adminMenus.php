<?php
session_start();
if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
}

$categorie="-1";
require("general/entete.php");

$s_sql = "SELECT idMenu,titre,type from menus order by ordre";
$resultmenu = SQL($s_sql);
?>
<script language="javascript">

function confimerSupprimer(id)
{
	if (confirm('Voulez vous supprimer ce numero?'))
	{
		window.location.href = 'updateGalerie.php?del=1&id=' + id;
	}
}
</script>
<br><br>
<table width="800" align="center">
<?php

while($rowmenu=mysql_fetch_array($resultmenu))
{
?>
	<tr>
		<td align="left">
			<?php
			//texte
			if($rowmenu[2]==1){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="modifTexte.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion des textes</a>)<br><br>
				
				<?php 
			}
			//texte avec sousmenus
			elseif($rowmenu[2]==2){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="modifTexte.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion des textes</a>)&nbsp;&nbsp;(<a href="adminSousmenus.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion des sous-menus</a>)<br><br>
				<?php 
				
				
				$s_sql = "select idSousmenu,titre,titreA from sousmenus where idMenu = " . $rowmenu[0] . " order by ordre";
				$result2 = @ mysql_query($s_sql,$dbc);
				
				if (mysql_num_rows($result2)>0) 
					echo('<table border="0" cellspacing = "2" valign="top" >');
				else
					echo('<br>');
					
				$cpt=0;
				while($row2 = mysql_fetch_array($result2))
				{
					if(fmod($cpt,2))
					{
						$color = "#EDEDE4";
					}
					else
					{
						$color = "#fcfcfc";
					}
				
					echo('<tr bgcolor="' . $color . '"><td width="250">' . $row2[1] . '</td><td  width="175"><a href="modifTexte.php?idS=' . $row2[0] . '" class="lien">gestion des textes</a></td>');			
				
					
					echo('</tr>' );			
					
					$cpt=$cpt+1;
				
				}
				
					
				if (mysql_num_rows($result2)>0) 
					echo('</table>');
				else
					echo('');
					
				if($rowmenu[0]!=6)
					echo('<br>');
			
			}
			//Nouvelles
			elseif($rowmenu[2]==3){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="adminNouvelles.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion des activités</a>)<br><br>
				<?php			
			}		
			//Liens
			elseif($rowmenu[2]==4){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="adminSousmenus.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion des sous-menus</a>)<br><br>
				<?php 
				
				
				$s_sql = "select idSousmenu,titre,titreA from sousmenus where idMenu = " . $rowmenu[0] . " order by ordre";
				$result2 = @ mysql_query($s_sql,$dbc);
				
				if (mysql_num_rows($result2)>0) 
					echo('<table border="0" cellspacing = "2" valign="top" >');
				else
					echo('<br>');
					
				$cpt=0;
				while($row2 = mysql_fetch_array($result2))
				{
					if(fmod($cpt,2))
					{
						$color = "#EDEDE4";
					}
					else
					{
						$color = "#fcfcfc";
					}
				
					echo('<tr bgcolor="' . $color . '"><td width="170">' . $row2[1] . '</td><td  width="125"><a href="adminLiens.php?idS=' . $row2[0] . '" class="lien">gestion des liens</a></td>');			
				
					
					echo('</tr>' );			
					
					$cpt=$cpt+1;
				
				}
				
					
				if (mysql_num_rows($result2)>0) 
					echo('</table><br>');
				else
					echo('');
					
			}
			
			//Infolettre
			elseif($rowmenu[2]==5){?>
				<span class="titre"><?php echo $rowmenu[1]?></span><br><br>
				<table border="0" cellspacing = "2" valign="top" width="425">
					<tr>
						<td bgcolor="#fcfcfc"><a href="infolettre.php" class="lien">Pr&eacute;paration de l'infolettre</a></td>
					</tr>
					<tr>
						<td bgcolor="#EDEDE4"><a href="adminListeEnvoi.php" class="lien">Gestion des listes d'envoi</a></td>
					</tr>
					<tr>
						<td bgcolor="#fcfcfc"><a href="adminStatistiqueEnvoi.php" class="lien">Statistiques d'envois</a></td>
					</tr>                
				</table><br>
				<?php 
			}		
			//album photo
			elseif($rowmenu[2]==6){?>
				<span class="titre"><?php echo $rowmenu[1]?></span><br><br>
				<?php
				if($rowmenu[0]!=20)
				{
					?>
					<a href="modifGalerie.php?id=0" class="lien">ajouter une galerie</a><br><br>
					<?php
				}
				?>
						<table border="0" cellspacing = "2" valign="top">
						<?php
						if($rowmenu[0]==20)
						{
							$s_sqlPhoto = "SELECT id,titre,etat FROM galerie WHERE id = 20";
						}
						else
						{
							$s_sqlPhoto = "SELECT id,titre,etat FROM galerie WHERE id != 20 ORDER BY ordre";
						}
						$resultPhoto = mysql_query($s_sqlPhoto,$dbc);
						$cpt=0;
						while($row = mysql_fetch_array($resultPhoto))
						{
							if(fmod($cpt,2))
							{
								$color = "#EDEDE4";
							}
							else
							{
								$color = "#fcfcfc";
							}
							
							if($row[2]==2)
								$etat = "inactif";
							else
								$etat = "actif";
						
						?>
							<tr bgcolor="<?php echo $color?>">
								<td width="300"><?php echo $row[1]?>&nbsp;&nbsp;(<?php echo $etat?>)</td>					
								<td width="200"><a href="adminAlbum.php?idN=<?php echo $row[0]?>" class="lien">Album photo</a>&nbsp;&nbsp;</td>		
								<td><a href="modifGalerie.php?id=<?php echo $row[0]?>" class="lien">Modifier</a>&nbsp;&nbsp;</td>
								<td><a href="javascript:confimerSupprimer(<?php echo $row[0]?>)" class="lien">Supprimer</a></td>
							</tr>
							
						<?php		
					
					$cpt=$cpt+1;
						}
						?>
						</table><br>
					

				<?php			
			}							
			//Images accueil
			elseif($rowmenu[2]==7){?>
			<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(  <a href="adminImages.php">Gestion des photos de l'accueil</a> )<br><br>
			<?php			
			}
			//RECETTES
			elseif($rowmenu[2]==8){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="modifTexte.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion des textes</a>)&nbsp;&nbsp;(<a href="adminSousmenus.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion des catégories de recettes</a>)<br><br>
				<?php 
				
				
				$s_sql = "select idSousmenu,titre,titreA from sousmenus where idMenu = " . $rowmenu[0] . " order by ordre";
				$result2 = @ mysql_query($s_sql,$dbc);
				
				if (mysql_num_rows($result2)>0) 
					echo('<table border="0" cellspacing = "2" valign="top" >');
				else
					echo('<br>');
					
				$cpt=0;
				while($row2 = mysql_fetch_array($result2))
				{
					if(fmod($cpt,2))
					{
						$color = "#EDEDE4";
					}
					else
					{
						$color = "#fcfcfc";
					}
				
					echo('<tr bgcolor="' . $color . '"><td width="250">' . $row2[1] . '</td><td  width="175"><a href="adminRecettes.php?idS=' . $row2[0] . '&cat='.$rowmenu[0].'" class="lien">gestion des recettes</a></td>');			
				
					
					echo('</tr>' );			
					
					$cpt=$cpt+1;
				
				}
				
					
				if (mysql_num_rows($result2)>0) 
					echo('</table>');
				else
					echo('');
					
				if($rowmenu[0]!=6)
					echo('<br>');
			
			}	
			//PRODUITS - NOS FROMAGES
			elseif($rowmenu[2]==9){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="modifTexte.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion des textes</a>)&nbsp;&nbsp;(<a href="adminSousmenus.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion des catégories de produits</a>)<br><br>
				<?php 
				
				
				$s_sql = "select idSousmenu,titre,titreA from sousmenus where idMenu = " . $rowmenu[0] . " order by ordre";
				$result2 = @ mysql_query($s_sql,$dbc);
				
				if (mysql_num_rows($result2)>0) 
					echo('<table border="0" cellspacing = "2" valign="top" >');
				else
					echo('<br>');
					
				$cpt=0;
				while($row2 = mysql_fetch_array($result2))
				{
					if(fmod($cpt,2))
					{
						$color = "#EDEDE4";
					}
					else
					{
						$color = "#fcfcfc";
					}
				
					echo('<tr bgcolor="' . $color . '"><td width="250">' . $row2[1] . '</td><td  width="175"><a href="adminProduits.php?idS=' . $row2[0] . '&cat='.$rowmenu[0].'" class="lien">gestion des produits</a></td>');			
				
					
					echo('</tr>' );			
					
					$cpt=$cpt+1;
				
				}
				
					
				if (mysql_num_rows($result2)>0) 
					echo('</table>');
				else
					echo('');
					
				if($rowmenu[0]!=6)
					echo('<br>');
			
			}	
			//Publications
			elseif($rowmenu[2]==10){?>
				<!--span class="titre"><?php echo $rowmenu[1]?></span-->
				<ul style="margin: 0;">
					<li><a href="modifTexte.php?id=1" class="lien">gestion de l'accueil</a></li>
					<li><a href="modifTexte.php?id=2" class="lien">gestion de carrières</a></li>
					<li><a href="adminPublications.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion des publications</a></li>
				<ul>
				<?php			
			}	
			//Adoption
			elseif($rowmenu[2]==13){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="adminAdoption.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion des adoption</a>)<br><br>
				<?php			
			}	
			//Avis publics
			elseif($rowmenu[2]==15){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="adminAvis.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion</a>)<br><br>
				<?php			
			}	
			//Nouvelles 
			elseif($rowmenu[2]==16){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="modifTexte.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion du texte d'intro</a>)&nbsp;&nbsp;(<a href="adminReglements.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion des règlements</a>)<br><br>
				<?php			
			}		
			//Communiqués 
			elseif($rowmenu[2]==17){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="adminCommuniques.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion</a>)<br><br>
				<?php			
			}		
			//Procès-verbaux
			elseif($rowmenu[2]==18){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="adminProces.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion</a>)<br><br>
				<?php			
			}		
			//Appels d'offres
			elseif($rowmenu[2]==19){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="adminAppels.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion</a>)<br><br>
				<?php			
			}		
			//Appels d'offres
			elseif($rowmenu[2]==20){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="adminClient.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion</a>)<br><br>
				<?php			
			}		
			//Appels d'offres
			elseif($rowmenu[2]==21){?>
				<span class="titre"><?php echo $rowmenu[1]?></span>&nbsp;&nbsp;(<a href="adminRealisation.php?id=<?php echo $rowmenu[0]?>" class="lien">gestion</a>)<br><br>
				<?php			
			}	
			?>	
			<br>
		</td>
	</tr>
<?php
}
?>
</table>

<?php require("general/pied.php")?>