<?php

namespace ADP\BaseVersion\Includes\Rule\Conditions;

use ADP\BaseVersion\Includes\Cart\Structures\Cart;
use ADP\BaseVersion\Includes\Rule\ConditionsLoader;
use ADP\BaseVersion\Includes\Rule\Interfaces\Conditions\DateTimeComparisonCondition;

if ( ! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Date extends AbstractCondition implements DateTimeComparisonCondition
{
    const FROM = 'from';
    const TO = 'to';
    const SPECIFIC_DATE = 'specific_date';

    const AVAILABLE_COMP_METHODS = array(
        self::FROM,
        self::TO,
        self::SPECIFIC_DATE,
    );

    /**
     * @var string
     */
    protected $comparisonDate;

    /**
     * @var string
     */
    protected $comparisonMethod;

    public function check($cart)
    {
        $date = $cart->getContext()->datetime('d-m-Y');
        $date = strtotime($date);

        $comparisonDate   = strtotime($this->comparisonDate);
        $comparisonMethod = $this->comparisonMethod;

        return $this->compareTimeUnixFormat($date, $comparisonDate, $comparisonMethod);
    }

    public static function getType()
    {
        return 'date';
    }

    public static function getLabel()
    {
        return __('Date', 'advanced-dynamic-pricing-for-woocommerce');
    }

    public static function getTemplatePath()
    {
        return WC_ADP_PLUGIN_VIEWS_PATH . 'conditions/datetime/date.php';
    }

    public static function getGroup()
    {
        return ConditionsLoader::GROUP_DATE_TIME;
    }

    public function setComparisonDateTime($comparisonDatetime)
    {
        gettype($comparisonDatetime) === 'string' ? $this->comparisonDate = $comparisonDatetime : $this->comparisonDate = null;
    }

    public function setDateTimeComparisonMethod($comparisonMethod)
    {
        in_array($comparisonMethod,
            self::AVAILABLE_COMP_METHODS) ? $this->comparisonMethod = $comparisonMethod : $this->comparisonMethod = null;
    }

    public function getComparisonDateTime()
    {
        return $this->comparisonDate;
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
        return ! is_null($this->comparisonMethod) and ! is_null($this->comparisonDate);
    }
}
