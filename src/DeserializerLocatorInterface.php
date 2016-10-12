<?php

namespace CultuurNet\Deserializer;

use ValueObjects\String\String as StringLiteral;

interface DeserializerLocatorInterface
{
    /**
     * @param StringLiteral $contentType
     * @return DeserializerInterface
     */
    public function getDeserializerForContentType(StringLiteral $contentType);
}
