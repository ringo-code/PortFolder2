<<<<<<< HEAD
<link rel="stylesheet" href="{{ asset('css/post.1.css') }}">
=======
>>>>>>> 895986be514a1de7f3264a7ca2109f2798095e7a
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form 
	method="post"
	action="{{ route('upload_image') }}"
	enctype="multipart/form-data"
>
<<<<<<< HEAD

=======
>>>>>>> 895986be514a1de7f3264a7ca2109f2798095e7a
	@csrf
	<input type="file" name="image" accept="image/png, image/jpeg">/>
	<input type="submit" value="Upload">
</form>