<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.01.16
 * Time: 07:19
 */
namespace Raml;

use Raml\Collection\SecuritySchemesCollection;

/**
 * Class Definition
 * @package Raml
 * @author Michał Brzuchalski <michal.brzuchalski@gmail.com>
 */
class Definition
{
    /**
     * @var string
     */
    private $title = '';
    /**
     * @var string
     */
    private $version = '';
    /**
     * @var string
     */
    private $baseUri = '';
    /**
     * @var string
     */
    private $mediaType = '';
    /**
     * @var SecuritySchemesCollection
     */
    private $securitySchemes;

    public function __construct(
        string $title = '',
        string $version = '',
        string $baseUri = '',
        string $mediaType = '',
        SecuritySchemesCollection $securitySchemes = null
    ) {

        $this->title = $title;
        $this->version = $version;
        $this->baseUri = $baseUri;
        $this->mediaType = $mediaType;
        $this->securitySchemes = $securitySchemes ?? new SecuritySchemesCollection();
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function version()
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function baseUri()
    {
        return $this->baseUri;
    }

    /**
     * @return string
     */
    public function mediaType()
    {
        return $this->mediaType;
    }

    /**
     * @return SecuritySchemesCollection
     */
    public function securitySchemes()
    {
        return $this->securitySchemes;
    }
}
