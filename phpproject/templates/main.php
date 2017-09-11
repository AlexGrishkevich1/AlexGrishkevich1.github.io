<form method='get'  class='q' style='width: 227px;'>
	<input type='search'  name='q' placeholder='Поиск' style='float: left;' value='<?=$this->data->searchQuery ?>'>
	<input type='submit' value='Найти' style='float: right;' class='btn btn-warning btn-xs'>
</form>
<?if (!isset($this->data->searchQuery)) {?>
	<div>Вся музыка:</div>
<?} else {?>
	<div>Результат поиска:</div>
<?}?>
<table>
	<? foreach ($this->data->tracks as $a) { ?>
		<tr>
			<td><?=$a['id_music']?>:</td>
			<td style='color: blue;'><?=$a['name']?></td>
			<td>
				<audio src='music/<?=$a['id_music'].".".$a['format']?>' type='audio/mp3; codecs=vorbis' controls></audio> 
			</td>
		</tr>
			
	<?}?>
</table>
<a href='index.php?c=upload' class='btn btn-info'>Загрузить треки</a>
<div class='switch_container'>
	<div class='switch_container_left'>
		<?if ($this->data->pageNumber > 1) {?>
		<div>
			<a class='switcher back-switcher' href='index.php?c=main&<?=http_build_query($this->data->preferParamsPrevious)?>'>Назад</a>
		</div>
		<?}?>
		<span class='page_number'>Страница <?= $this->data->pageNumber ?> </span>
	</div>
	<? if ($this->data->pageNumber < $this->data->ceilPage) { ?>
	<div>
		<a class='switcher forward-switcher' href='index.php?c=main&<?=http_build_query($this->data->preferParamsNext)?>'>Вперёд</a>
	</div>
	<? } ?>
</div>

