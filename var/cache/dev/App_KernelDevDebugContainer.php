<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container2duTN9A\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container2duTN9A/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container2duTN9A.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container2duTN9A\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container2duTN9A\App_KernelDevDebugContainer([
    'container.build_hash' => '2duTN9A',
    'container.build_id' => '4e3d32c1',
    'container.build_time' => 1600176472,
], __DIR__.\DIRECTORY_SEPARATOR.'Container2duTN9A');
