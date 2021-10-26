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
			<strong>My Todo List</strong>
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
							    		<del>{{ $todo->title }}</del>
						    		@else 
						    			 {{ $todo->title }}
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