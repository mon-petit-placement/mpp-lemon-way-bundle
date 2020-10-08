<?php

namespace Mpp\LemonWayClientBundle\Model;

use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class Model
{
    /**
     * Configure options.
     *
     * @var OptionsResolver
     */
    abstract public static function configureOptions(OptionsResolver $resolver): OptionsResolver;

    public static function createFromArray(array $options): self
    {
        $options = self::resolveOptions($options);

        $model = new static();
        $reflectionClass = new \ReflectionClass($model);

        foreach ($data as $key => $value) {
            $method = sprintf('set%s', ucfirst($key));
            if ($reflectionClass->hasMethod($method)) {
                $reflectionClass->getMethod($method)->invoke($model, $value);
            }
        }

        return $model;
    }

    /**
     * Resolve options.
     *
     * @method resolveOptions
     *
     * @param array|self $value
     *
     * @return array
     */
    public static function resolveOptions($value): array
    {
        $class = static::class;

        if (!is_array($value) || !$value instanceof $class) {
            throw new \InvalidArgumentException(sprintf('The value must be of type array or an instance of %s', $class));
        }

        if ($value instanceof $class) {
            $value = $value->toArray();
        }

        $resolver = new OptionsResolver();
        self::configureOptions($resolver);

        return $resolver->resolve($value);
    }

    /**
     * Transform model object to array format.
     *
     * @method toArray
     *
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
