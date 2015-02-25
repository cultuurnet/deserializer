<?php
/**
 * @file
 */
namespace CultuurNet\Deserializer;

use ValueObjects\String\String;

interface DeserializerLocatorInterface
{
    /**
     * @param String $contentType
     * @return DeserializerInterface
     */
    public function getDeserializerForContentType(String $contentType);
}
