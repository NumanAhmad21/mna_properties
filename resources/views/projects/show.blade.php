@extends('main')

@section('content')
<a href="{{ route('projects.index') }}" class="btn btn-dark btn-sm">Go back to home</a>
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Property Project Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('projects.index') }}" class="btn btn-dark btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Project Name</b></label>
			<div class="col-sm-10">
				{{ $projects->name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Descriptiono</b></label>
			<div class="col-sm-10">
				{{ $projects->description }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Location</b></label>
			<div class="col-sm-10">
				{{ $projects->location }}
			</div>
		</div>
		
	</div>
</div>

@endsection('content')