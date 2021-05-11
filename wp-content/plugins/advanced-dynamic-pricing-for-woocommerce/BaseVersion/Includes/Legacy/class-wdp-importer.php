<?php
if ( ! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class WDP_Importer
{
    public static function import_rules($data, $resetRules)
    {
        return \ADP\Factory::callStaticMethod(
            'Admin_Importer', 'importRules', $data, $resetRules
        );
    }
}
