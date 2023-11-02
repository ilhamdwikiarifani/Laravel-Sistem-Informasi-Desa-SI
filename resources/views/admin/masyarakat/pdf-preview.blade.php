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

    <h3 class="text-center">Data Masyarakat</h3>

    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th> No </th>
                <th> Foto</th>
                <th> Nik </th>
                <th> Nama Lengkap </th>
                <th> Jenis Kelamin </th>
                <th> Agama </th>
                <th> Status </th>
                <th> Tempat Lahir </th>
                <th> Tanggal Lahir </th>
                <th> Pendidikan Terakhir</th>
            </tr>
        </thead>
        <tbody>

            @php $no=1; @endphp
            @foreach ($masyarakats as $masyarakat)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td><img width="50px" src="{{ asset('storage/' . $masyarakat->foto) }}" alt=""></td>
                    <td>{{ $masyarakat->nik }}</td>
                    <td>{{ $masyarakat->nama }}</td>
                    <td>{{ $masyarakat->jenis_kelamin }}</td>
                    <td>{{ $masyarakat->agama->nama }}</td>
                    <td>{{ $masyarakat->status }}</td>
                    <td>{{ $masyarakat->tempat_lahir }}</td>
                    <td>{{ $masyarakat->tanggal_lahir }}</td>
                    <td>{{ $masyarakat->pendidikan_terakhir }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>



</body>

</html>
