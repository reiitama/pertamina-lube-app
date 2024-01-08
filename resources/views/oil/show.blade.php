<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <div class="container mt-4">
        <hr>
        @foreach ($categories as $category => $dataCount)
            <hr>
            <h2>{{ $category }}</h2>
            <div class="row">
                @for ($i = 0; $i < $dataCount; $i++)
                    @php $index = ($loop->index * $dataCount) + $i @endphp
                    @if ($index < count($columns))
                        <div class="col-md-2">
                            <label for="{{ Str::slug($columns[$index]) }}"
                                class="form-label">{{ getLastWord($columns[$index]) }}</label>
                            <input type="text" id="{{ Str::slug($columns[$index]) }}" class="form-control"
                                value="{{ parseValue(getLastWord($columns[$index]), $oil[$columns[$index]]) }}" readonly>
                        </div>
                    @endif
                @endfor
            </div>
            <br>
        @endforeach
    </div>
</body>

</html>

@php

    function getLastWord($str)
    {
        $words = explode(' ', $str);
        $lastWord = end($words);
        $capitalizedLastWord = ucfirst($lastWord);
        return $capitalizedLastWord;
    }

    function parseValue($type, $value)
    {
        if ($type != 'Per') {
            return $value;
        }
        if ($value == '1') {
            return 'Percent / %';
        }
        if ($value == '0') {
            return 'Numeric';
        }
        if ($value == '-') {
            return 'None';
        }
        return $value;
    }
@endphp
