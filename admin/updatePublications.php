<?php
include('../inc/functions.php');

$id = $_REQUEST['id'];
$titre_fr = addslashes(utf8_decode($_POST['titre_fr']));
$titre_en = addslashes(utf8_decode($_POST['titre_en']));
$detail_fr = addslashes(utf8_decode($_POST['detail_fr']));
$detail_en = addslashes(utf8_decode($_POST['detail_en']));
$url_fr = $_POST['url_fr'];
$url_en = $_POST['url_en'];
$categorie = $_POST['categorie'];
$date_publication = $_POST['date_publication'];
$uploaddir = "../pdf/";
if (isset($_REQUEST['del']) && $_REQUEST['del'] == 1 )
{
	$query = "DELETE from publications where id = " . $id;
	$result = SQL($query);
	header("Location:adminPublications.php");
	exit();

}
elseif ($_REQUEST['id'] == 0 )
{
	$sqlpdf1 = "";
	$sqlpdf2 = "";
	
	//pdf 
	$spdf = $_FILES['pdf_fr']['tmp_name'];
	if (is_uploaded_file($spdf))
	{
		$final_filename = removeaccents(str_replace(" ", "_", $_FILES['pdf_fr']['name']));
		$newfile = $uploaddir . "$final_filename";
		mysql_free_result($result);						
	
		//echo $newfile;
		if (!copy($spdf, $newfile))
		{
			  // if an error occurs the file could not
			  // be written, read or possibly does not exist
			  print "Error Uploading File.";
			  exit();
		}
		else
		{
			$pdf_fr = $final_filename;
			$sqlpdf1 .= "pdf_fr, ";
			$sqlpdf2 .= "'" . $pdf_fr. "', ";
		}		
		
	}
	
	//pdf 
	$spdf = $_FILES['pdf_en']['tmp_name'];
	if (is_uploaded_file($spdf))
	{
		$final_filename = removeaccents(str_replace(" ", "_", $_FILES['pdf_en']['name']));
		$newfile = $uploaddir . "$final_filename";
		mysql_free_result($result);						
	
		//echo $newfile;
		if (!copy($spdf, $newfile))
		{
			  // if an error occurs the file could not
			  // be written, read or possibly does not exist
			  print "Error Uploading File.";
			  exit();
		}
		else
		{
			$pdf_en = $final_filename;
			$sqlpdf1 .= "pdf_en, ";
			$sqlpdf2 .= "'" . $pdf_en. "', ";
		}		
		
	}
	
	$query = "Insert into publications (".$sqlpdf1." titre_fr, titre_en, detail_fr, detail_en, url_fr, url_en, categorie, date_publication) values( ".$sqlpdf2." '" . $titre_fr . "', '" . $titre_en . "', '" . $detail_fr . "', '" . $detail_en . "', '" . $url_fr . "', '" . $url_en . "', '" . $categorie . "', '" . $date_publication . "')";
	$result = SQL($query);
}
else
{
	$sqlpdf = "";
	$sqlpdf2 = "";
	
	//pdf 
	$spdf = $_FILES['pdf_fr']['tmp_name'];
	if (is_uploaded_file($spdf))
	{
		//effacer l'ancien pdf		 
		$s_sql = "select id,pdf_fr FROM publications where id = " . $id;
		$result = SQL($s_sql);
		if (!$result) {
			die('Could not query:' . mysql_error());}
		$row = @ mysql_fetch_row($result);			
		$pdf_fr =  $row[1];				
		   
		if($pdf_fr!="")
			unlink($uploaddir . $pdf_fr);
			
		mysql_free_result($result); 
		 
		$final_filename = removeaccents(str_replace(" ", "_", $_FILES['pdf_fr']['name']));
		$newfile = $uploaddir . "$final_filename";				
	
		//echo $newfile;
		if (!copy($spdf, $newfile))
		{
			  // if an error occurs the file could not
			  // be written, read or possibly does not exist
			  print "Error Uploading File.";
			  exit();
		}
		else
		{
			$pdf_fr = $final_filename;
			$sqlpdf .= "pdf_fr = '" . $pdf_fr . "',";
		}		
		
	}
	
	//pdf 
	$spdf = $_FILES['pdf_en']['tmp_name'];
	if (is_uploaded_file($spdf))
	{
		//effacer l'ancien pdf		 
		$s_sql = "select id,pdf_en FROM publications where id = " . $id;
		$result = SQL($s_sql);
		if (!$result) {
			die('Could not query:' . mysql_error());}
		$row = @ mysql_fetch_row($result);			
		$pdf_en =  $row[1];				
		   
		if($pdf_en!="")
			unlink($uploaddir . $pdf_en);
			
		mysql_free_result($result); 
		 
		$final_filename = removeaccents(str_replace(" ", "_", $_FILES['pdf_en']['name']));
		$newfile = $uploaddir . "$final_filename";			
	
		//echo $newfile;
		if (!copy($spdf, $newfile))
		{
			  // if an error occurs the file could not
			  // be written, read or possibly does not exist
			  print "Error Uploading File.";
			  exit();
		}
		else
		{
			$pdf_en = $final_filename;
			$sqlpdf2 .= "pdf_en = '" . $pdf_en . "',";
		}		
		
	}
	
	$query = "UPDATE publications set ".$sqlpdf." ".$sqlpdf2." titre_fr='" . $titre_fr . "', titre_en='" . $titre_en . "', detail_fr='" . $detail_fr . "', detail_en='" . $detail_en . "', url_fr='" . $url_fr . "', url_en='" . $url_en . "', categorie='" . $categorie . "', date_publication='" . $date_publication . "' where id=" . $id;
	//echo $query;
	$result = SQL($query);

}	
mysql_close();

header("Location:adminPublications.php?id=1");
exit();
?>