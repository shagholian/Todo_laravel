<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" >

</head>
<body>

	<div class="container mt-3">
		<div class="alert alert-info text-center">
			<strong>Create TODO‌List</strong>
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
			<form action="<?php echo route('store');?>" method="POST">
				@csrf
				<div class="mb-3">
				  <label for="title" class="form-label">title</label>
				  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title" name="title" value="{{old('title')}}">
				  @error('title')
					  <div class="invalid-feedback">
				        {{ $message }}
				      </div>
			      @enderror
				</div>
				<div class="mb-3">
				  <label for="description" class="form-label">Description</label>
				  <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{old('description')}}</textarea>
				  @error('description')
					  <div class="invalid-feedback">
				        {{ $message }}
				      </div>
			      @enderror
				</div>
				<div class="form-check form-check-inline">
				  <label class="form-check-label" for="complated">complated</label>
				  <input class="form-check-input" type="radio" id="checkboxNoLabel" value="1" name="complated">
			  	</div>
			  	<div class="form-check form-check-inline">
			  		<label class="form-check-label" for="complated">progress</label>
				  <input class="form-check-input" type="radio" id="checkboxNoLabel" value="0" name="complated">
			  		</div>
				  @error('complated')
					  <div class="invalid-feedback">
				        {{ $message }}
				      </div>
			      @enderror
				</div>
				<div class="d-grid gap-2 col-2 mt-4">
					<button class="btn btn-primary btn-block">save</button>
				</div>
			</form>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>