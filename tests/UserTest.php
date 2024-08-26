<?php

use PHPUnit\Framework\TestCase;
use App\Entity\User;

class UserTest extends TestCase
{
    public function testUserCreation(): void
    {
        $user = new User(
            'Fabio',
            'Mejia',
            'mejiafab',
            'fabmejia@gmail.com',
            'securepassword'
        );

        $this->assertSame('Fabio', $user->getFirstName());
        $this->assertSame('Mejia', $user->getLastName());
        $this->assertSame('mejiafab', $user->getAlias());
        $this->assertSame('fabmejia@gmail.com', $user->getEmail());
        $this->assertTrue(password_verify('securepassword', $user->getPassword()));
        $this->assertSame('active', $user->getStatus());
    }

    public function testUserSetters(): void
    {
        $user = new User(
            'Fabio',
            'Mejia',
            'mejiafab',
            'fabmejia@gmail.com',
            'securepassword'
        );

        $user->setFirstName('Mirna');
        $user->setLastName('Fernandez');
        $user->setAlias('mirna88');
        $user->setEmail('mirnafernandez@hotmail.com');
        $user->setPassword('newsecurepassword');
        $user->setStatus('inactive');

        $this->assertSame('Mirna', $user->getFirstName());
        $this->assertSame('Fernandez', $user->getLastName());
        $this->assertSame('mirna88', $user->getAlias());
        $this->assertSame('mirnafernandez@hotmail.com', $user->getEmail());
        $this->assertTrue(password_verify('newsecurepassword', $user->getPassword()));
        $this->assertSame('inactive', $user->getStatus());
    }
}
