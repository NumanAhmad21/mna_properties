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
<form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Property Project Id</label>
                <input type="text" name="project_id" id="project_id" value="{{ request()->route('id') }}" class="form-control"  placeholder="Property Project Id" >
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Media </label>
                <input class="form-control" type="file" name="images[]" multiple id="formFile">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
</form>



@endsection('content')