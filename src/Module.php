<?php
/**
 * Module.php - Module Class
 *
 * Module Class File for Job Contact Plugin
 *
 * @category Config
 * @package Job\Contact
 * @author Verein onePlace
 * @copyright (C) 2020  Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

namespace OnePlace\Job\Contact;

use Application\Controller\CoreEntityController;
use Laminas\Mvc\MvcEvent;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\EventManager\EventInterface as Event;
use Laminas\ModuleManager\ModuleManager;
use OnePlace\Job\Model\JobTable;
use OnePlace\Job\Contact\Controller\ContactController;

class Module {
    /**
     * Module Version
     *
     * @since 1.0.0
     */
    const VERSION = '1.0.1';

    /**
     * Load module config file
     *
     * @since 1.0.0
     * @return array
     */
    public function getConfig() : array {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(Event $e)
    {
        // This method is called once the MVC bootstrapping is complete
        $application = $e->getApplication();
        $container    = $application->getServiceManager();
        $oDbAdapter = $container->get(AdapterInterface::class);
        $tableGateway = $container->get(ContactTable::class);

        # Register Filter Plugin Hook
        CoreEntityController::addHook('job-view-before',(object)['sFunction'=>'attachContact','oItem'=>new ContactController($oDbAdapter,$tableGateway,$container)]);
        //CoreEntityController::addHook('contacthistory-add-before-save',(object)['sFunction'=>'attachContactToJob','oItem'=>new ContactController($oDbAdapter,$tableGateway,$container)]);
    }

    /**
     * Load Models
     */

    /**
     * Load Controllers
     */
    public function getControllerConfig() : array {
        return [
            'factories' => [
                Controller\ContactController::class => function($container) {
                    $oDbAdapter = $container->get(AdapterInterface::class);
                    $tableGateway = $container->get(JobTable::class);

                    # hook start
                    # hook end
                    return new Controller\ContactController(
                        $oDbAdapter,
                        $tableGateway,
                        $container
                    );
                },
                # Installer
                Controller\InstallController::class => function($container) {
                    $oDbAdapter = $container->get(AdapterInterface::class);
                    return new Controller\InstallController(
                        $oDbAdapter,
                        $container->get(Model\ContactTable::class),
                        $container
                    );
                },
            ],
        ];
    } # getControllerConfig()
}
