<!DOCTYPE html>
<html>

<head>
    <title>Laporan PDF Data Member</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>

<body>
    <center>
        <h5>Laporan Data Member</h5>
    </center>

    <table class='table table-bordered'>
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">NO</th>
                <th scope="col" class="text-center">Name </th>
                <th scope="col" class="text-center">Product</th>
                <th scope="col" class="text-center">price</th>
                <th scope="col" class="text-center">Date Order</th>
                <th scope="col" class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesan as $p)
            <tr>
                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                <td class="text-center">{{$p->name}}</td>
                <td class="text-center">{{$p->produk}}</td>
                <td class="text-center">{{$p->price}}</td>
                <td class="text-center">{{$p->date_order}}</td>
                <td class="text-center">{{$p->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>