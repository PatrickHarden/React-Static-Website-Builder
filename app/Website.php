<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firmName',
        'firmAddress',
        'firmCity',
        'firmState',
        'firmZip',
        'firmLat',
        'firmLong',
        'firmLogo',
        'firmAbout',
        'firmAction',
        'areaOneCheck',
        'areaOne',
        'areaOneIcon',
        'areaTwoCheck',
        'areaTwo',
        'areaTwoIcon',
        'areaThreeCheck',
        'areaThree',
        'areaThreeIcon',
        'areaFourCheck',
        'areaFour',
        'areaFourIcon',
        'areaFiveCheck',
        'areaFive',
        'areaFiveIcon',
        'areaSixCheck',
        'areaSix',
        'areaSixIcon',
        'StaffOneCheck',
        'staffOneTitle',
        'staffOneContactEmail',
        'staffOneContactPhone',
        'staffOneBio',
        'StaffTwoCheck',
        'staffTwoTitle',
        'staffTwoContactEmail',
        'staffTwoContactPhone',
        'staffTwoBio',
        'StaffThreeCheck',
        'staffThreeTitle',
        'staffThreeContactEmail',
        'staffThreeContactPhone',
        'staffThreeBio',
        'StaffFourCheck',
        'staffFourTitle',
        'staffFourContactEmail',
        'staffFourContactPhone',
        'staffFourBio',
        'StaffFiveCheck',
        'staffFiveTitle',
        'staffFiveContactEmail',
        'staffFiveContactPhone',
        'staffFiveBio',
        'StaffSixCheck',
        'staffSixTitle',
        'staffSixContactEmail',
        'staffSixContactPhone',
        'staffSixBio',
        'firmWelcome',
        'firmWelcomeImg',
        'firmAwards',
        'firmContact',
        'contactName',
        'contactEmail',
        'contactPhone',
        'contactPref',
        'contactMessage',
        'contactTerms',
        'Facebook',
        'Twitter',
        'LinkedIn',
        'Instagram',
        'Google',
        'Pinterest',
        'Tumblr',
        'YouTube',
        'Vimeo',
        'firmAnalytics',
    ];

    /**
     * Get the user that owns the site
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
