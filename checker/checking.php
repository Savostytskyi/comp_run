<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 28.12.2014
 * Time: 16:54
 */
require 'vendor/autoload.php';

$myobj1 = new CityClasses\Flat(35,1,6,1,1);

$myobj2 = new CityClasses\Flat(45,2,6,2,3);

$myobj3 = new CityClasses\Flat(50,3,6,3,3);

$myobj4 = new CityClasses\Flat(65,4,6,4,4);

$myobj1->allInfo ();
echo "Количество проживающих человек ".$myobj1->people("+", 2);
echo "<br />";

echo "<br />";
echo "Квартплата за месяц ".$myobj1->kvart()." грн.";
echo "<br />";


echo "Цена за воду в месяц ".$myobj1->wat()." грн.";
echo "<br />";

echo "Цена за отопление в месяц ".$myobj1->heat(1)." грн.";
echo "<br />";

echo "Итого: ".$myobj1->summ(1)." грн.";
echo "<br />";

$flat1=$myobj1->summ(1);
$flat2=$myobj2->summ(1);
$flat3=$myobj3->summ(1);
$flat4=$myobj4->summ(1);

$params = new CityClasses\House(20, 16, 3, 200, array(
    "fl1" => "$flat1",
    "fl2" => "$flat2",
    "fl3" => "$flat3",
    "fl4" => "$flat4") );
echo $params->getInfo ();
echo  "<br>Общая сумма комунальных платежей с дома:". $params->summKomun ()." грн.<br>";
echo "Общее потребление электричества на освещение подъездов:". $params->porchElectric ()." кВт/мес.<br>";
echo "Ежемесячный платеж за землю под дом:". $params->rentMon ()." грн./мес.<br>";


$params1 = CityClasses\new House(4, 9, 4, 190, array(
    "fl1" => "$flat1",
    "fl2" => "$flat2",
    "fl3" => "$flat3",
    "fl4" => "$flat4") );
$params2 = CityClasses\new House(3, 5, 3, 180, array(
    "fl1" => "$flat1",
    "fl2" => "$flat2",
    "fl3" => "$flat3",
    "fl4" => "$flat4") );
$h1=$params->rentMon ();
$h2=$params1->rentMon ();
$h3=$params2->rentMon ();
$p1=$params->summKomun ();

$street = CityClasses\new Street("Sapernaya", 2000, $p1, 120, array($h1, $h2, $h3) );
echo $street->getInfost ();

echo "<br>Необходимое количество дворников: ".$street->numCleaners ();


$city = CityClasses\new Sity("Kiev", 1500, "Ukraine");
echo $city->getInfo ();
echo "<br>Сумма за землю: ".$city->bigMoney ()." грн.";

$man=$params->peopleIn();

echo "<br>Население: ".$city->peopleOf ($man)." чел.";

$jsonObj = new TownProject\sity();
echo 'Информация о городе в JSON'.$jsonObj->inJSON();
