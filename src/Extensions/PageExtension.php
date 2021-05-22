<?php

namespace Cwchong\GaGdpr\Extensions;

use SilverStripe\ORM\DataExtension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;

class PageExtension extends DataExtension
{
    private static $db = [
    ];

    public function getGaGdpr()
    {
        $siteconfig = SiteConfig::current_site_config();
        if ($siteconfig->GaGdprTag) {
            Requirements::javascript(
                "https://www.googletagmanager.com/gtag/js?id=" . $siteconfig->GaGdprTag, 
                ["async" => true]
            );
        }
        Requirements::javascriptTemplate('cwchong/gagdpr: client/dist/js/gagdpr.js', [
            'GAGDPRTAG' => $siteconfig->GaGdprTag,
            'GAGDPRDURATION' => $siteconfig->GaGdprDuration,
        ]);
        Requirements::css('cwchong/gagdpr: client/dist/css/gagdpr.css');

        $data = new ArrayData([
            'Notice' => $siteconfig->GaGdprNotice
        ]);
        return $data->renderWith([__NAMESPACE__ . '\\Modal']);
    }

}
