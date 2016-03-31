<?php

namespace CultuurNet\Deserializer;

use ValueObjects\String\String as StringLiteral;

class JSONDeserializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var JSONDeserializer
     */
    protected $deserializer;

    /**
     * @var JSONDeserializer
     */
    private $assocDeserializer;

    public function setUp()
    {
        $this->deserializer = new JSONDeserializer();

        $this->assocDeserializer = new JSONDeserializer(true);
    }

    /**
     * @test
     */
    public function it_throws_a_not_well_formed_exception_for_invalid_json()
    {
        $this->setExpectedException(
            NotWellFormedException::class,
            'Invalid JSON'
        );

        $this->deserializer->deserialize(
            new StringLiteral(
                '{
                  "eventId": "foo"
                '
            )
        );
    }

    /**
     * @test
     */
    public function it_can_deserialize_to_an_object()
    {
        $jsonString = new StringLiteral(
            '{"key1":"value1","key2":{"key3":"value3"}}'
        );

        $actualObject = $this->deserializer->deserialize($jsonString);

        $expectedObject = $this->createExpectedObject();

        $this->assertEquals($expectedObject, $actualObject);
    }

    /**
     * @test
     */
    public function it_can_deserialize_to_an_associative_array()
    {
        $jsonString = new StringLiteral(
            '{"key1":"value1","key2":{"key3":"value3"}}'
        );

        $actualArray = $this->assocDeserializer->deserialize($jsonString);

        $expectedArray = $this->createExpectedArray();

        $this->assertEquals($expectedArray, $actualArray);
    }

    /**
     * @return \stdClass
     */
    private function createExpectedObject()
    {
        $expectedObject = new \stdClass();
        $expectedObject->key1 = "value1";
        $value2 = new \stdClass();
        $value2->key3 = "value3";
        $expectedObject->key2 = $value2;

        return $expectedObject;
    }

    /**
     * @return array
     */
    private function createExpectedArray()
    {
        $expectedArray = array();
        $expectedArray["key1"] = "value1";
        $value2 = array("key3" => "value3");
        $expectedArray["key2"] = $value2;

        return $expectedArray;
    }
}
