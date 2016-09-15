<?php

namespace CultuurNet\Deserializer;

use ValueObjects\String\String as StringLiteral;

interface DeserializerInterface
{
    public function deserialize(StringLiteral $data);
}
