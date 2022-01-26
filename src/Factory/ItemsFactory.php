<?php

namespace App\Factory;

use App\Entity\Items;
use App\Repository\ItemsRepository;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Items>
 *
 * @method static Items|Proxy createOne(array $attributes = [])
 * @method static Items[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Items|Proxy find(object|array|mixed $criteria)
 * @method static Items|Proxy findOrCreate(array $attributes)
 * @method static Items|Proxy first(string $sortedField = 'id')
 * @method static Items|Proxy last(string $sortedField = 'id')
 * @method static Items|Proxy random(array $attributes = [])
 * @method static Items|Proxy randomOrCreate(array $attributes = [])
 * @method static Items[]|Proxy[] all()
 * @method static Items[]|Proxy[] findBy(array $attributes)
 * @method static Items[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Items[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ItemsRepository|RepositoryProxy repository()
 * @method Items|Proxy create(array|callable $attributes = [])
 */
final class ItemsFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        $tags = ['vehicule', 'maison', 'electronique', 'mode', 'loisirs', 'art', 'multimedia'];
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'title' => self::faker()->realTextBetween(5, 70),
            'description' => self::faker()->text(),
            'price' => self::faker()->numberBetween(10, 10000),
            'publishedAt' => new \DateTime(sprintf('-%d days', rand(1, 100))), // TODO add DATETIME ORM type manually
            'tag' => $tags[array_rand($tags, 1)],
            'users' => UsersFactory::random(),
        ];
    }

    protected function initialize(): self
    {

        return $this->afterInstantiate(function(Items $items): void {
            $slugger = new AsciiSlugger();
            $items->setSlug($slugger->slug($items->getTitle()));
        });
    }

    protected static function getClass(): string
    {
        return Items::class;
    }
}
