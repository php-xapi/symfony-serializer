<?php

namespace spec\Xabbuh\XApi\Serializer\Symfony\Normalizer;

use PhpSpec\ObjectBehavior;
use Xabbuh\XApi\DataFixtures\ActivityFixtures;

class ActivityNormalizerSpec extends ObjectBehavior
{
    function it_is_a_normalizer()
    {
        $this->shouldHaveType('Symfony\Component\Serializer\Normalizer\NormalizerInterface');
    }

    function it_supports_normalizing_activities()
    {
        $this->supportsNormalization(ActivityFixtures::getTypicalActivity())->shouldBe(true);
    }
}
