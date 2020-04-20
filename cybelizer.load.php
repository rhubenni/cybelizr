<?php
#1.0.0#
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
namespace Cybelizer;

# Informações Gerais
define("CYBELIZR_INFO", [
    'VERSION'           => '2.003.31-1.806.13-alpha',
    'VNAME'             => 'Oxygen',
    'NAME'              => 'Cyblzr/2.003.20-Oxygen',
    'LICENSE'           => 'GNU General Public License version 3;http://www.gnu.org/licenses/',
    'RUNNINGMODE'       => php_sapi_name(),
    'BASENS'            => __NAMESPACE__,
    'BASEDIR'           => dirname(__FILE__)
]);

# Caminhos de Recursos
define("_CYPATHS", [
    'APPDATA'       => CYBELIZR_INFO['BASEDIR'] . DIRECTORY_SEPARATOR . 'appdata' . DIRECTORY_SEPARATOR,
    'CLASSES'       => CYBELIZR_INFO['BASEDIR'] . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR,
    'CONFIG'        => CYBELIZR_INFO['BASEDIR'] . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR,
    'CORE'          => CYBELIZR_INFO['BASEDIR'] . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR,
    'LIB'           => CYBELIZR_INFO['BASEDIR'] . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR,
    'THIRDY'        => CYBELIZR_INFO['BASEDIR'] . DIRECTORY_SEPARATOR . 'thirdparty' . DIRECTORY_SEPARATOR,
    'PRIVATECONFIG'        => CYBELIZR_INFO['BASEDIR'] . '-private' . DIRECTORY_SEPARATOR
]);

# Timezone
date_default_timezone_set('America/Sao_Paulo');

# Inclui módulo de autoload para classes
require_once _CYPATHS['CORE'] . 'core.splautoload.lib.php';

#require_once _CYPATHS['APPDATA'] . '/testpage.php';