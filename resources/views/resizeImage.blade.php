<html>
	<body>
		<h2>Resize Picture for Thumbnail</h2>
		<br>
		<form action="/resizeImagePost" method="post">
			{{ csrf_field() }}
			Title : <input type="text" name="title">
			@if ($errors->has('nama'))
			    <span class="help-block">
			        <strong>This field is required</strong>
			    </span>
			@endif
			<br>
			<input type="file" name="image">
			@if ($errors->has('image'))
			    <span class="help-block">
			        <strong>This field is required</strong>
			    </span>
			@endif
			<br>
			<button type="submit" class="btn btn-success">Upload Image</button>
		</form>
	</body>

</html>