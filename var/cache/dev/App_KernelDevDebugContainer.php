<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container1uhU9u2\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container1uhU9u2/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container1uhU9u2.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container1uhU9u2\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container1uhU9u2\App_KernelDevDebugContainer([
    'container.build_hash' => '1uhU9u2',
    'container.build_id' => '61a040dc',
    'container.build_time' => 1675429479,
], __DIR__.\DIRECTORY_SEPARATOR.'Container1uhU9u2');
