<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
}

require("general/entete.php");
			
$s_sql = "select * FROM publications order by date_publication desc";

$result = SQL($s_sql);
if (!$result) {
	die('Could not query:' . mysql_error());}


?>
<script language="javascript">
function ValiderSupprimer(id)
{
	if(confirm("êtes vous certain de vouloir supprimer cette publication ?"))
		window.location.href = 'updatePublications.php?del=1&id=' + id;
	
}

</script>



<table width="480" cellspacing="13">
	<tr><td align="left">
<h1>Publications</h1>
<a href="modifPublications.php?id=0" class="lien">Ajouter une publication</a>
<br><br>

<table width="650">
	<tr bgcolor="#70D8FB">
		<td><b>Titre</b></td>
		<td width="100"><b>Date</b></td>
		<td colspan="2" with="100">&nbsp;</td>
	</tr>
<?php 
$cpt=0;
while($row = mysql_fetch_assoc($result))
{
	if(fmod($cpt,2))
	{
		$color = "#F1ECDF";
	}
	else
	{
		$color = "#fcfcfc";
	}
	
	?>
	
	<tr bgcolor="<?php echo $color?>">
		<td align="left"><?php echo utf8_encode($row['titre_fr']); ?></td>
		<td align="center"><?php echo $row['date_publication']; ?></td>
		<td width="50"><a href="modifPublications.php?id=<?php echo $row['id']; ?>" class="lien">Éditer</a></td>
		<td width="50"><a href="javascript:ValiderSupprimer(<?php echo $row['id']; ?>);" class="lien">Supprimer</a></td>
	</tr>

<?php 
$cpt = $cpt+1;
}
?>
</table><br><br><a href="adminMenus.php" class="lienmenu">Retour</a>
</td></tr>
</table>

<?php  require("general/pied.php");?>
