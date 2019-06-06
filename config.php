<?php
// This file is part of Moodle.
// Moodle configuration file.
// Moodle is free so
// For Postgres and docker mostly.

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
