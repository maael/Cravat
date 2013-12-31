<?php namespace Cravat;
require_once('cravat'.DIRECTORY_SEPARATOR.'cravat.php');
Cravat::initialize();
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(Cravat::$entityManager);