<!DOCTYPE html>
<html>
<head>
<title>Search Function</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<form action="/search" method="POST" role="search">
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" class="form-control" name="q"
					placeholder="Search keywords"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>
		<!-- Dispay recorded database -->
		<div class="container">
			@if(isset($details))
			<h2>Search Results for <b> {{ $query }} </b> ...</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Book Name</th>
						<th>ISBN</th>
						<th>Location</th>
						<th>Status</th>
						<th>Unit Available</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $user)
					<tr>
						<td>{{$user->book_id}}</td>
						<td>{{$user->book_title}}</td>
						<td>{{$user->book_isbn}}</td>
						<td>{{$user->book_location}}</td>
						<td>{{$user->book_status}}</td>
						<td>{{$user->book_unit}}</td>

					</tr>
					@endforeach
				</tbody>
			</table>
			@elseif(isset($message))
			<p>{{ $message }}</p>
			@endif
		</div>

</body>
</html>