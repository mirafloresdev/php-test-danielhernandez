<?php

use PHPUnit\Framework\TestCase;
use App\UseCase\SaveUserUseCase;
use App\Repository\UserRepositoryInterface;
use App\DTO\UserRequestDTO;
use App\Entity\User;

class SaveUserUseCaseTest extends TestCase
{
    public function testExecute(): void
    {
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);

        $userRepositoryMock->expects($this->once())
            ->method('save')
            ->willReturnCallback(function (User $user) {
                $this->assertSame('Fabio', $user->getFirstName());
                $this->assertSame('Mejia', $user->getLastName());
                $this->assertSame('mejiafab', $user->getAlias());
                $this->assertSame('fabmejia@gmail.com', $user->getEmail());
                $this->assertTrue(password_verify('securepassword', $user->getPassword()));
                $this->assertSame('active', $user->getStatus());
            });

        $request = new UserRequestDTO(
            'Fabio',
            'Mejia',
            'mejiafab',
            'fabmejia@gmail.com',
            'securepassword'
        );

        $useCase = new SaveUserUseCase($userRepositoryMock);
        $useCase->execute($request);
    }
}
