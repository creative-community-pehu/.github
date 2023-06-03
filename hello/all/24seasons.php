<?php
//現在の日時を取得
$datetime = date('m-d');

if ($datetime >= '02-04' and $datetime < '02-18') {
  $season = "spring";
  $seasonName = "立春";
  $seasonID = "risshun";
} elseif ($datetime >= '02-19' and $datetime <= '03-04') {
  $season = "spring";
  $seasonName = "雨水";
  $seasonID = "usui";
} elseif ($datetime >= '03-05' and $datetime <= '03-19') {
  $season = "spring";
  $seasonName = "啓蟄";
  $seasonID = "keichitsu";
} elseif ($datetime >= '03-20' and $datetime <= '04-03') {
  $season = "spring";
  $seasonName = "春分";
  $seasonID = "shunbun";
} elseif ($datetime >= '04-04' and $datetime <= '04-18') {
  $season = "spring";
  $seasonName = "清明";
  $seasonID = "seimei";
} elseif ($datetime >= '04-19' and $datetime <= '05-04') {
  $season = "spring";
  $seasonName = "穀雨";
  $seasonID = "kokuu";
} elseif ($datetime >= '05-05' and $datetime <= '05-19') {
  $season = "summer";
  $seasonName = "立夏";
  $seasonID = "rikka";
} elseif ($datetime >= '05-20' and $datetime <= '06-04') {
  $season = "summer";
  $seasonName = "小満";
  $seasonID = "shouman";
} elseif ($datetime >= '06-05' and $datetime <= '06-20') {
  $season = "summer";
  $seasonName = "芒種";
  $seasonID = "boushu";
} elseif ($datetime >= '06-21' and $datetime <= '07-06') {
  $season = "summer";
  $seasonName = "夏至";
  $seasonID = "geshi";
} elseif ($datetime >= '07-07' and $datetime <= '07-22') {
  $season = "summer";
  $seasonName = "小暑";
  $seasonID = "shousho";
} elseif ($datetime >= '07-23' and $datetime <= '08-07') {
  $season = "summer";
  $seasonName = "大暑";
  $seasonID = "taisho";
} elseif ($datetime >= '08-08' and $datetime <= '08-22') {
  $season = "autumn";
  $seasonName = "立秋";
  $seasonID = "risshu";
} elseif ($datetime >= '08-23' and $datetime <= '09-07') {
  $season = "autumn";
  $seasonName = "処暑";
  $seasonID = "shosho";
} elseif ($datetime >= '09-08' and $datetime <= '09-22') {
  $season = "autumn";
  $seasonName = "白露";
  $seasonID = "hakuro";
} elseif ($datetime >= '09-23' and $datetime <= '10-07') {
  $season = "autumn";
  $seasonName = "秋分";
  $seasonID = "shuubun";
} elseif ($datetime >= '10-08' and $datetime <= '10-23') {
  $season = "autumn";
  $seasonName = "寒露";
  $seasonID = "kanro";
} elseif ($datetime >= '10-24' and $datetime <= '11-07') {
  $season = "autumn";
  $seasonName = "霜降";
  $seasonID = "soukou";
} elseif ($datetime >= '11-08' and $datetime <= '11-21') {
  $season = "winter";
  $seasonName = "立冬";
  $seasonID = "rittou";
} elseif ($datetime >= '11-22' and $datetime <= '12-06') {
  $season = "winter";
  $seasonName = "小雪";
  $seasonID = "shousetsu";
} elseif ($datetime >= '12-07' and $datetime <= '12-21') {
  $season = "winter";
  $seasonName = "大雪";
  $seasonID = "taisetsu";
} elseif ($datetime >= '12-22' and $datetime <= '01-05') {
  $season = "winter";
  $seasonName = "冬至";
  $seasonID = "touji";
} elseif ($datetime >= '01-06' and $datetime <= '01-19') {
  $season = "winter";
  $seasonName = "小寒";
  $seasonID = "shoukan";
} elseif ($datetime >= '01-20' and $datetime <= '02-03') {
  $season = "winter";
  $seasonName = "大寒";
  $seasonID = "daikan";
}
?>
