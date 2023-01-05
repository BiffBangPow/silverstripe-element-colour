<?php

namespace BiffBangPow\Extension;

use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class ElementColourExtension extends DataExtension
{

    private static $db = [
        'CustomClass' => 'Varchar'
    ];

    private static $styles = [
        'light' => 'Light',
        'dark' => 'Dark',
        'white' => 'White'
    ];

    public function updateCMSFields(FieldList $fields)
    {

        $fields->addFieldsToTab('Root.Main', [
            DropdownField::create(
                'CustomClass',
                _t(__CLASS__ . '.customclasslabel', 'Element Style'),
                $this->config()->get('styles')
            )
        ]);
    }

    public function updateStyleVariant(&$style)
    {
        if ($this->owner->CustomClass != '') {
            $style .= ' ' . $this->owner->CustomClass;
        }
    }
}
