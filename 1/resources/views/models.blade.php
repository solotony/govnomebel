<div>
	@foreach($models as $model)
		<div>
			<a href="{{ url('/'.$product->path.'/'.$model->path.'') }}">{{ $model->name }}</a>
			<a href="#">Конфигуратор</a>
		</div>
	@endforeach
</div>