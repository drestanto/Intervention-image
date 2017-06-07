<html>
	<body>
		<h2>Resize Picture for Thumbnail</h2>
		<br>
		<form action="/resizeImagePost" method="post">
			{{ csrf_field() }}
			Title : <input type="text" name="title"><br>
			<input type="file" name="image"><br>
			<button type="submit" class="btn btn-success">Upload Image</button>
		</form>
	</body>

</html>