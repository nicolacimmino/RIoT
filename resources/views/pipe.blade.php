<!DOCTYPE html>
<html>

    <head>
        <title>Pipe</title>

        <style>
            @font-face {
                font-family:"digital-7mono";
                src: url("/fonts/digital-7mono.ttf")
            }
        </style>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
        <meta http-equiv="refresh" content="10">
    </head>
    <body>
        <div class="container" style="font-family: 'digital-7mono';font-size: 300%">
            <div class="content" style="text-align: right">
                {{$temp}} C
            </div>
            <div width="10%">&nbsp;</div>
            <div class="content" style="text-align: right">
                {{$hum}} %
            </div>
            <div width="10%">&nbsp;</div>
            <div class="content" style="text-align: right">
                {{$bat}} V
            </div>
        </div>
    </body>
</html>
