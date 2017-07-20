<?php
/**
 * Plugins Management
 * Last Changed: $LastChangedDate: 2017-04-27 04:45:04 -0400 (Thu, 27 Apr 2017) $
 * @author detain
 * @copyright 2017
 * @package MyAdmin
 * @category Plugins
 */

namespace MyAdmin\PluginInstaller;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

/**
 * Class TemplateInstaller
 *
 * @package MyAdmin\PluginInstaller
 */
class TemplateInstaller extends LibraryInstaller {
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package) {
        $prefix = mb_substr($package->getPrettyName(), 0, 23);
        if ('myadmin/template-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, myadmin templates '
                .'should always start their package name with '
                .'"myadmin/template-"'
            );
        }
        return 'data/templates/'.mb_substr($package->getPrettyName(), 23);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType) {
        return 'myadmin-template' === $packageType;
    }
}
