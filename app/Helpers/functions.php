<?php
function castToInteger($mixedVar, $castDefault = 0)
{

    try{
        return filter_var($mixedVar, FILTER_VALIDATE_INT) === false ? $castDefault : (int) $mixedVar;
    } catch(\Throwable $throwable){
        return $castDefault;
    }
}

function slug($string)
{

    $find    = [ 'Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#' ];
    $replace = [ 'c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp' ];
    $string  = strtolower(str_replace($find, $replace, $string));
    $string  = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
    $string  = trim(preg_replace('/\s+/', ' ', $string));
    $string  = str_replace(' ', '-', $string);
    return $string;
}

function castToArray($mixedVar)
{

    try{
        if( is_array($mixedVar) ){
            return $mixedVar;
        }
        return strlen($mixedVar) > 0 ? [ $mixedVar ] : [];
    } catch(Throwable $throwable){
        return [];
    }
}

function addUrlForImage($result, $mainPath, $stringPath, $columnName)
{

    foreach($result as $key => $perResult){
        $result[ $key ][ $columnName ] = $mainPath . "$stringPath" . '/' . $perResult[ $columnName ];
    }

    return $result;
}


function getArrayColumnValue($array, $columnName)
{

    $resultArray = [];

    foreach($array as $a){

        $resultArray[] = array( "tag_id" => $a[ $columnName ] );

    }

    return $resultArray;
}

function castToString($mixedVar)
{
    try{
        if( is_bool($mixedVar) ){
            $mixedVar = $mixedVar === true ? "true" : "false";
        }
        return (string) $mixedVar;
    } catch(Throwable $throwable){
        return "";
    }
}


function slugUrlToId($id)
{
    if( count(explode("-", $id)) > 0 ){
        $id = explode("-", $id)[ count(explode("-", $id)) - 1 ];
    }

    return $id;
}

function TrToDateConvert($date){
    $ingilizce = array(
        'January',
        'February',
        'March',
        'April',
        'May',
        'Jun',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday'
    );

    $turkce = array(
        'Ocak',
        'Şubat',
        'Mart',
        'Nisan',
        'Mayıs',
        'Haziran',
        'Temmuz',
        'Ağustos',
        'Eylül',
        'Ekim',
        'Kasım',
        'Aralık',
        'Pazartesi',
        'Salı',
        'Çarşamba',
        'Perşembe',
        'Cuma',
        'Cumartesi',
        'Pazar'

    );

   return  str_replace($ingilizce,$turkce,$date);

}

