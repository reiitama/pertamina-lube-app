<!DOCTYPE html>
<html>

<head>
    <style>
        /* Tampilan container */

        /* Gaya tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-left: -30px;
        }

        th,
        td {
            padding: 5px 5px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Gaya judul tabel */
        h1 {
            text-align: center;
            position: relative;
        }

        /* Gaya logo pojok kiri atas */
        .logo-left {
            position: absolute;
            top: 0;
            left: 0;
        }

        /* Gaya logo pojok kanan atas */
        .logo-right {
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="logo-left">
            <img src="{{ asset('assets/oil-clinic.png') }}" alt="logo" style="height: 3em; width: 2em;">
        </div>
        <h1>Condemning Limit</h1>

        Manufacture : {{ $data['manufacture_date'] }}
        <br>
        Component : {{ $data['component'] }}
        <br>
        Application : {{ $data['application'] }}
        <br>
        Model : {{ $data['model'] }}
        <br>
        <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Min</th>
                    <th>Max</th>
                    <th>Border</th>
                    <th>Numeric/%</th>
                    <th>Keterangan</th>

                </tr>
            </thead>
            <tbody>
                @php $count = 0; @endphp
                @foreach ($data['condems'] as $item)
                    @foreach ((array) $item as $key => $value)
                        @php
                            $words = explode(' ', $key);
                            $lastWord = end($words);
                        @endphp
                        @if ($count % 5 == 0)
                            </tr>
                            <tr>
                                <td>{{ str_replace($lastWord, '', $key) }}</td>
                        @endif

                        @if ($lastWord == 'per')
                            @if ($value == '1')
                                <td>{{ 'PERCENT' }}</td>
                            @elseif ($value == '0')
                                <td>{{ 'NUMERIC' }}</td>
                            @else
                                <td>{{ $value }}</td>
                            @endif
                        @else
                            <td>{{ $value }}</td>
                        @endif

                        @php $count++; @endphp
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
