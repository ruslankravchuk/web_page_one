<?php

session_start();

//Перевірка сесії на авторизацію користувача
if(!isset($_SESSION['username'])){
    header("location: authorization.php");
}

require_once 'config.php';

/*$locationObject = $_POST["location"];
$_SESSION["location"] = $_POST["location"];

$_SESSION["dateFrom"] = $_POST["dateFrom"];
$currentValueDateFrom = $_POST["dateFrom"];
$_SESSION["dateTo"] = $_POST["dateTo"];
$currentValueDateTo = $_POST["dateTo"];*/

if(!isset($_POST['location']) && !empty(trim($_POST["location"]))){
    $locationObject = 1;
} else {
    $locationObject = $_POST["location"];
}

if(!isset($_POST['dateFrom']) && !empty(trim($_POST["dateFrom"]))){
    $currentValueDateFrom = $_SESSION["dateFrom"];
} else {
    $currentValueDateFrom = $_POST["dateFrom"];
}

if(!isset($_POST['dateTo']) && !empty(trim($_POST["dateTo"]))){
    $currentValueDateTo = $_SESSION["dateTo"];
} else {
    $currentValueDateTo = $_POST["dateTo"];
}


//Вибірка записів з таблиці об'єктів
$Viyskovi_I_bat = "SELECT * from Viyskovi_I_bat";
if($result = mysqli_query($link, $Viyskovi_I_bat)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row_place = mysqli_fetch_array($result)) {
            $places[] = $row_place;
        }
    }
}

//Вибірка записів для заповнення таблиці
$sql = "SELECT * from meters WHERE places_placeid = '$locationObject' AND  mdate BETWEEN '$currentValueDateFrom' AND '$currentValueDateTo' ORDER BY mdate";
if($result = mysqli_query($link, $sql)) {
    $count_of_rows = mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $records[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>облік військовослужбовців</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/chart.css">
</head>
<body>
<?php include("header.html"); ?>
<article>
    <section id="outputBlock">
        <div class="container-flow">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12" style="margin-left:0px">
                    <form class="form-inline" role="form" id="filterUser" action="index.php" method="post">
                        <fieldset>
                            <legend>Фільтр</legend>
                            <fieldset class="filterItem">
                                <legend>Об'єкт(адреса)</legend>
                                <div class="form-group">
                                    <label for="location"></label>
                                    <select name="location" name="location" id="location" required>
                                        <? foreach ($places as $place): ?>
                                            <option value="<?php echo $place['placeid'] ?>" <?php if($locationObject == $place['placeid']) echo " selected" ?>><?php echo $place['adress'] ?></option>
                                        <? endforeach ?>
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="filterItem" style="margin-top:15px">
                                <legend>Період</legend>
                                <div class="form-group">
                                    <label for="dateFrom">З</label>
                                    <input type="date" class="form-control" name="dateFrom" id="dateFrom" required>
                                </div>
                                <div class="form-group">
                                    <label for="dateTo">по</label>
                                    <input type="date" class="form-control" name="dateTo" id="dateTo" required>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-warning" style="margin:15px 20px">Відібрати</button>
                        </fieldset>
                    </form>
                    <?php if ($count_of_rows < 1) echo "<span id='message' style='margin-left:20px; font-weight: bold'>На даний момент запит не виконано (відсутні записи по заданому фільтру)</span>" ?>

                    <table id="main-table" class="table" <?php if ($count_of_rows < 1) echo "style='display:none'"?>>
                        <caption>
                            <h3 id="tableCaption">Кількість за період з <?php echo $currentValueDateFrom;?> по <?php echo $currentValueDateTo;?></h3>
                        </caption>
                        <thead>
                        <tr>
                            <th rowspan="2">№</th>
                            <th rowspan="2">Дата</th>
                            <th>t,</th>
                            <th rowspan="2">Показник кількості військовослужбовців(hm)</th>
                            <th rowspan="2">Показник кількості військовослужбовцівГ</th>
                            <th rowspan="2">Показник кількості військовослужбовців</th>
                            <th rowspan="2">Витрати палива (спалено дров), м<sup>3</sup> (consumption)</th>
                            <th rowspan="2" ><span style="display:block;transform:rotate(-90deg)">Коєфіціент</span></th>
                            <th rowspan="2">Показник лічильника витрат води, м<sup>3</sup>(wm)</th>
                            <th rowspan="2">Фактично витрати води, м<sup>3</sup>(wm)</th>
                            <th colspan="2">Показник лічильника витрат електрики</th>
                            <th colspan="2">Температура теплоносія</th>
                            <th rowspan="2">Адреса</th>
                            <th rowspan="2"></th>
                            <th rowspan="2"></th>
                        </tr>
                        <tr>
                            <th><sup>0</sup>С (ta)</th>
                            <th>на кінець зміни, кВт/год(em)</th>
                            <th>всього за зміну, кВт/год</th>
                            <th>подача (twin)</th>
                            <th>зворот (twout)</th>
                        </tr>
                        </thead>
                        <tbody id="table-body">
                        <?php
                        $index = 1;
                        $prevHm = $prevWm = $prevEm = $prevWm = 0;
                        $sumHm = $sumConsumption = $sumEm = $sumWm = 0;
                        if(!empty($records)) {
                            foreach ($records as $key => $v) {?>
                                <tr id="table-row-<?php echo $records[$key]["id"]; ?>">
                                    <td><?php echo $index?></td>
                                    <td contenteditable="false"><?php echo $records[$key]["mdate"];?></td>
                                    <td contenteditable="false"><?php echo $records[$key]["ta"]?></td>
                                    <td contenteditable="false"><?php echo $records[$key]["hm"]; ?></td>
                                    <td contenteditable="false"><?php if($index <> 1) echo round((($records[$key]["hm"] - $prevHm) * 0.2388), 3)?></td>
                                    <td contenteditable="false"><?php echo round(($records[$key]["hm"] * 0.2388),3)?></td>
                                    <td contenteditable="false"><?php echo round($records[$key]["consumption"], 2); ?></td>
                                    <td contenteditable="false"><?php if($index <> 1) echo round((($records[$key]["hm"] - $prevHm) * 0.2388 / $records[$key]["consumption"]),2); ?></td>
                                    <td contenteditable="false"><?php echo $records[$key]["wm"]; ?></td>
                                    <td contenteditable="false"><?php if($index <> 1) echo ($records[$key]["wm"] - $prevWm)?></td>
                                    <td contenteditable="false"><?php echo $records[$key]["em"]; ?></td>
                                    <td contenteditable="false"><?php if($index <> 1) echo ($records[$key]["em"] - $prevEm)?></td>
                                    <td contenteditable="false"><?php echo $records[$key]["twin"]; ?></td>
                                    <td contenteditable="false"><?php echo $records[$key]["twout"]; ?></td>
                                    <td contenteditable="false">
                                        <select name="places" disabled="disabled">
                                            <? foreach ($places as $place): ?>
                                                <option value="<?php echo $place['placeid'] ?>" <?php if($records[$key]["places_placeid"] == $place['placeid']) echo " selected" ?>><?php echo $place['adress'] ?></option>
                                            <? endforeach ?>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" onClick="location='edit-page.php?id='+ <?php echo $records[$key]["id"]; ?>" class="btn btn-info">Редагувати</button> |
                                        <button type="button" onClick="location='delete.php?id='+ <?php echo $records[$key]["id"]; ?>" class="btn btn-danger">Видалити</button>
                                    </td>
                                </tr>
                                <?php
                                if ($index <> 1) {
                                    $sumHm = $sumHm + (($records[$key]["hm"] - $prevHm) * 0.2388);
                                    $sumWm = $sumWm + ($records[$key]["wm"] - $prevWm);
                                    $sumEm = $sumEm + ($records[$key]["em"] - $prevEm);
                                    $prevHm = $records[$key]["hm"];
                                    $prevWm = $records[$key]["wm"];
                                    $prevEm = $records[$key]["em"];
                                }
                                $index++;
                                $sumConsumption = $sumConsumption + $records[$key]["consumption"];
                            }
                        }?>
                        </tbody>
                        <tfoot style="background-color: #f3f0f0;">
                            <tr>
                                <td></td>
                                <td>Всього за період</td>
                                <td></td>
                                <td></td>
                                <td><?php echo round($sumHm,3)?></td>
                                <td></td><td><?php echo round($sumConsumption, 2) ?></td>
                                <td><?php if(round($sumConsumption, 2) <> 1 && round($sumHm,3) <> 0){
                                    echo round(round($sumConsumption, 2) /  round($sumHm,3),2);
                                    } else {
                                    echo 0;
                                    } ?>
                                </td>
                                <td></td><td><?php echo round($sumWm, 2) ?></td><td></td>
                                <td><?php echo round($sumEm, 1) ?></td><td colspan="4"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
             </div>
        </div>
    </section>
    <!--<button type="button" id="chart-button" class="btn btn-primary">
        <span class="glyphicon glyphicon-stats"></span>
        Графіки <span class="button-text"></span>
    </button>-->
    <div class="jumbotron" <?php if ($count_of_rows < 1) echo "style='display:none'"?>>
        <div class="container-flow">
            <h3>Графіки (витрати за період з <?php echo $currentValueDateFrom;?> по <?php echo $currentValueDateTo;?>)</h3>
            <div class="row" id="chart-bar-block">
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Тепло</div>
                        <div class="panel-body">
                            <div id="heatChart" class="chart-bar">
                                <?php
                                $index = 0;
                                $prevHm = 0;
                                if(!empty($records)) {
                                    foreach ($records as $key => $v) {?>
                                        <div class="lineItem">
                                            <div class="lineLegend"><?php echo $records[$key]["mdate"];?></div>
                                            <div class="lineValue" style="width:<?php if($index <> 1) echo (round((($records[$key]["hm"] - $prevHm) * 0.2388), 3) . 'px')?>"></div>
                                            <div class="spanValue"><?php if($index <> 1) echo round((($records[$key]["hm"] - $prevHm) * 0.2388), 3)?></div>
                                        </div>
                                        <?php
                                        if ($index <> 1) {
                                            $prevHm = $records[$key]["hm"];
                                        }
                                        $index++;
                                    }}?>
                            </div>
                            <img src="images/teplo.png"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Дрова</div>
                        <div class="panel-body">
                            <div id="woodChart" class="chart-bar">
                                <?php if(!empty($records)) {
                                    foreach ($records as $key => $v) {?>
                                        <div class="lineItem">
                                            <div class="lineLegend"><?php echo $records[$key]["mdate"];?></div>
                                            <div class="lineValue" style="width:<?php echo (round($records[$key]["consumption"], 2) . 'px'); ?>"></div>
                                            <div class="spanValue"><?php echo round($records[$key]["consumption"], 2); ?></div>
                                        </div>
                                        <?php
                                    }}?>
                            </div>
                            <img src="images/drova.png"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Вода</div>
                        <div class="panel-body">
                            <div id="waterChart" class="chart-bar">
                                <?php
                                $index = 0;
                                $prevWm = 0;
                                if(!empty($records)) {
                                    foreach ($records as $key => $v) {?>
                                        <div class="lineItem">
                                            <div class="lineLegend"><?php echo $records[$key]["mdate"];?></div>
                                            <div class="lineValue" style="width:<?php if($index <> 1) echo (($records[$key]["wm"] - $prevWm) . 'px')?>"></div>
                                            <div class="spanValue"><?php if($index <> 1) echo ($records[$key]["wm"] - $prevWm)?></div>
                                        </div>
                                        <?php
                                        if ($index <> 1) {
                                            $prevWm = $records[$key]["wm"];
                                        }
                                        $index++;
                                    }}?>
                            </div>
                            <img src="images/water.png"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Електрика</div>
                        <div class="panel-body">
                            <div id="electrChart" class="chart-bar">
                                <?php
                                $index = 0;
                                $prevEm = 0;
                                if(!empty($records)) {
                                    foreach ($records as $key => $v) {?>
                                        <div class="lineItem">
                                            <div class="lineLegend"><?php echo $records[$key]["mdate"];?></div>
                                            <div class="lineValue" style="width:<?php if($index <> 1) echo (($records[$key]["em"] - $prevEm) . 'px')?>"></div>
                                            <div class="spanValue"><?php if($index <> 1) echo ($records[$key]["em"] - $prevEm)?></div>
                                        </div>
                                        <?php
                                        if ($index <> 1) {
                                            $prevEm = $records[$key]["em"];
                                        }
                                        $index++;
                                    }}?>
                            </div>
                            <img src="images/electr.png"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<form class="form-inline" role="form" id="toPrint" action="print-page.php" method="post">
        <input type="text" name="location" value="<?php echo $locationObject ?>"/>
        <input type="text" name="location" value="<?php echo $currentValueDateFrom ?>"/>
        <input type="text" name="location" value="<?php echo $currentValueDateFrom ?>"/>
        <button type="submit" class="btn btn-warning" style="margin:15px 20px">Друкувати</button>
    </form>-->
</article>
<footer>
</footer>
<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<script>
    $("#addNewRecord").prop({
        disabled: false
    });
    /*$("#chart-button").click(function(){
        $(this).toggle(
            function(){
                /*$(this).find("span.button-text").text("відобразити");*/
                /*$("div.jumbotron").css("display", "block");*/
            /*},*/
            /*function(){*/
                /*$(this).find("span.button-text").text("заховати");*/
                /*$("div.jumbotron").css("display", "none");*/
           /* }
        )
    })*/
</script>
</body>
</html>


