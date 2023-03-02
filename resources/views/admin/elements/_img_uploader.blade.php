<div class="mb-3 file-container">
	<p class="text-center">{{ $title }}</p>
	@if($file)
		<div class="admin_edit_img">
			<img src="{{ $file->getPath() }}"
			     width="270" height="200" alt="#" class="admin_edit_img_item mb-2">
			{{ Form::button('Удалить', ['class' => 'admin_edit_img_delete']) }}
			{{ Form::hidden("delete_files[{$name} ]", '0', ['class' => 'delete_toggler']) }}
		</div>
	@endif
	{{ Form::file("files_image[{$name}]", ['class' => 'form-control']) }}
	{{--	<input type="file" name="files_image[{{ $name }}]" class="form-control" style="width:92%">--}}
</div>
