<div class="mb-3 file-container">
	<p class="text-center">{{ $title }}</p>
	@if($file)
		<div class="admin_edit_img">
			<img src="{{ $file->getPath() }}"
			     width="270" height="200" alt="#" class="admin_edit_img_item mb-2">
			<button type="button" class="admin_edit_img_delete">Удалить</button>
			<input type="hidden" name="delete_files[{{ $name }}]" class="delete_toggler"
			       value="0">
		</div>
	@endif
	<input type="file" name="files_image[{{ $name }}]" class="form-control" style="width:92%">
</div>
