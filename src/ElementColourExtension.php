<?php

namespace BiffBangPow\Extension;

use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class ElementColourExtension extends DataExtension
{

    private static $db = [
        'CustomColourClass' => 'Varchar'
    ];

    /**
     * @config
     * @var array $styles
     */
    private static $styles;

    /**
     * @config
     * @var bool $inherit_config
     */
    private static $inherit_config = true;

    public function updateCMSFields(FieldList $fields)
    {
        $fields->removeByName('CustomColourClass');

        if ($this->owner->config()->get('inherit_config') === true) {
            $styleOpts = $this->owner->config()->get('styles');
        } else {
            $styleOpts = $this->owner->config()->get('styles', Config::UNINHERITED);
        }

        if (is_array($styleOpts)) {
            $fields->addFieldsToTab('Root.Main', [
                DropdownField::create(
                    'CustomColourClass',
                    _t(__CLASS__ . '.customclasslabel', 'Element Style'),
                    $styleOpts
                )->setEmptyString(_t(__CLASS__ . '.customclassprompt', 'Choose:'))
            ]);
        }
    }

    public function updateStyleVariant(&$style)
    {
        if ($this->owner->CustomColourClass != '') {
            $style .= $this->owner->CustomColourClass . ' ';
        }
    }
}
