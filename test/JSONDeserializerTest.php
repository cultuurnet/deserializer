<?php
/**
 * @file
 */

namespace CultuurNet\Deserializer;

use ValueObjects\String\String;

class JSONDeserializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var JSONDeserializer
     */
    protected $deserializer;

    public function setUp()
    {
        $this->deserializer = new JSONDeserializer();
    }

    public function testDoesNotAcceptInvalidJSON()
    {
        $this->setExpectedException(
            NotWellFormedException::class,
            'Invalid JSON'
        );

        $this->deserializer->deserialize(
            new String(
                '{
                  "eventId": "foo"
                '
            )
        );
    }
}
