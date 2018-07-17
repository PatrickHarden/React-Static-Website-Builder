<?php

namespace App\Http\Controllers;

use App\Facades\Bitbucket;
use App\Facades\Netlify;
use App\User;
use App\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * @param Request $request
     */
    public function create(Request $request)
    {
        $website = new Website();
        $website->user_id = $request->user()->id;
        $this->updateInfo($website, $request);
        $website->save();

        $websiteName = 'awb-website-' . $website->id;

        //Get a deploy key from bitbucket
        $response = Netlify::post('deploy_keys');
        $deployKey = json_decode($response->getBody()->getContents());

        //Add the SSH key to bitbucket
        [$bitbucketOrg, $bitbucketRepo] = explode('/', $website->bitbucketRepo);
        Bitbucket::api('Repositories\DeployKeys')->create($bitbucketOrg, $bitbucketRepo, $deployKey->public_key, $websiteName);

        //Add the website to netlify
        $response = Netlify::post('sites', [
            'form_params' => [
                'name'      => $websiteName,
                'force_ssl' => true,
                'repo'      => [
                    'provider'      => 'bitbucket',
                    'id'            => $website->bitbucketRepo,
                    'repo'          => $website->bitbucketRepo,
                    'private'       => false,
                    'branch'        => 'master',
                    // Pass user_id to a user.json file generated on build
                    'cmd'           => 'yarn build',
                    'dir'           => 'dist',
                    'deploy_key_id' => $deployKey->id
                ],
            ]
        ]);

        $netlifySite = json_decode($response->getBody()->getContents());
        $website->netlifySiteId = $netlifySite->id;

        //Add a snippet that adds the site id to the head
        Netlify::post('sites/' . $website->netlifySiteId . '/snippets', [
            'form_params' => [
                'title' => 'website_id',
                'general' => "<script>window.websiteId=" . $website->id . ";</script>",
                'general_position' => 'head'
            ]
        ]);

        $website->save();
    }

    /**
     * Update the user's profile details.
     *
     * @return Response
     */
    public function update(Request $request, $websiteId)
    {
        $website = Website::find($websiteId);
        $this->updateInfo($website, $request);
        $website->save();
    }

    /**
     * @param $website
     * @param $request
     */
    public function updateInfo($website, $request)
    {
        $website->forceFill([
            'bitbucketRepo'          => 'expect3dev/template-01', // TODO: Make this dynamic
            'firmName'               => $request->firmName,
            'firmAddress'            => $request->firmAddress,
            'firmCity'               => $request->firmCity,
            'firmState'              => $request->firmState,
            'firmZip'                => $request->firmZip,
            'firmLat'                => $request->firmLat,
            'firmLong'               => $request->firmLong,
            'firmLogo'               => $request->firmLogo,
            'firmAbout'              => $request->firmAbout,
            'firmAction'             => $request->firmAction,
            'areaOneCheck'           => $request->areaOneCheck,
            'areaOne'                => $request->areaOne,
            'areaOneIcon'            => $request->areaOneIcon,
            'areaTwoCheck'           => $request->areaTwoCheck,
            'areaTwo'                => $request->areaTwo,
            'areaTwoIcon'            => $request->areaTwoIcon,
            'areaThreeCheck'         => $request->areaThreeCheck,
            'areaThree'              => $request->areaThree,
            'areaThreeIcon'          => $request->areaThreeIcon,
            'areaFourCheck'          => $request->areaFourCheck,
            'areaFour'               => $request->areaFour,
            'areaFourIcon'           => $request->areaFourIcon,
            'areaFiveCheck'          => $request->areaFiveCheck,
            'areaFive'               => $request->areaFive,
            'areaFiveIcon'           => $request->areaFiveIcon,
            'areaSixCheck'           => $request->areaSixCheck,
            'areaSix'                => $request->areaSix,
            'areaSixIcon'            => $request->areaSixIcon,
            'StaffOneCheck'          => $request->StaffOneCheck,
            'staffOne'               => $request->staffOne,
            'staffOneTitle'          => $request->staffOneTitle,
            'staffOneContactEmail'   => $request->staffOneContactEmail,
            'staffOneContactPhone'   => $request->staffOneContactPhone,
            'staffOneBio'            => $request->staffOneBio,
            'StaffTwoCheck'          => $request->StaffTwoCheck,
            'staffTwo'               => $request->staffTwo,
            'staffTwoTitle'          => $request->staffTwoTitle,
            'staffTwoContactEmail'   => $request->staffTwoContactEmail,
            'staffTwoContactPhone'   => $request->staffTwoContactPhone,
            'staffTwoBio'            => $request->staffTwoBio,
            'StaffThreeCheck'        => $request->StaffThreeCheck,
            'staffThree'             => $request->staffThree,
            'staffThreeTitle'        => $request->staffThreeTitle,
            'staffThreeContactEmail' => $request->staffThreeContactEmail,
            'staffThreeContactPhone' => $request->staffThreeContactPhone,
            'staffThreeBio'          => $request->staffThreeBio,
            'StaffFourCheck'         => $request->StaffFourCheck,
            'staffFour'              => $request->staffFour,
            'staffFourTitle'         => $request->staffFourTitle,
            'staffFourContactEmail'  => $request->staffFourContactEmail,
            'staffFourContactPhone'  => $request->staffFourContactPhone,
            'staffFourBio'           => $request->staffFourBio,
            'StaffFiveCheck'         => $request->StaffFiveCheck,
            'staffFive'              => $request->staffFive,
            'staffFiveTitle'         => $request->staffFiveTitle,
            'staffFiveContactEmail'  => $request->staffFiveContactEmail,
            'staffFiveContactPhone'  => $request->staffFiveContactPhone,
            'staffFiveBio'           => $request->staffFiveBio,
            'StaffSixCheck'          => $request->StaffSixCheck,
            'staffSix'               => $request->staffSix,
            'staffSixTitle'          => $request->staffSixTitle,
            'staffSixContactEmail'   => $request->staffSixContactEmail,
            'staffSixContactPhone'   => $request->staffSixContactPhone,
            'staffSixBio'            => $request->staffSixBio,
            'firmWelcome'            => $request->firmWelcome,
            'firmWelcomeImg'         => $request->firmWelcomeImg,
            'firmAwards'             => $request->firmAwards,
            'firmContact'            => $request->firmContact,
            'contactName'            => $request->contactName,
            'contactEmail'           => $request->contactEmail,
            'contactPhone'           => $request->contactPhone,
            'contactPref'            => $request->contactPref,
            'contactMessage'         => $request->contactMessage,
            'contactTerms'           => $request->contactTerms,
            'Facebook'               => $request->Facebook,
            'Twitter'                => $request->Twitter,
            'Instagram'              => $request->Instagram,
            'LinkedIn'               => $request->LinkedIn,
            'Google'                 => $request->Google,
            'Pinterest'              => $request->Pinterest,
            'Tumblr'                 => $request->Tumblr,
            'YouTube'                => $request->YouTube,
            'Vimeo'                  => $request->Vimeo,
            'firmAnalytics'          => $request->firmAnalytics,
        ]);
    }

    public function show($websiteId)
    {
        $website = Website::find($websiteId);

        return [
            'general'     => [
                'name'    => $website->firmName,
                'address' => $website->firmAddress,
                'city'    => $website->firmCity,
                'state'   => $website->firmState,
                'zip'     => $website->firmZip,
                'lat'     => $website->firmLat,
                'long'    => $website->firmLong
            ],
            'welcome'  => [
                'content'     => $website->firmWelcome,
                'img'         => $website->firmWelcomeImg
            ],
            'about'    => $website->firmAbout,
            'action'   => $website->firmAction,
            'practice' => [
                [
                    'check' => $website->areaOneCheck,
                    'title' => $website->areaOne,
                    'icon'  => $website->areaOneIcon
                ],
                [
                    'check' => $website->areaTwoCheck,
                    'title' => $website->areaTwo,
                    'icon'  => $website->areaTwoIcon
                ],
                [
                    'check' => $website->areaThreeCheck,
                    'title' => $website->areaThree,
                    'icon'  => $website->areaThreeIcon
                ],
                [
                    'check' => $website->areaFourCheck,
                    'title' => $website->areaFour,
                    'icon'  => $website->areaFourIcon
                ],
                [
                    'check' => $website->areaFiveCheck,
                    'title' => $website->areaFive,
                    'icon'  => $website->areaFiveIcon
                ],
                [
                    'check' => $website->areaSixCheck,
                    'title' => $website->areaSix,
                    'icon'  => $website->areaSixIcon
                ]
            ],
            'staff'    => [
                [
                    'check' => $website->StaffOneCheck,
                    'name'  => $website->staffOne,
                    'title' => $website->staffOneTitle,
                    'email' => $website->staffOneContactEmail,
                    'phone' => $website->staffOneContactPhone,
                    'bio'   => $website->staffOneBio
                ],
                [
                    'check' => $website->StaffTwoCheck,
                    'name'  => $website->staffTwo,
                    'title' => $website->staffTwoTitle,
                    'email' => $website->staffTwoContactEmail,
                    'phone' => $website->staffTwoContactPhone,
                    'bio'   => $website->staffTwoBio
                ],
                [
                    'check' => $website->StaffThreeCheck,
                    'name'  => $website->staffThree,
                    'title' => $website->staffThreeTitle,
                    'email' => $website->staffThreeContactEmail,
                    'phone' => $website->staffThreeContactPhone,
                    'bio'   => $website->staffThreeBio
                ],
                [
                    'check' => $website->StaffFourCheck,
                    'name'  => $website->staffFour,
                    'title' => $website->staffFourTitle,
                    'email' => $website->staffFourContactEmail,
                    'phone' => $website->staffFourContactPhone,
                    'bio'   => $website->staffFourBio
                ],
                [
                    'check' => $website->StaffFiveCheck,
                    'name'  => $website->staffFive,
                    'title' => $website->staffFiveTitle,
                    'email' => $website->staffFiveContactEmail,
                    'phone' => $website->staffFiveContactPhone,
                    'bio'   => $website->staffFiveBio
                ],
                [
                    'check' => $website->StaffSixCheck,
                    'name'  => $website->staffSix,
                    'title' => $website->staffSixTitle,
                    'email' => $website->staffSixContactEmail,
                    'phone' => $website->staffSixContactPhone,
                    'bio'   => $website->staffSixBio
                ]
            ],
            'awards'   => $website->firmAwards,
            'contact'  => [
                    'content'    => $website->firmContact,
                    'name'       => $website->contactName,
                    'email'      => $website->contactEmail,
                    'phone'      => $website->contactPhone,
                    'preference' => $website->contactPref,
                    'message'    => $website->contactMessage,
                    'terms'      => $website->contactTerms,
            ],
            'social'   => [
                    'facebook'   => $website->Facebook,
                    'twitter'    => $website->Twitter,
                    'instagram'  => $website->Instagram,
                    'linkedin'   => $website->LinkedIn,
                    'google'     => $website->Google,
                    'pinterest'  => $website->Pinterest,
                    'tumblr'     => $website->Tumblr,
                    'youtube'    => $website->YouTube,
                    'vimeo'      => $website->Vimeo,
            ],
            'analytics'   => $website->firmAnalytics,
        ];
    }
}
