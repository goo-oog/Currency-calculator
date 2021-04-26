<!doctype html>
<html lang="lv">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Valūtas kalkulators</title>
</head>
<body>
<form method="post">
    <select id="currencies" name="symbol" class="text-xl">
        @foreach ($currencies as $currency)
            <option value="{{ $currency->symbol }}"
                    @if(isset($selectedSymbol)&&$selectedSymbol===$currency->symbol)
                    selected
                    @endif>
                {{$props->flag($currency->symbol)}}&emsp;{{ $currency->symbol }}&emsp;{{$props->name($currency->symbol)}}
            </option>
        @endforeach
    </select>
    <input type="text" name="amount" pattern="[\d]+" value="{{$chosenAmount??''}}">
    <input type="submit" value="Rēķināt">
    <p>{{$result??''}}</p>
</form>
</body>
</html>