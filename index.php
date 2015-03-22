<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отслеживание трек кода Почты России</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
    <link rel="stylesheet" href="libs/font-awesome-4.2.0/css/font-awesome.min.css" />
 
    </head>
<body>
<div class="top_header">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
            <h1>Отслеживание трек кода Почты России</h1>
            </div>
        </div>
    </div>
</div>

<div class="main">
    <div class="container">
        <div class="tab">
            <div class="row title-icons hidden-md hidden-lg">
                <div class="col-md-1 col-sm-2 col-xs-12 Ico">
                <i class="fa fa-calendar"></i>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-12 Ico">
                <i class="fa fa-clock-o"></i>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-6 Ico">
                <i class="fa fa-info-circle"></i>
                </div>
                <div class="col-md-5 col-sm-4 col-xs-6 Ico">
                <i class="fa fa-globe"></i>
                </div>
            </div>
            <div class="row title-name">
                <div class="col-md-1 col-sm-2">
                Дата
                </div>
                <div class="col-md-1 col-sm-1">
                Время
                </div>
                <div class="col-md-5 col-sm-5">
                <i class="fa fa-info-circle"></i>
                Событие
                </div>
                <div class="col-md-5 col-sm-4">
                <i class="fa fa-globe"></i>
                Место
                </div>
            </div>
            <?php
            $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://postabot.ru/tr/tracker2.php?track-number=RI082589626CN&carrier=ems");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $data = curl_exec($curl);
                curl_close($curl);
            $xml = simplexml_load_string($data);
            $items = $xml->track_number->items->item->tracking;
            foreach ($items as $key => $value) {
            foreach ($value as $track) {
            echo("
            <div class='row info'>
            <div class='col-md-1 col-sm-2 col-xs-12 date'>
                {$track['date']}
            </div>
            <div class='col-md-1 col-sm-1 col-xs-12 time'>
                {$track['time']}
            </div>
            <div class='col-md-5 col-sm-5 col-xs-6'>
                {$track['event']}
            </div>
            <div class='col-md-5 col-sm-4 col-xs-6'>
                {$track['geo']}
            </div>
            </div>"
            );
            }
            };
            ?> 
            
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="row">
        
        <div class="col-md-4 col-xs-6 left">
        Разработка back-end и парсинг:<br> Владимир Киверник
        </div>
        <div class="col-md-4 col-xs-6 col-md-offset-4 right">
        Создание front-end и верста:<br> Хатеева Виктория
        </div>
        </div>
    </div>
</div>

</body>
</html>
