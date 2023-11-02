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

        table td {
            font-size: 10px;
        }
    </style>

</head>

<body>

    <h3>Data Sumber Dana</h3>
    <table border="1" cellspacing="0" cellpadding="4">
        <thead>
            <tr>
                <th> No </th>
                <th> Nama/Sumber Dana</th>
                <th> Jumlah </th>
                <th> Keterangan </th>
                <th> Waktu </th>
            </tr>
        </thead>
        <tbody>

            @php $no=1; @endphp
            @foreach ($danas as $dana)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $dana->nama }}</td>
                    <td>@money($dana->jumlah)</td>
                    <td>{{ $dana->keterangan }}</td>
                    <td>{{ $dana->waktu }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <br><br>
    <h3>Data Dana Masuk</h3>
    <table border="1" cellspacing="0" cellpadding="4">
        <thead>
            <tr>
                <th> No </th>
                <th> Nama/Sumber Dana</th>
                <th> Jumlah </th>
                <th> Keterangan </th>
                <th> Waktu </th>
                <th> Penginput </th>
            </tr>
        </thead>
        <tbody>
            @if ($danaMasuk != '[]')
                @php $no=1; @endphp
                @foreach ($danaMasuk as $dm)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $dm->dana->nama }}</td>
                        <td>@money($dm->jumlah)</td>
                        <td>{{ $dm->keterangan }}</td>
                        <td>{{ $dm->waktu }}</td>
                        <td>{{ $dm->user->masyarakat->nama }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center">Belum Ada Data</td>
                </tr>
            @endif
        </tbody>
    </table>


    <br><br>
    <h3>Data Dana Keluar</h3>
    <table border="1" cellspacing="0" cellpadding="4">
        <thead>
            <tr>
                <th> No </th>
                <th> Nama/Sumber Dana</th>
                <th> Jumlah </th>
                <th> Keterangan </th>
                <th> Waktu </th>
                <th> Penginput </th>
            </tr>
        </thead>
        <tbody>
            @if ($danaKeluar != '[]')
                @php $no=1; @endphp
                @foreach ($danaKeluar as $dk)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $dk->dana->nama }}</td>
                        <td>@money($dk->jumlah)</td>
                        <td>{{ $dk->keterangan }}</td>
                        <td>{{ $dk->waktu }}</td>
                        <td>{{ $dk->user->masyarakat->nama }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center">Belum Ada Data</td>
                </tr>
            @endif
        </tbody>
    </table>


</body>

</html>
