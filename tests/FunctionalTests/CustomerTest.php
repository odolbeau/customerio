<?php

declare(strict_types=1);

/*
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Shapin\CustomerIO\Tests\FunctionalTests;

use Shapin\CustomerIO\Model\Customer\CustomerCreatedOrUpdated;

final class CustomerTest extends TestCase
{
    private $api;

    public function setUp(): void
    {
        $this->api = $this->getCustomerIOClient()->customers();
    }

    public function testCreateOrUpdate()
    {
        $response = $this->api->createOrUpdate('a_dump_id', [
            'email' => 'georges@abitbol.fr',
        ]);

        $this->assertInstanceOf(CustomerCreatedOrUpdated::class, $response);

        $response = $this->api->createOrUpdate('a_dump_id', [
            'email' => 'georges@abitbol.fr',
            'another_property' => 'coucou',
        ]);

        $this->assertInstanceOf(CustomerCreatedOrUpdated::class, $response);
    }
}
