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
namespace Cybelizer\Core\SPLAutoload;

define("_SPL_AUTOLOAD_PATHS", [
    _CYPATHS['CLASSES'],
    _CYPATHS['CONFIG'],
    _CYPATHS['THIRDY'],
    _CYPATHS['PRIVATECONFIG']
]);

function clearPath(string $path) : string
{
    $find = [
        '\\',
        'cybelizr/',
        'cybelizr' . DIRECTORY_SEPARATOR
    ];
    $replace = [
        DIRECTORY_SEPARATOR,
        ''
    ];
    $ret = str_replace($find, $replace, strtolower($path));
    return $ret;
}

spl_autoload_register(
    function (string $class)
    {
        $file = clearPath($class) . '.class.php';
        foreach (_SPL_AUTOLOAD_PATHS as $key => $path)
        {
            if(file_exists($path . $file))
            {
                require_once $path . $file;
                break;
            }
        }
    }
);

spl_autoload_register(
    function (string $class)
    {
        $file = clearPath($class) . '.conf.php';
        foreach (_SPL_AUTOLOAD_PATHS as $key => $path)
        {
            if(file_exists($path . $file))
            {
                require_once $path . $file;
                break;
            }
        }
    }
);

spl_autoload_register(
    function (string $class)
    {
        $file = clearPath($class) . '.trait.php';
        foreach (_SPL_AUTOLOAD_PATHS as $key => $path)
        {
            if(file_exists($path . $file))
            {
                require_once $path . $file;
                break;
            }
        }
    }
);

spl_autoload_register(
    function (string $class)
    {
        $file = clearPath($class) . '.iface.php';
        foreach (_SPL_AUTOLOAD_PATHS as $key => $path)
        {
            if(file_exists($path . $file))
            {
                require_once $path . $file;
                break;
            }
        }
    }
);
