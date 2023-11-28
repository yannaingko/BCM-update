<!DOCTYPE html>
<html lang="en">
<head>
     <style>
        body{
            width: 100%;
            background: url("https://cdn.pixabay.com/photo/2015/04/19/08/32/marguerite-729510_1280.jpg");
            background-repeat: no-repeat;
            background-size: 100vw;
            overflow: hidden;
        }
        .card{
            position: relative;
            top: 200px;
            padding: 1em;
            width: 75%;
            background: rgba(255, 254, 254, 0.329);
            backdrop-filter: blur(4px);
            border-radius: 20px;
            margin: auto;
            text-align: center;
        }
        .tit{
            font-size: 17px;
            font-weight: 500;
        }
        .code{
            background: rgba(255, 255, 255, 0.322);
            width: 100%;
            border-radius: 20px;
            margin: auto;
            font-weight: bolder;
            backdrop-filter: blur(10px);
            font-size: 25px;
        }
     </style>
    <title>{{$data['title']}}</title>
</head>
<body>

    <div class="card">
        <p class="tit">Your OTP Code is</p>
        <p class="code">{{ $data['body'] }}</p>
        <br>
        <p>Thank You!</p>
    </div>

</body>
</html>
