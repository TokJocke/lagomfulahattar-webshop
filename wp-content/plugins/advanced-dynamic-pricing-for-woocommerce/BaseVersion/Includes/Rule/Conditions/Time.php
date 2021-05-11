<?php

namespace ADP\BaseVersion\Includes\Rule\Conditions;

use ADP\BaseVersion\Includes\Cart\Structures\Cart;
use ADP\BaseVersion\Includes\Rule\ConditionsLoader;
use ADP\BaseVersion\Includes\Rule\Interfaces\Conditions\DateTimeComparisonCondition;

if ( ! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Time extends AbstractCondition implements DateTimeComparisonCondition
{
    const FROM = 'from';
    const TO = 'to';

    const AVAILABLE_COMP_METHODS = array(
        self::FROM,
        self::TO,
    );

    /**
     * @var string
     */
    protected $comparisonTime;

    /**
     * @var string
     */
    protected $comparisonMethod;

    public function check($cart)
    {
        $time = strtotime($cart->getContext()->datetime('H:i'));

        $comparisonTime   = strtotime($this->comparisonTime);
        $comparisonMethod = $this->comparisonMethod;

        return $this->compareTimeUnixFormat($time, $comparisonTime, $comparisonMethod);
    }

    public static function getType()
    {
        return 'time';
    }

    public static function getLabel()
    {
        return __('Time', 'advanced-dynamic-pricing-for-woocommerce');
    }

    public static function getTemplatePath()
    {
        return WC_ADP_PLUGIN_VIEWS_PATH . 'conditions/datetime/time.php';
    }

    public static function getGroup()
    {
        return ConditionsLoader::GROUP_DATE_TIME;
    }

    public function setComparisonDateTime($comparisonDatetime)
    {
        gettype($comparisonDatetime) === 'string' ? $this->comparisonTime = $comparisonDatetime : $this->comparisonTime = null;
    }

    public function setDateTimeComparisonMethod($comparisonMethod)
    {
        in_array($comparisonMethod,
            self::AVAILABLE_COMP_METHODS) ? $this->comparisonMethod = $comparisonMethod : $this->comparisonMethod = null;
    }

    public function getComparisonDateTime()
    {
        return $this->comparisonTime;
    }

    public function getDateTimeComparisonMethod()
    {
        return $this->comparisonMethod;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return ! is_null($this->comparisonMethod) and ! is_null($this->comparisonTime);
    }
}
