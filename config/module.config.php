<?php
/**
 * module.config.php - Contact Config
 *
 * Main Config File for Job Contact Plugin
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

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    # View Settings
    'view_manager' => [
        'template_path_stack' => [
            'job-contact' => __DIR__ . '/../view',
        ],
    ],
];
