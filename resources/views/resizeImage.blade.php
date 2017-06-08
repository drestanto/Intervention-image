<html>
	<body>
		<h2>Resize Picture for Thumbnail</h2>
		<h3> Resizing images </h3>
		<form action="/resizeImagePost" method="post">
			{{ csrf_field() }}
			Title : <input type="text" name="title" disabled> <br>
			Path : <input type="text" name="path" disabled> <br>
			Width : <input type="text" name="width">
			@if ($errors->has('width'))
			    <span class="help-block">
			        <strong>This field is required</strong>
			    </span>
			@endif
			<br>
			Height : <input type="text" name="height"><br>
			@if ($errors->has('height'))
			    <span class="help-block">
			        <strong>This field is required</strong>
			    </span>
			@endif
			<br>
			<button type="submit" class="btn btn-success">Resize</button>
		</form>
	</body>
</html>