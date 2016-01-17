<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.01.16
 * Time: 06:46
 */
namespace Raml;

use Raml\Hydrator\DefinitionHydrator;
use RuntimeException;
use SplFileInfo;

/**
 * Class Parser
 * @package Raml
 * @author Michał Brzuchalski <michal.brzuchalski@gmail.com>
 */
class Parser
{
    /**
     * @param string $filepath
     * @return Definition
     */
    public function parse(string $filepath) : Definition
    {
        $file = new SplFileInfo($filepath);
        if (!$file->isFile() || !$file->isReadable()) {
            throw new RuntimeException("Given file {$filepath} isn't file or is unreadable");
        }
        $ndocs = 0;
        $rootPath = $file->getPath();
        $data = yaml_parse_file($file->getPathname(), 0, $ndocs, [
            '!include' => function (string $filepath) use ($rootPath) {
                $file = new SplFileInfo($rootPath . DIRECTORY_SEPARATOR . $filepath);
                if (!$file->isFile() || !$file->isReadable()) {
                    throw new RuntimeException("Given file {$filepath} isn't file or is unreadable");
                }

                return file_get_contents($file->getPathname());
            }
        ]);
        $definitionHydrator = new DefinitionHydrator();
        $definition = new Definition();
        $definitionHydrator->hydrate($data, $definition);

        return $definition;
    }
}
