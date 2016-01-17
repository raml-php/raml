<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.01.16
 * Time: 08:45
 */
namespace Raml;

/**
 * Class SecurityScheme
 * @package Raml
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class SecurityScheme
{
    /**
     * @var string
     */
    private $description = '';
    /**
     * @var string
     */
    private $type = '';
    private $describedBy;
    private $setttings;
}