<?php

/* 
 * Copyright (C) 2020 Rubeni Andrade
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);
namespace Cybelizer\Common;

# Retorna número HEX aleatório
function rand_hex(int $length = 8) : string
{
    return (string) \bin2hex(\random_bytes($length));
}

# Converte Objeto para Array
function obj2array(object $obj) : array
{
    $arr = [];
    $arrObj = \is_object($obj) ? \get_object_vars($obj) : $obj;
    foreach ($arrObj as $key => $val)
    {
        $val = (\is_array($val) || \is_object($val)) ? obj2array($val) : $val;
        $arr[$key] = $val;
    }
    return $arr;
}

# Obtem parte de uma string concatenada
function strpart(string $string, string $delimiter, int $part) : string
{
    $temp = \explode($delimiter, $string);
    if(!isset($temp[$part]))
    {
        return (string) null;
    }
    else
    {
        return (string) $temp[$part];
    }
    return false;
}

# Função vazia
function void() : void
{
    return;
}

# Obtem todos os inputs enviados a página
function get_request_input() : array
{
    $ret = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['CONTENT_TYPE']))
    {
        $cType = strpart($_SERVER['CONTENT_TYPE'], ';', 0);
        switch ($cType) {
            case 'application/json':
            case 'text/json':
                $json = \Cybel\Core\JSON::parse_post();
                $ret['json'] = $json['data'];
                break;
            default: break;
        }
        unset($cType, $json);
    }
    foreach ($_POST as $key => $value) {
        $ret['post'][$key] = filter_input(INPUT_POST, $key);
    }
    unset($key, $value);
    foreach ($_GET as $key => $value) {
        $ret['get'][$key] = filter_input(INPUT_GET, $key);
    }
    unset($key, $value);
    return $ret;
}

# Verifica se o navegador utilizado é Internet Explorer < 11
function is_old_ie() : bool
{
    $txt=$_SERVER['HTTP_USER_AGENT'];
    $re1='.*?';
    $re2='(MSIE)';
    if(preg_match_all ("/".$re1.$re2."/is", $txt, $matches) > 0)
    {
        $check = ($matches[1][0] === 'MSIE') ? true : false;
    }
    return $check;
}