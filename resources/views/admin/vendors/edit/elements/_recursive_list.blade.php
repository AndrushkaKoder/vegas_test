<ul>
	@foreach($items as $item)
		<li style="list-style: none">
			<input type="checkbox"
			       class="form-check-input"
			       id="category_id"
			       name="category[{{ $item->id }}]"
			       @if(in_array($item->id, $product->categories->pluck('id')->toArray())) checked @endif>
			<label for="category_id" class="form-label">{{ $item->title }}</label>

			@if($item->children->count())
				@include('admin.products.edit.elements._recursive_list', ['items' => $item->children])
			@endif
		</li>
	@endforeach
</ul>

