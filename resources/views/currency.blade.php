<!doctype html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Valūtas kalkulators</title>
</head>
<body>
<table>
    <tr>
        <td>{{$symbol}}</td>
        <td>{{str_replace('.',',',round($rate,2))}}</td>
    </tr>
</table>
</body>
</html>