@include ('layouts.topmenu')
<div class="container mt-3">
	<div class="alert alert-info text-center">
		<strong>TODO‌List</strong>
	</div>

	<div class="card">
		<h5 class="card-header">{{ $todo->title }}</h5>
		<div class="card-body">
			<h5 class="card-title">{{ $todo->title }}</h5>
			<p class="card-text">{{ $todo->description }}</p>
			<a href="{{ route('edit', $todo->id) }}" class="btn btn-warning">edit</a>
		</div>
	</div>
</div>
@include ('layouts.footer')