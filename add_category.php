<?php 
require_once "connection.php";
$bEdit = false;

if(isset($_POST['val']))
{
	$aVals = $_POST['val'];
	$category_id = 0;
	$category_name = $aVals['category_name'];
	$parent = $aVals['parent'];
	if(isset($aVals['category_id']))
	{
		$category_id = $aVals['category_id'];
	}
	
	$sql = "INSERT INTO category SET category_name = '$category_name',parent = $parent,status = 1";
	$sql = mysqli_query($databaseLink,$sql);
	header('location:category.php');
}	

?>

<form role="form" method="post">

<table cellpadding="5" cellspacing="5">
<tr><td>
<h2><?php echo $bEdit ? 'Edit' : 'Add '; ?> Category</h2>
<?php if($bEdit){ ?>
<input type="hidden" name="val[category_id]" value="<?php echo $aRow['category_id']; ?>">
<?php } ?>
</td></tr>
<tr><td>
Select Parent : <br />
<?php 
$sql = mysqli_query($databaseLink,"SELECT * FROM `category` WHERE 1 ");
$cnt = mysqli_num_rows($sql);
?>
<select name="val[parent]">
<option value="0"> Select </option>
<?php
if($cnt > 0){
while($parent = mysqli_fetch_assoc($sql))
{
?>
<option value="<?php echo $parent['category_id']; ?>"><?php echo $parent['category_name']; ?></option>
<?php }} ?>
</select>
</td></tr>

<tr><td>
Name : <br />
<input class="form-control" placeholder="Name" name="val[category_name]" type="text" autofocus required value="<?php echo $bEdit ? $aRow['name'] : ''; ?>">
</td></tr>

<tr><td><br />
<button type="submit" class="btn btn-lg btn-success btn-block">Save</button>
</td></tr>
</table>
</form>