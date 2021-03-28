<!DOCTYPE html>
<html>

<head>
    <title>Laporan PDF Data Instructor</title>
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
        <h5>Laporan Data Instructor</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th scope="col" class="text-center">NO</th>
                <th scope="col" class="text-center">Nama </th>
                <th scope="col" class="text-center">class</th>
                <th scope="col" class="text-center">price</th>
                <th scope="col" class="text-center">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bill as $b)
            <tr>
                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                <td class="text-center">{{$b->name}}</td>
                <td class="text-center">{{$b->class}}</td>
                <td class="text-center">{{$b->price}}</td>
                <td class="text-center">{{$b->date}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>