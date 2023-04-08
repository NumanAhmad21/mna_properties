@extends('main')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success" id="success-message">
	{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Property Projects Data</b></div>
			<div class="col col-md-6">
				<a href="{{ route('projects.create') }}" class="btn btn-success btn-sm float-end">Add Project</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Description</th>
				<th>Location</th>
				<th>Action</th>
			</tr>
			@if(count($projects) > 0)

				@foreach($projects as $row)

					<tr>
						<td>{{ $row->id }}</td>
						<td>{{ $row->name }}</td>
						<td>{{ $row->description }}</td>
						<td>{{ $row->location }}</td>
						<td>
							<form method="post" class=" d-flex justify-content-around  align-items-around  flex-wrap" action="{{ route('projects.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('projects.show', $row->id) }}"  class="btn btn-primary btn-sm"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Property Project"><i class="fa-solid fa-eye" style="color: #eff1f6;"></i></a>
								<a href="{{ route('projects.edit', $row->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Property Project"><i class="fa-solid fa-pen-to-square" style="color: #0f0f10;"></i></a>
								<button type="submit"   class="show_confirm btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Property Project" ><i class="fa-solid fa-trash" style="color: #f9fafa;"></i> </button>
                                <a href="{{ route('projects.images',$row->id) }}" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Upload Property Project Images"><i class="fa-sharp fa-solid fa-arrow-up-from-bracket" style="color: #f0f2f5;"></i></a>
                                <a href="{{ route('projects.view',$row->id) }}" class="btn btn-dark btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Property Project Images"><i class="fa-regular fa-images" style="color: #eeeff1;"></i></a>
							</form>
							
						</td>
					</tr>

				@endforeach

			@else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
		</table>
		{!! $projects->links() !!}
	</div>
</div>

@endsection