<?php
/*
 * index.php
 * 
 * Copyright 2022 RedMud Design
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * https://www.gnu.org/licenses/gpl-3.0.en.html
 * 
 * 
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//extract($_GET);
//extract($_POST);
if (array_key_exists('data', $_POST)) {
   $myfile = fopen("frames.html", "w") or die("Unable to open file!");
   fwrite($myfile, trim($_POST["data"]));
   fclose($myfile);
}
