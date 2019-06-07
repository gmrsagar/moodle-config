<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'pgsql';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'moodle-db';
$CFG->dbname    = 'moodle';
$CFG->dbuser    = 'moodle_user';
$CFG->dbpass    = 'password';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
);

$CFG->phpunit_dbtype    = 'pgsql';
$CFG->phpunit_dblibrary = 'native';
$CFG->phpunit_dbhost    = 'moodle-test-db';
$CFG->phpunit_dbname    = 'moodle';
$CFG->phpunit_dbuser    = 'moodle_user';
$CFG->phpunit_dbpass    = 'password';
$CFG->phpunit_prefix = 'phpu_';
$CFG->phpunit_dataroot = '/var/lib/testsitedata';

// Use a port other than 80.
// Set the port here and on docker-compose.
$_SERVER['SERVER_PORT'] = 8080;
$port = isset($_SERVER['SERVER_PORT']) ? $_SERVER['SERVER_PORT'] : 80;
$port = ($port == 80) ? '' : ":{$port}";
$CFG->wwwroot = "http://localhost{$port}";
$CFG->dataroot  = '/var/lib/sitedata';

$CFG->admin     = 'admin';

// Force a debugging mode regardless the settings in the site administration.
@error_reporting(E_ALL | E_STRICT); // NOT FOR PRODUCTION SERVERS!
$CFG->debug = (E_ALL | E_STRICT);   // === DEBUG_DEVELOPER - NOT FOR PRODUCTION SERVERS!

$CFG->noemailever = true;

$CFG->directorypermissions = 0777;

require_once(dirname(__FILE__) . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
