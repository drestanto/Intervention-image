<html>
	<body>
		<h2>Resize Picture for Thumbnail</h2>
		<h3> Store your image first </h3>
		<form action="/store" enctype="multipart/form-data" method="post">
			{{ csrf_field() }}
			Title : <input type="text" name="title">
			@if ($errors->has('title'))
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
			<input type="submit" value="Store">
		</form>
	</body>

</html>