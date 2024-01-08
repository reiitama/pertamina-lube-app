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
            <img src="{{ asset('assets/oilclinic-logo.png') }}" alt="" style="height: 3em; width: 2em;">
        </div>
        @foreach ($data as $keyData => $valueData)

            <h1>Condemning Limit</h1>
            Customer Name : {{ $valueData['customer_name'] }}
            <br>
            Area : {{ $valueData['area'] }}
            <br>
            City : {{ $valueData['city'] }}
            <br>
            Equip : {{ $valueData['equip'] }}
            <br>
            Equip Engine : {{ $valueData['equip_engine'] }}
            <br>
            Model : {{ $valueData['model'] }}
            <br>
            <br>
        <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Min</th>
                    <th>Max</th>
                    <th>Border</th>
                    <th>Numeric/%</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 0; @endphp
                @foreach ($valueData['custo_condem'] as $item)
                    @foreach ((array) $item as $key => $value)
                        @php
                            $words = explode(' ', $key);
                            $lastWord = end($words);
                        @endphp
                        @if ($count % 4 == 0)
                            </tr>
                            <tr>
                                <td>{{ str_replace($lastWord, '', $key) }}</td>
                        @endif

                        @if ($lastWord == 'per')
                            @if ($value == '1')
                                <td>{{ 'Percent / %' }}</td>
                            @elseif ($value == '0')
                                <td>{{ 'Numeric' }}</td>
                            @elseif ($value == '-')
                                <td>{{ 'None' }}</td>
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
        @endforeach
    </div>
</body>

</html>