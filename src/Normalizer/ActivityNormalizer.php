<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Serializer\Symfony\Normalizer;

use Symfony\Component\Serializer\Exception\LogicException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Xabbuh\XApi\Model\Activity;

/**
 * Normalizes xAPI activities.
 *
 * @author Jérôme Parmentier <jerome.parmentier@acensi.fr>
 */
class ActivityNormalizer implements NormalizerInterface, SerializerAwareInterface
{
    private $serializer;

    /**
     * {@inheritdoc}
     */
    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = array())
    {
        if (!$object instanceof Activity) {
            return null;
        }

        $data = array(
            'id' => $this->normalizeAttribute($object->getId(), $format, $context),
        );

        if (null !== $definition = $object->getDefinition()) {
            $data['definition'] = $this->normalizeAttribute($definition, $format, $context);
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Activity;
    }

    private function normalizeAttribute($value, $format = null, array $context = array())
    {
        if (!$this->serializer instanceof NormalizerInterface) {
            throw new LogicException('Cannot normalize attribute because the injected serializer is not a normalizer');
        }

        return $this->serializer->normalize($value, $format, $context);
    }
}
