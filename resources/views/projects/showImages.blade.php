@extends('main')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success" id="success-message">
	{{ $message }}
</div>

@endif
<a href="{{ route('projects.index') }}" class="btn btn-dark btn-sm">Go back to home</a>
<div class="container">
            <div class="row">
            @if($images->isEmpty())   
            <div class="alert alert-danger">
               Images Not Fount
            </div>
            @endif
            @foreach ($images as $image)
                <div class="col-md-4 mt-3 col-lg-3 position-relative" >
                    <img src="{{url('public/images/'.$image->file_name)}}" class="img-fluid" alt="image">
                    <form method="post" action="{{ route('projects.images.destroy',  $image->id) }}">
						@csrf
						@method('DELETE')
						<button type="submit" class="show_confirm btn btn-danger btn-sm position-absolute top-0 start-25 translate-middle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Property Project Image"><i class="fa-solid fa-trash" style="color: #f9fafa;"></i></button>
                    </form>
                </div>
            @endforeach
                
                
            </div>
        </div>



@endsection


