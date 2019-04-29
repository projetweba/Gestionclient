<?PHP
$connect = mysqli_connect("localhost", "root", "", "espace_membre");

if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM fidelite 
  WHERE id LIKE '%".$search."%'
 
 ";
}
else
{
 $query = "
  SELECT * FROM fidelite ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);


//var_dump($listeEmployes->fetchAll());
?>

<table  border="1">
<tr>
<th>id</th>
<th>Points de fidelité</th>
<th>Valeur en Tnd</th>
</tr>

<?PHP
while($row = mysqli_fetch_array($result)){
  ?>
  <input type="checkbox" class="flat" name="table_records">
 </td>
  <td><?PHP echo $row['id']; ?></td>
  <td><?PHP echo $row['points']; ?></td>
  </tr>
           <?PHP echo '                  <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="50" width="100" class="img-thumnail" />  
                               </td>  
                           ';?>
                    
  <td><form method="POST" action="supprimerEmploye.php">
  
  <button type="submit" name="supprimer"   value="supprimer"  class="btn btn-common mr-3">supprimer</button>
  <input type="hidden" value="<?PHP echo $row['reference']; ?>" name="reference">
  </form>
  </td>

  <td><a href="form-elements2.php?reference=<?PHP echo $row['reference'];?>">Modifier</a></td>
  </tr>
  <?PHP
}
?>






