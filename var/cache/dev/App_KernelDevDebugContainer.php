<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container6Dw1xQT\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container6Dw1xQT/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container6Dw1xQT.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container6Dw1xQT\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container6Dw1xQT\App_KernelDevDebugContainer([
    'container.build_hash' => '6Dw1xQT',
    'container.build_id' => '913fb2fa',
    'container.build_time' => 1675432015,
], __DIR__.\DIRECTORY_SEPARATOR.'Container6Dw1xQT');
