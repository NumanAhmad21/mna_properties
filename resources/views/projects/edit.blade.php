@extends('main')

@section('content')
@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif
<a href="{{ route('projects.index') }}" class="btn btn-dark btn-sm">Go back to home</a>
<div class="card">
	<div class="card-header">Edit Student</div>
	<div class="card-body">
		<form method="post" action="{{ route('projects.update', $projects->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">
                    Project Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" value="{{ $projects->name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">description</label>
				<div class="col-sm-10">
					<input type="text" name="description" class="form-control" value="{{ $projects->description }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Location</label>
				<div class="col-sm-10">
                    <div class="col-sm-10">
                        <input type="text" name="location" class="form-control" value="{{ $projects->location }}" />
                    </div>
				</div>
			</div>
			
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $projects->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>
<script>
</script>

@endsection('content')