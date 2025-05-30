<?php

declare(strict_types=1);

namespace Intakes\Handler\FemaleAdults;

use Intakes\Model\IntakeModel;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FindAllByPagingHandlerFactory
{
    public function __invoke(ContainerInterface $container): RequestHandlerInterface
    {
        return new FindAllByPagingHandler($container->get(IntakeModel::class));
    }
}
