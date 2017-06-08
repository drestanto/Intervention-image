<html>
	<body>
		<h2>Resize Picture for Thumbnail</h2>
		Image stored in folder /images/ <br>
		<h3> Resizing images </h3>
		<form action="/resizeImagePost" method="post">
			{{ csrf_field() }}
			Title : <input type="text" name="title" value="{{ $title }}" readonly="readonly"> <br>
			Path : <input type="text" name="path" value="{{ $path }}" readonly="readonly"> <br><br>
			<strong> Resize to </strong><br>
			Width : <input type="text" name="width"><br>
			Height : <input type="text" name="height"><br>
			<button type="submit" class="btn btn-success">Resize</button>
		</form>
	</body>
</html>