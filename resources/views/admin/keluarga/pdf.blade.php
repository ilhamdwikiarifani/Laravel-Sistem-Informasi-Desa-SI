<!doctype html>
<html lang="en">

<head>

    <title>Data Masyarakat</title>

    <style>
        * {
            box-sizing: border-box;
        }

        .text-center {
            text-align: center;
        }
    </style>

</head>

<body>

    <h3 class="text-center">Data Keluarga</h3>

    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th> No </th>
                <th> N0. KK </th>
                <th> kepala Keluarga </th>
                <th> Alamat </th>
                <th> Jumlah Keluarga </th>
            </tr>
        </thead>
        <tbody>

            @php $no=1; @endphp
            @foreach ($keluargas as $keluarga)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $keluarga->nikk }}</td>
                    <td>{{ $keluarga->kepala_keluarga }}</td>
                    <td>{{ $keluarga->alamat }}</td>
                    <td>{{ $keluarga->jumlah_keluarga }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>



</body>

</html>
