<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/course-characteristics' => [[['_route' => 'api_course_characteristics_list', '_controller' => 'App\\Controller\\CourseCharacteristicsController::courseCharacteristicsList'], null, ['GET' => 0], null, false, false, null]],
        '/api/courses' => [
            [['_route' => 'api_courses_list', '_controller' => 'App\\Controller\\CourseController::coursesList'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_courses_add', '_controller' => 'App\\Controller\\CourseController::addCourse'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/courses/{$id}' => [[['_route' => 'api_courses_edit', '_controller' => 'App\\Controller\\CourseController::editCourse'], null, ['PUT' => 0], null, false, false, null]],
        '/api/courses/{$id}/course-technologies' => [[['_route' => 'api_courses_add_course_technolog', '_controller' => 'App\\Controller\\CourseController::addCourseTechnology'], null, ['POST' => 0], null, false, false, null]],
        '/api/courses/{$id}/course-technologies/{$courseTechnologyId}' => [[['_route' => 'api_courses_remove_course_technology', '_controller' => 'App\\Controller\\CourseController::removeCourseTechnology'], null, ['DELETE' => 0], null, false, false, null]],
        '/api/courses/{$id}/course-characteristics' => [[['_route' => 'api_courses_add_course_characteristic', '_controller' => 'App\\Controller\\CourseController::addCourseCharacteristic'], null, ['POST' => 0], null, false, false, null]],
        '/api/courses/{$id}/course-characteristics/{$courseCharacteristicId}' => [[['_route' => 'api_courses_remove_course_characteristic', '_controller' => 'App\\Controller\\CourseController::removeCourseCharacteristic'], null, ['DELETE' => 0], null, false, false, null]],
        '/api/courses/{$id}/course-translations' => [[['_route' => 'api_courses_add_course_translation', '_controller' => 'App\\Controller\\CourseController::addCourseTranslation'], null, ['POST' => 0], null, false, false, null]],
        '/api/courses/{$id}/course-translations/{$courseTranslationId}' => [[['_route' => 'api_courses_remove_course_translation', '_controller' => 'App\\Controller\\CourseController::removeCourseTranslation'], null, ['DELETE' => 0], null, false, false, null]],
        '/api/course-ratings' => [
            [['_route' => 'api_course_ratings_list', '_controller' => 'App\\Controller\\CourseRatingController::courseRatingsList'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_course_ratings_add', '_controller' => 'App\\Controller\\CourseRatingController::addCourseRating'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/course-ratings/{$id}' => [
            [['_route' => 'api_course_ratings_edit', '_controller' => 'App\\Controller\\CourseRatingController::editCourseRating'], null, ['PUT' => 0], null, false, false, null],
            [['_route' => 'api_course_ratings_remove', '_controller' => 'App\\Controller\\CourseRatingController::removeCourseRating'], null, ['DELETE' => 0], null, false, false, null],
        ],
        '/api/course-ratings/{$id}/user-ratings' => [
            [['_route' => 'api_course_ratings_user_ratings_list', '_controller' => 'App\\Controller\\CourseRatingController::userRatingsList'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_course_ratings_add_user_rating', '_controller' => 'App\\Controller\\CourseRatingController::addUserRating'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/course-ratings/{$id}/user-ratings/{$userRatingId}' => [
            [['_route' => 'api_course_ratings_edit_user_rating', '_controller' => 'App\\Controller\\CourseRatingController::editUserRating'], null, ['PUT' => 0], null, false, false, null],
            [['_route' => 'api_course_ratings_remove_user_rating', '_controller' => 'App\\Controller\\CourseRatingController::removeUserRating'], null, ['DELETE' => 0], null, false, false, null],
        ],
        '/api/course-ratings/{$id}/user-votes' => [[['_route' => 'api_course_ratings_user_votes_list', '_controller' => 'App\\Controller\\CourseRatingController::userVotesList'], null, ['GET' => 0], null, false, false, null]],
        '/api/course-ratings/{$id}/user-votes/{$userVoteId}' => [
            [['_route' => 'api_course_ratings_edit_user_vote', '_controller' => 'App\\Controller\\CourseRatingController::editUserVote'], null, ['PUT' => 0], null, false, false, null],
            [['_route' => 'api_course_ratings_remove_user_vote', '_controller' => 'App\\Controller\\CourseRatingController::removeUserVote'], null, ['DELETE' => 0], null, false, false, null],
        ],
        '/api/course-ratings/{$id}/upvote' => [[['_route' => 'api_course_ratings_upvote', '_controller' => 'App\\Controller\\CourseRatingController::upvote'], null, ['POST' => 0], null, false, false, null]],
        '/api/course-ratings/{$id}/downvote' => [[['_route' => 'api_course_ratings_downvote', '_controller' => 'App\\Controller\\CourseRatingController::downvote'], null, ['POST' => 0], null, false, false, null]],
        '/api/course-rating-criterias' => [[['_route' => 'api_course_rating_criteriaslist', '_controller' => 'App\\Controller\\CourseRatingCriteriasController::courseRatingCriteriasList'], null, ['GET' => 0], null, false, false, null]],
        '/api/course-rating-notification-requests' => [[['_route' => 'api_course_rating_notification_requestslist', '_controller' => 'App\\Controller\\CourseRatingNotificationRequestsController::notificationRequestsList'], null, ['GET' => 0], null, false, false, null]],
        '/api/course-rating-notification-requests/{$id}' => [[['_route' => 'api_course_rating_notification_requestsdelete', '_controller' => 'App\\Controller\\CourseRatingNotificationRequestsController::deleteNotification'], null, ['DELETE' => 0], null, false, false, null]],
        '/api/course-technologies' => [[['_route' => 'api_course_technologies_list', '_controller' => 'App\\Controller\\CourseTechnologiesController::courseTechnologiesList'], null, ['GET' => 0], null, false, false, null]],
        '/api/course-translations' => [[['_route' => 'api_course_translationslist', '_controller' => 'App\\Controller\\CourseTranslationController::courseTranslationList'], null, ['GET' => 0], null, false, false, null]],
        '/api' => [[['_route' => 'api_welcome', '_controller' => 'App\\Controller\\DefaultController::welcome'], null, null, null, false, false, null]],
        '/api/health' => [[['_route' => 'api_health', '_controller' => 'App\\Controller\\DefaultController::health'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
