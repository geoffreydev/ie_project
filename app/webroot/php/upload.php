<form enctype="multipart/form-data" action="saveupload.php" method="post">
<table id="submit" summary="Add new dvd submission table">
<tr><td>Choose Image:</td><td><input class="submit" type=file name=file></td></tr>
<tr><td>Image Caption:</td><td><input class="submit"type="text" name="dvdtitle" id="dvdtitle" /> (Optional)</td></tr>
</table>
<input type="hidden" name="add" value="set">
<p class="center"><button onClick="return confirmAdd()" >Upload Image</button></p>

</form>