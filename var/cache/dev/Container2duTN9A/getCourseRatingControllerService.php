<?php

namespace Container2duTN9A;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCourseRatingControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\CourseRatingController' shared autowired service.
     *
     * @return \App\Controller\CourseRatingController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/CourseRatingController.php';

        $container->services['App\\Controller\\CourseRatingController'] = $instance = new \App\Controller\CourseRatingController();

        $instance->setContainer(($container->privates['.service_locator.g9CqTPp'] ?? $container->load('get_ServiceLocator_G9CqTPpService'))->withContext('App\\Controller\\CourseRatingController', $container));

        return $instance;
    }
}
