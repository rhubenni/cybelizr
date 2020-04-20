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

/**
 * AuthController - Sistema de Controle de Acessos
 *
 * @author Rubeni Andrade
 * @version 3.5.1
 */

declare(strict_types=1);
namespace AC;

class authcontroller {
    use config;
    
    public static function is_enabled() : bool
    {
        return self::$enabled;
    }
    
    public static function check(bool $redirect = true) : bool
    {
        if(!self::is_enabled()) {
            return true;
        }
        if(!isset($_SESSION['_AC']) || $_SESSION['_AC']['logged_user']['timeout'] < time()) {
            if($redirect) {
                self::expired_redir();
            }
            return false;
        } else {
            $_SESSION['_AC']['logged_user']['timeout'] = time() + self::$timeout;
            return true;
        }
    }
    
    public static function expired_redir()
    {
        \http_response_code(302);
        \header("Location: " . self::$login_url);
    }
    
}
