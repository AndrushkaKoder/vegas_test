<div class="mb-3 file-container">
	<p class="text-center">{{ $title }}</p>
	@if($filepath)
		<div class="admin_edit_img" style="width: 263px">
			<img src="{{ $filepath }}"
			     width="250" height="200" alt="#" class="admin_edit_img_item mb-2">
			{{ Form::button('Удалить', ['class' => 'admin_edit_img_delete']) }}
			{{ Form::hidden("delete_files[{$name}]", '0', ['class' => 'delete_toggler']) }}
		</div>
	@endif
	{{ Form::file("files_image[$name]", ['class' => 'form-control', 'id' => 'input_file']) }}
</div>
