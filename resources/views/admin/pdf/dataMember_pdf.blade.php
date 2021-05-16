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
                {{-- <th scope="col" class="text-center">Photo</th> --}}
                <th scope="col" class="text-center">Nama</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Class Category</th>
                <th scope="col" class="text-center">Join</th>
                <th scope="col" class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                {{-- <td>
                                                <img class="card-img-top" src="{{ asset ('photo/'. $u->photo) }}" alt="Card image cap" width="30">
                </td> --}}
                <td class="text-center">{{ $u->name }}</td>
                <td class="text-center">{{ $u->email }}</td>
                <td class="text-center">{{ $u->class_category }}</td>
                <td class="text-center">{{ $u->date }}</td>
                <td class="text-center">{{ $u->status }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>