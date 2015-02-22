<?php
/**
 * @file
 */

namespace CultuurNet\Deserializer;

use ValueObjects\String\String;

interface DeserializerInterface
{
    public function deserialize(String $data);
}
