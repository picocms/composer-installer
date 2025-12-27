<?php
/**
 * This file is part of Pico. It's copyrighted by the contributors recorded
 * in the version control history of the file, available from the following
 * original location:
 *
 * <https://github.com/picocms/composer-installer/blob/master/src/Plugin.php>
 *
 * SPDX-License-Identifier: MIT
 * License-Filename: LICENSE
 */

namespace picocms\ComposerInstaller;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

/**
 * Composer plugin for the Pico plugin and theme installer
 *
 * This Composer plugin registers Pico's plugin and theme installer. Pico is a
 * stupidly simple, blazing fast, flat file CMS.
 *
 * See <https://picocms.org/> for more info.
 *
 * @author  Daniel Rudolf
 * @link    https://picocms.org
 * @license https://opensource.org/licenses/MIT The MIT License
 * @version 2.0
 */
class Plugin implements PluginInterface
{
    /**
     * Instance of Pico's plugin and theme installer
     *
     * @var Installer|null
     */
    private $installer;

    /**
     * Adds Pico's plugin and theme installer to Composer
     *
     * @param Composer    $composer
     * @param IOInterface $io
     *
     * @return void
     */
    public function activate(Composer $composer, IOInterface $io): void
    {
        $this->installer = new Installer($io, $composer);
        $composer->getInstallationManager()->addInstaller($this->installer);
    }

    /**
     * Removes Pico's plugin and theme installer from Composer
     *
     * @param Composer    $composer
     * @param IOInterface $io
     *
     * @return void
     */
    public function deactivate(Composer $composer, IOInterface $io): void
    {
        $composer->getInstallationManager()->removeInstaller($this->installer);
    }

    /**
     * Uninstalls the Composer plugin (no-op)
     *
     * @param Composer    $composer
     * @param IOInterface $io
     *
     * @return void
     */
    public function uninstall(Composer $composer, IOInterface $io): void
    {
    }
}
