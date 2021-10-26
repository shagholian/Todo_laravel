<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Index</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" >

</head>
<body>

	@include ('layouts.topmenu')

	<div class="container mt-3">
		@if (session('success'))
			<div class="alert alert-success text-center">
				{{ session('success') }}
			</div>
		@elseif (session('warning'))
			<div class="alert alert-warning text-center">
				{{ session('warning') }}
			</div>
		@endif
		<div class="alert alert-info text-center">
			<strong>TODO‌List</strong>
		</div>
		<div class="col-md-12">
			
			<?php
				foreach($todos as $todo) {
					?>

					<div class="card mt-3">
						<div class="card-body py-2 px-4">
							<p class="p-2 <?php echo $todo->complated == 1 ? 'border-success' : 'border-danger';?> " style="border-left: 4px solid;" >
							    <strong>
							    	@if ($todo->complated == 1)
							    		<del>
											{{ $todo->title }}
											<span class="text-warning">
												<?php // echo "owner is: ". $todo->user->name; ?> 
											</span>
										</del>
						    		@else 
						    			 {{ $todo->title }}
										 <span class="text-warning">
										 	<?php // echo "owner is: ".$todo->user->name; ?> 
										</span>
					    			 @endif
						    	</strong> 
							    <span style="float: right;" >
							    	<a href="{{ route('edit', $todo->id)}}" class="btn btn-outline-warning">edit</a>
									<a href="{{ route('destroy', $todo->id)}}" class="btn btn-outline-danger">destroy</a>
									<a href="{{ route('show', $todo->id)}}" class="btn btn-outline-info">show</a>
							    </span>
							</p>
						</div>
					</div>
					
			<?php		
				}
			?>
		</div>
	</div>
@include ('layouts.footer')