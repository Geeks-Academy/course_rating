<?php

namespace Container7VduxWl;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCourseTechnologiesControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\CourseTechnologiesController' shared autowired service.
     *
     * @return \App\Controller\CourseTechnologiesController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/CourseTechnologiesController.php';

        $container->services['App\\Controller\\CourseTechnologiesController'] = $instance = new \App\Controller\CourseTechnologiesController();

        $instance->setContainer(($container->privates['.service_locator.g9CqTPp'] ?? $container->load('get_ServiceLocator_G9CqTPpService'))->withContext('App\\Controller\\CourseTechnologiesController', $container));

        return $instance;
    }
}
