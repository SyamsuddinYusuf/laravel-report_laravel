<!DOCTYPE html>
<html>
<head>
	<title>Eloquent Laravel</title>
</head>
<body>
 
<h1>Data Kota</h1>
 
<ul>
	@foreach($kota as $p)
		<li>{{ "Nama Kota : ". $p->KOTA  }}</li>
	@endforeach
</ul>
 
</body>
</html>
