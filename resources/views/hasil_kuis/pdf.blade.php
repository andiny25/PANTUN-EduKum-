<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Hasil Kuis</title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
        }

        h2{
            text-align:center;
            margin-bottom:5px;
        }

        p{
            text-align:center;
            margin-bottom:20px;
            color:#666;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th,
        table td{
            border:1px solid #ddd;
            padding:8px;
            text-align:left;
        }

        table th{
            background:#EAB308;
            color:white;
        }

        tr:nth-child(even){
            background:#f9f9f9;
        }

    </style>

</head>

<body>

<h2>LAPORAN HASIL KUIS PANTUN</h2>

<p>
Tanggal Cetak :
{{ now()->format('d F Y') }}
</p>

<table>

<thead>

<tr>

<th>No</th>
<th>Nama</th>
<th>Kuis</th>
<th>Skor</th>
<th>Status</th>
<th>Tanggal</th>

</tr>

</thead>

<tbody>

@foreach($data as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $item->nama }}</td>

<td>{{ $item->kuis }}</td>

<td>{{ $item->skor }}</td>

<td>{{ $item->status }}</td>

<td>{{ optional($item->created_at)->format('d-m-Y') }}</td>

</tr>

@endforeach

</tbody>

</table>

</body>
</html>