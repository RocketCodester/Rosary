<?php

namespace MyRosary;


use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Symfony\Component\Yaml\Yaml;
use Monolog\Logger;
//require 'C:\xampp\htdocs\Rosary\tests\unit\core\src\rosaries\GloriousRosaryTest.php';
require '../../../../vendor/autoload.php';

/**
 * Class Util
 * @package Support\core\src\lib\util
 */
class Util
{
    /**
     * Converts a YAML filename to a PHP filename.
     * @param string $filename
     * @return string
     */
    public static function convertToYAMLFileName(string $filename): string
    {
        $pattern = '/(\w+)(Test.php)/';
        $replacement = '${1}Provider.yaml';
        $yamlFile = preg_replace($pattern, $replacement, $filename);
        return $yamlFile;
    }

    /**
     * Converts an array of YAML filenames to an array of PHP filenames.
     * @param array $filenames
     * @return string|string[]|null
     */
    public static function convertToYAMLFileNames(array $filenames): array
    {
        $pattern = '/(\w+)(Test.php)/';
        $replacement = '${1}Provider.yaml';
        $yamlFilenames = [];
        foreach ($filenames as $filename)
        {
            $yamlFilenames[] = preg_replace($pattern, $replacement, $filename);
        }
        return $yamlFilenames;
    }

    /**
     * Writes data to a yaml file given a file object.
     * @throws \ReflectionException
     */
    public static function writeToYAMLFile($class_name)
    {
//        $class_name = get_class($currentObject);
        $reflection = new \ReflectionClass( $class_name );
        $classFile = $reflection->getFileName();
        $class_methods = get_class_methods($class_name);
        $yaml = '';
        $count = 0;
        foreach ($class_methods as $method_name)
        {
            if (preg_match('/Provider/', $method_name) && $method_name !== 'usesDataProvider')
            {
                $yaml .= "#$method_name\n";
                $yaml .= Yaml::dump(["key".$count++ => call_user_func($class_name . "::" . $method_name)]);
            }
        }
        file_put_contents(Util::convertToYAMLFileName($classFile), $yaml);
    }

    public function rGetTestPathnames(string $pathname): ?array
    {
        $di = new \RecursiveDirectoryIterator($pathname);
        $testPathnames = [];
        foreach (new \RecursiveIteratorIterator($di) as $filename => $file) {
            if (preg_match('/(\w+)(Test.php)/', $file))
            {
                $testPathnames[] = $file->getPathname();
            }
        }
        return $testPathnames;
    }

    /**
     * @param array $testPathnames
     * @return array|null
     */
    public function rGetTestFilenames(array $testPathnames = []): ?array
    {
        $testFiles = [];
        foreach( $testPathnames as $testPathname )
        {
            $testFiles[] = basename( $testPathname );
        }
        return $testFiles;
    }

    public function rGetTestBasenames(array $testPathnames = [])
    {
        $testFiles = [];
        foreach( $testPathnames as $testPathname )
        {
            $testFiles[] = basename( $testPathname, ".php" );
        }
        return $testFiles;
    }

    function get_class_name($classname)
    {
        if ($pos = strrpos($classname, '\\')) return substr($classname, $pos + 1);
        return $pos;
    }

}

//include 'GloriousRosaryTest.php';
//$grt = call_user_func(['GloriousRosaryTest','__toString']);

//$grt = GloriousRosaryTest::class;
//include Weekday::class;

$logger = new Logger('a');
$tI = new Weekday($logger);
get_class($tI);
//include GloriousRosaryTest::class;
$util = new Util();
$a = $util->get_class_name('MyRosary\GloriousRosary');
print_r($pathnames=$util->rGetTestPathnames('C:\xampp\htdocs\Rosary\tests\unit\core\src\rosaries'));
print_r($filenames = $util->rGetTestFilenames($pathnames));
print_r($basenames = $util->rGetTestBasenames($pathnames));
//$basenames[0]::class;
//$x = eval('$util->rGetTestBasenames($pathnames)::class');
//eval("\$grt = $grt;");

//$classname = 'MyRosary\Util';
//$instance = new $classname();
//$instance = new Util();
//print_r($util->rGetTestPathnames('C:\xampp\htdocs\Rosary\tests\unit\core\src\rosaries'));

//echo $util->convertToYAMLFileName('CatalogApiTest.php');
//print_r($util->convertToYAMLFileNames(['CatalogApiTest.php', 'NavigationApiTest.php']));


//$logger = new Logger('a');
//$gr = new GloriousRosary($logger);
//$grt = new GloriousRosaryTest();

//$util = new Util();
//$logger = new Logger('a');
//$util->writeToYAMLFile($logger);