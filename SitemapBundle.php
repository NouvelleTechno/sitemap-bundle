<?php

namespace NouvelleTechno\SitemapBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
// use Werkspot\Bundle\SitemapBundle\DependencyInjection\Compiler\ProviderCompilerPass;

class SitemapBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        // $container->addCompilerPass(new ProviderCompilerPass());
    }
}