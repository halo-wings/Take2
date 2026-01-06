<?php
session_start();
if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
}

$id = $_REQUEST['id'];



require('general/entete.php');
include("FCKeditor/fckeditor.php") ;


if ($id!=0)
{
	$s_sql = "select idTextpool,texte,etat,texteA from textpool where idTextpool = " . $_REQUEST['id'];
	$result = SQL($s_sql);
	if (!$result) {
		die('Could not query:' . mysql_error());}
	$row = @ mysql_fetch_row($result);

	$idTextpool = $row[0];
	$texte =  stripslashes($row[1]);
	$etat = $row[2];
	$textea =  stripslashes($row[3]);

	$s_sql = "select titre from menus where idMenu = " . $_REQUEST['id'];
	$result = SQL($s_sql);
	$row = @ mysql_fetch_row($result);
	$titre = $row[0];

}

?>

<TABLE width="400" cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
		<td colspan="2"><br><h1>Modification</h1><h2><?php echo ($_REQUEST['id'] == 2) ? 'Texte de carrières': 'Texte de l\'accueil'; ?></h2></td>
	</tr>
	<form name="formTexte" id="edit" action="updateTexte.php" method="post">
	<input type="hidden" name="id" value="<?php echo $idTextpool; ?>">
		<TR>
			<TD colspan="2">
			  <table width="650" cellspacing="0" cellpadding="0" border="0" class="texte" align="left">
					<tr>
						 <td colspan="2">&nbsp;</td>
					 </tr> 
					 
					 <tr>
						 <td width="150" valign="top" colspan="2" align="left"><b>Texte</b><br>
							<table border="0" cellpadding="0" cellspacing="0" width="650"><tr><td>
							<?php
							$oFCKeditor = new FCKeditor('texte');
							$oFCKeditor->BasePath = 'FCKeditor/';
							$oFCKeditor->Value = $texte;
							$oFCKeditor->Width  = '780' ;
							$oFCKeditor->Height = '450' ;
							$oFCKeditor->Create();
							?>
							</td></tr></table>				 
						 </td>
					 </tr>	  			
					<tr>
						 <td colspan="2">&nbsp;</td>
					 </tr> 	
					 <tr>
						 <td width="150" valign="top" colspan="2" align="left"><b>Texte anglais</b><br>
							<table border="0" cellpadding="0" cellspacing="0" width="550"><tr><td>
							<?php
							$oFCKeditor = new FCKeditor('textea');
							$oFCKeditor->BasePath = 'FCKeditor/';
							$oFCKeditor->Value = $textea;
							$oFCKeditor->Width  = '780' ;
							$oFCKeditor->Height = '450' ;
							$oFCKeditor->Create();
							?>
							</td></tr></table>				 
						 </td>
					 </tr>			
					  									 
					<!--	
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
					-->								
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
	</td>
</tr>
</form>
		
</TABLE>


<?php require('general/pied.php');?>
