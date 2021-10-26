@include ('layouts.topmenu')

	<div class="container mt-3">
		<div class="alert alert-info text-center">
			<strong>Edit TODO‌List</strong>
		</div>
		<div class="col-md-12">

			@if($errors->any()) 
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div> 
			@endif
			<form action="<?php echo route('update', $todo->id);?>" method="POST">
				@method('put')
				@csrf
				<div class="mb-3">
				  <label for="title" class="form-label">title</label>
				  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value={{ $todo->title }} placeholder="title" name="title">
				  @error('title')
					  <div class="invalid-feedback">
				        {{ $message }}
				      </div>
			      @enderror
				</div>
				<div class="mb-3">
				  <label for="description" class="form-label">Description</label>
				  <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">
				  	{{ $todo->description }}
				  </textarea>
				  @error('description')
					  <div class="invalid-feedback">
				        {{ $message }}
				      </div>
			      @enderror
				</div>
				<div class="form-check form-check-inline">
				  <label class="form-check-label" for="complated">complated</label>
				  <input class="form-check-input" type="radio" id="complated" value="1" name="complated" <?php if($todo->complated == 1) echo 'checked'; ?> >
			  	</div>
			  	<div class="form-check form-check-inline">
			  		<label class="form-check-label" for="progress">progress</label>
				  <input class="form-check-input" type="radio" id="progress" value="0" name="complated" <?php if($todo->complated == 0) echo 'checked'; ?>>
			  		</div>
				  @error('complated')
					  <div class="invalid-feedback">
				        {{ $message }}
				      </div>
			      @enderror
				</div>
				<div class="d-grid gap-2 col-2 mt-4">
					<button class="btn btn-outline-warning btn-block">update</button>
				</div>
			</form>
		</div>
	</div>

	@include ('layouts.footer')