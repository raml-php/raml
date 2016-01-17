<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.01.16
 * Time: 07:19
 */
namespace Raml;

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
     * @var SecuritySchemes
     */
    private $securitySchemes;
    /**
     * @var Resources
     */
    private $resources;

    public function __construct(
        string $title = '',
        string $version = '',
        string $baseUri = '',
        string $mediaType = '',
        SecuritySchemes $securitySchemes = null,
        Resources $resources = null
    ) {
        $this->title = $title;
        $this->version = $version;
        $this->baseUri = $baseUri;
        $this->mediaType = $mediaType;
        $this->securitySchemes = $securitySchemes ?? new SecuritySchemes();
        $this->resources = $resources ?? new Resources();
    }

    /**
     * @return string
     */
    public function title() : string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function version() : string
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function baseUri() : string
    {
        return $this->baseUri;
    }

    /**
     * @return string
     */
    public function mediaType() : string
    {
        return $this->mediaType;
    }

    /**
     * @return SecuritySchemes
     */
    public function securitySchemes() : SecuritySchemes
    {
        return $this->securitySchemes;
    }

    /**
     * @return Resources
     */
    public function resources() : Resources
    {
        return $this->resources;
    }
}
