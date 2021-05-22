<?php

namespace Cwchong\GaGdpr\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\NumericField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'GaGdprTag' => 'Varchar(16)',
        'GaGdprNotice' => 'HTMLText',
        'GaGdprDuration' => 'Int',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->findOrMakeTab('Root.GaGdpr', 'GA GDPR');
        $fields->addFieldsToTab('Root.GaGdpr', [
            TextField::create('GaGdprTag', 'Google Analytics Tag')
                ->setMaxLength(16)
                ->setAttribute('placeholder', 'UA-12345678-9'),
            HTMLEditorField::create('GaGdprNotice')
                ->setRows(5),
            NumericField::create('GaGdprDuration', 'Cookie Duration (days)')
        ]);
        
        parent::updateCMSFields($fields);
    }
}
