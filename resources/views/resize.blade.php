<html>
	<body>
		<h2>Resize Picture for Thumbnail</h2>
		Image stored in folder /images/ <br>
		<h3> Resizing images </h3>
		<form action="/resizeImagePost2" enctype="multipart/form-data" method="post">
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
			<br><br>
			<strong> Resize to </strong><br>
			Width : <input type="text" name="width">
			@if ($errors->has('width'))
			    <span class="help-block">
			        <strong>This field is required</strong>
			    </span>
			@endif
			<br>
			Height : <input type="text" name="height">
			@if ($errors->has('height'))
			    <span class="help-block">
			        <strong>This field is required</strong>
			    </span>
			@endif
			<br>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>