<?php use Illuminate\Support\Facades\Auth; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
		<?php
		if(isset($title)) echo $title;
		else echo 'Todo App';
		?>
	</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style type="text/css">
            .form-control {
                margin-bottom: 10px;
            }
        </style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
	<div class="container-fluid">
		<a class="navbar-brand" href="#">TODO‌List</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="{{ route('index')}}">List</a>
				</li>
				@if (Auth::user()->role == 1) 
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('create')}}">add todo</a>
					</li>
				@endif

				@if (!Auth::check()) 
					
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login')}}">Login</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register')}}">Register</a>
					</li>
				@else 
					<form action="{{ route('logout')}}" method="POST">
						@csrf
						<button class="nav-link btn btn-dark" type="submit">Logout</button>
					</form>
				@endif
			</ul>

			@if (Auth::check()) 
					
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<span style="font-size: 40px;">&#9786;</span> <?php echo Auth::user()->name; ?>
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="{{ route('profile/show', Auth::user()->id) }}">Show</a></li>
						<li><a class="dropdown-item" href="{{ route('profile/edit', Auth::user()->id) }}" >Edit</a></li>
						<li><a class="dropdown-item" href="{{ route('profile/myTodos', Auth::user()->id) }}" >My Todos</a></li>
					</ul>
				</li>
			@endif
		</div>
	</div>
</nav>