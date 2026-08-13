<?php

namespace ShipStream\Ups\Api\Runtime\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ReferenceNormalizer implements NormalizerInterface
{
    /**
     * {@inheritdoc}
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): \ArrayObject|array|string|int|float|bool|null
    {
        $ref = [];
        $ref['$ref'] = (string) $object->getReferenceUri();
        return $ref;
    }
    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null) : bool
    {
        return $data instanceof Reference;
    }
}