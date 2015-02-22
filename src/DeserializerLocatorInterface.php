<?php
/**
 * @file
 */
namespace CultuurNet\Deserializer;

use ValueObjects\String\String;

interface DeserializerLocatorInterface
{
    public function getDeserializerForContentType(String $contentType);
}
