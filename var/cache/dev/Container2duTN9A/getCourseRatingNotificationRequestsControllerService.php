<?php

namespace Container2duTN9A;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCourseRatingNotificationRequestsControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\CourseRatingNotificationRequestsController' shared autowired service.
     *
     * @return \App\Controller\CourseRatingNotificationRequestsController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/CourseRatingNotificationRequestsController.php';

        $container->services['App\\Controller\\CourseRatingNotificationRequestsController'] = $instance = new \App\Controller\CourseRatingNotificationRequestsController();

        $instance->setContainer(($container->privates['.service_locator.g9CqTPp'] ?? $container->load('get_ServiceLocator_G9CqTPpService'))->withContext('App\\Controller\\CourseRatingNotificationRequestsController', $container));

        return $instance;
    }
}
