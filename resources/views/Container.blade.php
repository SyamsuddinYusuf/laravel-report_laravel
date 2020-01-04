<!DOCTYPE html>
<html>
<head>
	<title>DATA PACKING LIST</title>
</head>
<body>

	<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>

	<h3>DATA PACKING LIST</h3>

	<table border="1">
		<tr>
			<th>NO PACKING LIST TAHUN 2019</th>
			<th>TAHUN</th>
			<th>BULAN</th>
			<th>NO BL</th>
		</tr>
		@foreach($container as $p)
		<tr>
			<td>{{ $p->NOMER_PACKING_LIST }}</td>
			<td>{{ $p->TAHUN }}</td>
			<td>{{ $p->BULAN }}</td>
			<td>{{ $p->NOMER_BL }}</td>
		</tr>
		@endforeach
	</table>

	<br/>
	Halaman : {{ $container->currentPage() }} <br/>
	Jumlah Data : {{ $container->total() }} <br/>
	Data Per Halaman : {{ $container->perPage() }} <br/>


	{{ $container->links() }}


</body>
</html>