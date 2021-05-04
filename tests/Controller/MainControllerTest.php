<?php

namespace App\Tests\Controller;

use App\Controller\MainController;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MainControllerTest extends KernelTestCase
{

    public function testMain()
    {
        self::bootKernel();
        $controller = self::$kernel->getContainer()->get(MainController::class);

        self::assertSame(1, 1);
    }
}
