<?php

namespace App\Factory;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Users>
 *
 * @method static Users|Proxy createOne(array $attributes = [])
 * @method static Users[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Users|Proxy find(object|array|mixed $criteria)
 * @method static Users|Proxy findOrCreate(array $attributes)
 * @method static Users|Proxy first(string $sortedField = 'id')
 * @method static Users|Proxy last(string $sortedField = 'id')
 * @method static Users|Proxy random(array $attributes = [])
 * @method static Users|Proxy randomOrCreate(array $attributes = [])
 * @method static Users[]|Proxy[] all()
 * @method static Users[]|Proxy[] findBy(array $attributes)
 * @method static Users[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Users[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static UsersRepository|RepositoryProxy repository()
 * @method Users|Proxy create(array|callable $attributes = [])
 */
final class UsersFactory extends ModelFactory
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        parent::__construct();
        $this->hasher = $hasher;
    }

    protected function getDefaults(): array
    {
        return [
            'firstName' => self::faker()->firstName(),
            'lastName' => self::faker()->lastName(),
        ];
    }

    protected function initialize(): self
    {
        return $this->afterInstantiate(function(Users $users): void {
                 $email = strtolower($users->getFirstname()) . '.' . strtolower($users->getLastname()) . "@gmail.com";
                 $users->setEmail($email);
                 $users->setPassword($this->hasher->hashPassword($users, 'password'));
             })
        ;
    }

    protected static function getClass(): string
    {
        return Users::class;
    }
}
