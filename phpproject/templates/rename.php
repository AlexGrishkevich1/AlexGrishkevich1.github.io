
		<form id='track_rename' method='post'>
			<input type='text' name='name_of_rename_track' value='<?= $this->data->renamedTrackName['name'] ?>'>
			<input type='submit' value='Сохранить' name='track_rename'>
		</form>
		<a href='index.php?c=personal_cabinet' class='btn btn-default btn-md'>Отменить</a>