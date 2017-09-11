<a href='http://localhost/1/mvc2/index.php?c=main' class="btn btn-primary btn-lg">Главная</a>
<?if(isset($this->data->deleteName)) {?>
	<div>Трек <span style='color: blue; font-size: 22px;'><?=htmlspecialchars($this->data->deleteName)?></span> был удалён</div>
<?}?>


<?if (isset($this->data->newName) && isset($this->data->renamedTrack)) {?>
	<div>Трек <span style='color: blue'><?=htmlspecialchars($this->data->renamedTrack)?></span> был переименован в <span style='color: blue'><?=htmlspecialchars($this->data->newName)?></span></div>
<?}?>
<table>
	<? foreach ($this->data->tracks as $a) { ?>
	<tr>
		<td><?=$a['id_music']?> :</td>
		<td style='color: blue;'> <?=$a['name']?></td>
		<td>
			<audio src='music/<?=$a['id_music'].".".$a['format']?>' type='audio/mp3; codecs=vorbis' controls></audio> 
		</td>
		<td>
			<a class='btn btn-md btn-default' href='index.php?c=rename&track_id=<?= $a['id_music']?>'>Переименовать трек</a> 
		</td>
		<td>
			<form name='delete_track_form' method='post' action ='index.php?c=delete'>
				<input type='submit' name='delete_track' class='btn btn-md btn-info' value='Удалить трек'>
				<input type='hidden' name='deleted_track_id' value="<?=$a['id_music']?>">
				<input type='hidden' name='deleted_track_name' value="<?=$a['name']?>">
			</form>
		</td>
	</tr>
	<? } ?>
</table>
<div class='switch_container'>
	<div class='switch_container_left'>
		<div>
			<a class='switcher back-switcher' <?php if (($this->data->pageNumber > 1) && ($this->data->pageNumber <= $this->data->ceilPage)) {?> href='index.php?c=personal_cabinet&page_number=<?=($this->data->pageNumber - 1)?>'<?} else {?>style='opacity: 0.4;'<?}?>>Назад</a>
		</div>
		<span class='page_number'>Страница <?php echo $this->data->pageNumber ?> </span>
	</div>
	<div>
		<a class='switcher forward-switcher' <?php if ($this->data->pageNumber < $this->data->ceilPage) {?> href='index.php?c=personal_cabinet&page_number=<?=($this->data->pageNumber + 1)?>'<?} else {?> style='opacity: 0.4;'<? } ?>>Вперёд</a>
	</div>
</div>
<div><a href='index.php?c=upload' class='btn btn-info'>Загрузить треки</a></div>
<a href='index.php?c=personal_cabinet&page_number=1' class='return_to_1'>Вернуться на страницу 1</a>   