<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>IPUC | Membresia</title>
    <link rel="shortcut icon" type="image/x-icon" href="'img/icon.png'">
</head>
<body>
    <style>
        p{
            font-family: 'Open Sans', sans-serif;
        }
    </style>
    <img style="width: 1050px;" src="img/logo/recuadro6.png">
    <p style="margin-top: -387px; margin-left: 140px; font-size: 12px; width: 50px; z-index: 1; float: none">Cucuta</p>
    <p style="margin-top: -17px; margin-left: 60px; font-size: 12px; z-index: 2; float: none">
        {{ $dia }} &nbsp;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; {{ $mes }}
    </p>
    <p style="margin-top: -17px; margin-left: 37px; font-size: 12px; z-index: 3; float: none">{{ $anio }}</p>
    <img style="width: 180px;
        margin-top: 1px;
        height: 29px;
        margin-left: 65px;" src="{{ $firma_creyente }}" alt="">
    <p style="margin-left: 40px">{{ $nombres }}</p>
    <br>
    <p style="margin-left: 40px; margin-top: -10px">{{ $documento }}</p>

</body>
</html>
