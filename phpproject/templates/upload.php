<? if (strlen($this->data->globalError) > 0) {?> 
<div> <?= $this->data->globalError ?> </div>
<?} ?>
<form enctype="multipart/form-data" action="" id="uploadfile" method="post" name="uploadfile">
	<div>
		<input type='text' name='track_name' id='track_name'>
		<label for='track_name'>Название трека</label>
	</div>
	<div>
		<input type='file' name='upload_file' id='upload_file' accept="audio/*">
	</div>
	<input type='submit' name='add_track' id='add_track' value='Загрузить' class='btn btn-sm btn-info'>
</form>
<a href='index.php' class='to_home'>На Главную</a>
