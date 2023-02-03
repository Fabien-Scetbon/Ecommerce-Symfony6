<?php

namespace Container1uhU9u2;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Console_Command_AssetsInstall_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.console.command.assets_install.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.console.command.assets_install.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('assets:install', [], 'Install bundle\'s web assets under a public directory', false, #[\Closure(name: 'console.command.assets_install', class: 'Symfony\\Bundle\\FrameworkBundle\\Command\\AssetsInstallCommand')] function () use ($container): \Symfony\Bundle\FrameworkBundle\Command\AssetsInstallCommand {
            return ($container->privates['console.command.assets_install'] ?? $container->load('getConsole_Command_AssetsInstallService'));
        });
    }
}
