<a href="{{ route($route, ['id' => $item->id, 'param' => $param]) }}" data-param-toggle data-icon0="{{ $icon0 }}"
   data-icon1="{{ $icon1 }}" class="{{ $class ?? '' }}">
	<i class="nav-icon fas {{ hclass($item->getAttribute($param), $icon1, $icon0) }}"
	   style=" color: {{ hclass($item->getAttribute($param),'green', 'gray') }}"></i>
</a>
