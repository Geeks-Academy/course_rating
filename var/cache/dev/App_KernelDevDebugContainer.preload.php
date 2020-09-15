<?php

// This file has been auto-generated by the Symfony Dependency Injection Component
// You can reference it in the "opcache.preload" php.ini setting on PHP >= 7.4 when preloading is desired

use Symfony\Component\DependencyInjection\Dumper\Preloader;

if (in_array(PHP_SAPI, ['cli', 'phpdbg'], true)) {
    return;
}

require dirname(__DIR__, 3).'/vendor/autoload.php';
require __DIR__.'/Container2duTN9A/App_KernelDevDebugContainer.php';
require __DIR__.'/Container2duTN9A/getSession_Storage_NativeService.php';
require __DIR__.'/Container2duTN9A/getSessionService.php';
require __DIR__.'/Container2duTN9A/getServicesResetterService.php';
require __DIR__.'/Container2duTN9A/getSecrets_VaultService.php';
require __DIR__.'/Container2duTN9A/getRouting_LoaderService.php';
require __DIR__.'/Container2duTN9A/getMessenger_Retry_SendFailedMessageForRetryListenerService.php';
require __DIR__.'/Container2duTN9A/getMessenger_Middleware_SendMessageService.php';
require __DIR__.'/Container2duTN9A/getMessenger_Listener_StopWorkerOnRestartSignalListenerService.php';
require __DIR__.'/Container2duTN9A/getMessenger_DefaultBusService.php';
require __DIR__.'/Container2duTN9A/getMessenger_Bus_Default_Middleware_TraceableService.php';
require __DIR__.'/Container2duTN9A/getMessenger_Bus_Default_Middleware_HandleMessageService.php';
require __DIR__.'/Container2duTN9A/getFilesystemService.php';
require __DIR__.'/Container2duTN9A/getErrorControllerService.php';
require __DIR__.'/Container2duTN9A/getDoctrine_Orm_Messenger_EventSubscriber_DoctrineClearEntityManagerService.php';
require __DIR__.'/Container2duTN9A/getDoctrine_Orm_DefaultListeners_AttachEntityListenersService.php';
require __DIR__.'/Container2duTN9A/getDoctrine_Orm_DefaultEntityManagerService.php';
require __DIR__.'/Container2duTN9A/getDoctrine_Dbal_DefaultConnectionService.php';
require __DIR__.'/Container2duTN9A/getDebug_ArgumentResolver_VariadicService.php';
require __DIR__.'/Container2duTN9A/getDebug_ArgumentResolver_SessionService.php';
require __DIR__.'/Container2duTN9A/getDebug_ArgumentResolver_ServiceService.php';
require __DIR__.'/Container2duTN9A/getDebug_ArgumentResolver_RequestAttributeService.php';
require __DIR__.'/Container2duTN9A/getDebug_ArgumentResolver_RequestService.php';
require __DIR__.'/Container2duTN9A/getDebug_ArgumentResolver_NotTaggedControllerService.php';
require __DIR__.'/Container2duTN9A/getDebug_ArgumentResolver_DefaultService.php';
require __DIR__.'/Container2duTN9A/getContainer_EnvVarProcessorsLocatorService.php';
require __DIR__.'/Container2duTN9A/getContainer_EnvVarProcessorService.php';
require __DIR__.'/Container2duTN9A/getCacheClearerService.php';
require __DIR__.'/Container2duTN9A/getCache_SystemClearerService.php';
require __DIR__.'/Container2duTN9A/getCache_SystemService.php';
require __DIR__.'/Container2duTN9A/getCache_Messenger_RestartWorkersSignalService.php';
require __DIR__.'/Container2duTN9A/getCache_GlobalClearerService.php';
require __DIR__.'/Container2duTN9A/getCache_AppClearerService.php';
require __DIR__.'/Container2duTN9A/getCache_AppService.php';
require __DIR__.'/Container2duTN9A/getCache_AnnotationsService.php';
require __DIR__.'/Container2duTN9A/getAnnotations_CacheService.php';
require __DIR__.'/Container2duTN9A/getTemplateControllerService.php';
require __DIR__.'/Container2duTN9A/getRedirectControllerService.php';
require __DIR__.'/Container2duTN9A/getUserVotesRepositoryService.php';
require __DIR__.'/Container2duTN9A/getUserRatingRepositoryService.php';
require __DIR__.'/Container2duTN9A/getCourseTranslationRepositoryService.php';
require __DIR__.'/Container2duTN9A/getCourseTechnologyRepositoryService.php';
require __DIR__.'/Container2duTN9A/getCourseSourceRepositoryService.php';
require __DIR__.'/Container2duTN9A/getCourseRepositoryService.php';
require __DIR__.'/Container2duTN9A/getCourseRatingStateRepositoryService.php';
require __DIR__.'/Container2duTN9A/getCourseRatingRepositoryService.php';
require __DIR__.'/Container2duTN9A/getCourseRatingNotificationRequestRepositoryService.php';
require __DIR__.'/Container2duTN9A/getCourseRatingCriterionRepositoryService.php';
require __DIR__.'/Container2duTN9A/getCourseRatingCriterionReferenceRepositoryService.php';
require __DIR__.'/Container2duTN9A/getCourseCharacteristicRepositoryService.php';
require __DIR__.'/Container2duTN9A/getDefaultControllerService.php';
require __DIR__.'/Container2duTN9A/getCourseTranslationControllerService.php';
require __DIR__.'/Container2duTN9A/getCourseTechnologiesControllerService.php';
require __DIR__.'/Container2duTN9A/getCourseRatingNotificationRequestsControllerService.php';
require __DIR__.'/Container2duTN9A/getCourseRatingCriteriasControllerService.php';
require __DIR__.'/Container2duTN9A/getCourseRatingControllerService.php';
require __DIR__.'/Container2duTN9A/getCourseControllerService.php';
require __DIR__.'/Container2duTN9A/getCourseCharacteristicsControllerService.php';
require __DIR__.'/Container2duTN9A/get_ServiceLocator_IEz6L2DService.php';
require __DIR__.'/Container2duTN9A/get_ServiceLocator_G9CqTPpService.php';
require __DIR__.'/Container2duTN9A/get_ServiceLocator_Beq5mCoService.php';
require __DIR__.'/Container2duTN9A/get_ServiceLocator_C9JCBPCService.php';

$classes = [];
$classes[] = 'Symfony\Bundle\FrameworkBundle\FrameworkBundle';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\DoctrineBundle';
$classes[] = 'Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle';
$classes[] = 'Symfony\Bundle\MakerBundle\MakerBundle';
$classes[] = 'Symfony\Component\DependencyInjection\ServiceLocator';
$classes[] = 'App\Controller\CourseCharacteristicsController';
$classes[] = 'App\Controller\CourseController';
$classes[] = 'App\Controller\CourseRatingController';
$classes[] = 'App\Controller\CourseRatingCriteriasController';
$classes[] = 'App\Controller\CourseRatingNotificationRequestsController';
$classes[] = 'App\Controller\CourseTechnologiesController';
$classes[] = 'App\Controller\CourseTranslationController';
$classes[] = 'App\Controller\DefaultController';
$classes[] = 'App\Repository\CourseCharacteristicRepository';
$classes[] = 'App\Repository\CourseRatingCriterionReferenceRepository';
$classes[] = 'App\Repository\CourseRatingCriterionRepository';
$classes[] = 'App\Repository\CourseRatingNotificationRequestRepository';
$classes[] = 'App\Repository\CourseRatingRepository';
$classes[] = 'App\Repository\CourseRatingStateRepository';
$classes[] = 'App\Repository\CourseRepository';
$classes[] = 'App\Repository\CourseSourceRepository';
$classes[] = 'App\Repository\CourseTechnologyRepository';
$classes[] = 'App\Repository\CourseTranslationRepository';
$classes[] = 'App\Repository\UserRatingRepository';
$classes[] = 'App\Repository\UserVotesRepository';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\RedirectController';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\TemplateController';
$classes[] = 'Symfony\Component\Cache\DoctrineProvider';
$classes[] = 'Symfony\Component\Cache\Adapter\PhpArrayAdapter';
$classes[] = 'Doctrine\Common\Annotations\CachedReader';
$classes[] = 'Doctrine\Common\Annotations\AnnotationReader';
$classes[] = 'Doctrine\Common\Annotations\AnnotationRegistry';
$classes[] = 'Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory';
$classes[] = 'Symfony\Component\Cache\Adapter\AdapterInterface';
$classes[] = 'Symfony\Component\Cache\Adapter\AbstractAdapter';
$classes[] = 'Symfony\Component\Cache\Adapter\FilesystemAdapter';
$classes[] = 'Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer';
$classes[] = 'Symfony\Component\Cache\Marshaller\DefaultMarshaller';
$classes[] = 'Symfony\Component\Cache\Adapter\ArrayAdapter';
$classes[] = 'Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer';
$classes[] = 'Symfony\Component\Config\Resource\SelfCheckingResourceChecker';
$classes[] = 'Symfony\Component\DependencyInjection\EnvVarProcessor';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\TraceableValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\NotTaggedControllerValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\SessionValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DebugHandlersListener';
$classes[] = 'Symfony\Component\HttpKernel\Debug\FileLinkFormatter';
$classes[] = 'Symfony\Component\Stopwatch\Stopwatch';
$classes[] = 'Symfony\Component\DependencyInjection\Config\ContainerParametersResourceChecker';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DisallowRobotsIndexingListener';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Registry';
$classes[] = 'Doctrine\DBAL\Connection';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\ConnectionFactory';
$classes[] = 'Doctrine\DBAL\Configuration';
$classes[] = 'Doctrine\DBAL\Logging\LoggerChain';
$classes[] = 'Symfony\Bridge\Doctrine\Logger\DbalLogger';
$classes[] = 'Doctrine\DBAL\Logging\DebugStack';
$classes[] = 'Symfony\Bridge\Doctrine\ContainerAwareEventManager';
$classes[] = 'Symfony\Bridge\Doctrine\SchemaListener\MessengerTransportDoctrineSchemaSubscriber';
$classes[] = 'Symfony\Bridge\Doctrine\SchemaListener\PdoCacheAdapterDoctrineSchemaSubscriber';
$classes[] = 'Doctrine\ORM\Proxy\Autoloader';
$classes[] = 'Doctrine\ORM\EntityManager';
$classes[] = 'Doctrine\ORM\Configuration';
$classes[] = 'Doctrine\Persistence\Mapping\Driver\MappingDriverChain';
$classes[] = 'Doctrine\ORM\Mapping\Driver\AnnotationDriver';
$classes[] = 'Doctrine\ORM\Mapping\UnderscoreNamingStrategy';
$classes[] = 'Doctrine\ORM\Mapping\DefaultQuoteStrategy';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\ManagerConfigurator';
$classes[] = 'Doctrine\ORM\Tools\AttachEntityListenersListener';
$classes[] = 'Symfony\Bridge\Doctrine\Messenger\DoctrineClearEntityManagerWorkerSubscriber';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ErrorController';
$classes[] = 'Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer';
$classes[] = 'Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher';
$classes[] = 'Symfony\Component\EventDispatcher\EventDispatcher';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ErrorListener';
$classes[] = 'Symfony\Component\Filesystem\Filesystem';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\EventListener\IsGrantedListener';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\Request\ArgumentNameConverter';
$classes[] = 'Symfony\Component\HttpKernel\HttpKernel';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableControllerResolver';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver';
$classes[] = 'App\Kernel';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\LocaleListener';
$classes[] = 'Symfony\Component\HttpKernel\Log\Logger';
$classes[] = 'Symfony\Component\Messenger\Middleware\AddBusNameStampMiddleware';
$classes[] = 'Symfony\Component\Messenger\Middleware\HandleMessageMiddleware';
$classes[] = 'Symfony\Component\Messenger\Handler\HandlersLocator';
$classes[] = 'Symfony\Component\Messenger\Middleware\TraceableMiddleware';
$classes[] = 'Symfony\Component\Messenger\MessageBus';
$classes[] = 'Symfony\Component\Messenger\EventListener\StopWorkerOnRestartSignalListener';
$classes[] = 'Symfony\Component\Messenger\Middleware\DispatchAfterCurrentBusMiddleware';
$classes[] = 'Symfony\Component\Messenger\Middleware\FailedMessageProcessingMiddleware';
$classes[] = 'Symfony\Component\Messenger\Middleware\RejectRedeliveredMessageMiddleware';
$classes[] = 'Symfony\Component\Messenger\Middleware\SendMessageMiddleware';
$classes[] = 'Symfony\Component\Messenger\Transport\Sender\SendersLocator';
$classes[] = 'Symfony\Component\Messenger\EventListener\SendFailedMessageForRetryListener';
$classes[] = 'Symfony\Component\DependencyInjection\ParameterBag\ContainerBag';
$classes[] = 'Symfony\Component\HttpFoundation\RequestStack';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ResponseListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\Router';
$classes[] = 'Symfony\Component\Config\ResourceCheckerConfigCacheFactory';
$classes[] = 'Symfony\Component\Routing\RequestContext';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\RouterListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader';
$classes[] = 'Symfony\Component\Config\Loader\LoaderResolver';
$classes[] = 'Symfony\Component\Routing\Loader\XmlFileLoader';
$classes[] = 'Symfony\Component\HttpKernel\Config\FileLocator';
$classes[] = 'Symfony\Component\Routing\Loader\YamlFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\PhpFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\GlobFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\DirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\ContainerLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\AnnotatedRouteControllerLoader';
$classes[] = 'Symfony\Component\Routing\Loader\AnnotationDirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\AnnotationFileLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault';
$classes[] = 'Symfony\Component\String\LazyString';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter';
$classes[] = 'Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter';
$classes[] = 'Symfony\Component\DependencyInjection\ContainerInterface';
$classes[] = 'Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Session';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\MetadataBag';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\SessionListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\StreamedResponseListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ValidateRequestListener';

Preloader::preload($classes);

$classes = [];
$classes[] = 'Symfony\\Component\\Routing\\Generator\\CompiledUrlGenerator';
$classes[] = 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableCompiledUrlMatcher';
$classes[] = 'Symfony\\Component\\Routing\\Annotation\\Route';
$classes[] = 'Doctrine\\ORM\\Mapping\\Entity';
$classes[] = 'Doctrine\\ORM\\Mapping\\Id';
$classes[] = 'Doctrine\\ORM\\Mapping\\GeneratedValue';
$classes[] = 'Doctrine\\ORM\\Mapping\\Column';
$classes[] = 'Doctrine\\ORM\\Mapping\\ManyToMany';
$classes[] = 'Doctrine\\ORM\\Mapping\\OneToMany';
$classes[] = 'Doctrine\\ORM\\Mapping\\ManyToOne';
Preloader::preload($classes);
