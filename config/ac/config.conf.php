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
namespace AC;

trait config {
    # Método dee autenticação a ser utilizado
    # Opções: NATIVE | LDAP | SWITCH | DEMO
    private static $authMethod = 'NATIVE';
    private static $demoLogin = 'test';
    private static $timeout = 30*60;
    private static $enabled = true;
    private static $native_provider = 'MariaDB';
    private static $login_url = '/ac/login/';
}