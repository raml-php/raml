<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.01.16
 * Time: 13:01
 */
namespace Raml;

use Raml\Hydrator\DefinitionHydrator;
use RuntimeException;
use SplFileInfo;

/**
 * Class Dumper
 * @package Raml
 * @author Michał Brzuchalski <michal.brzuchalski@gmail.com>
 */
class Dumper
{
    public function dump(Definition $definition, string $filepath)
    {
        $file = new SplFileInfo($filepath);
        if ($file->isDir() || !$file->isWritable()) {
            throw new RuntimeException("Given file {$filepath} is directory or is unwritable");
        }
        $definitionHydrator = new DefinitionHydrator();

        return yaml_emit_file($file->getPathname(), $definitionHydrator->extract($definition));
    }
}
