<?php

namespace App\Http\Controllers;

use App\Facades\Netlify;
use App\Website;

class WebsiteDeploymentController extends Controller
{
    public function deploy($websiteId)
    {
        //Get the website from the database
        $website = Website::find($websiteId);
        Netlify::post("sites/" . $website->netlifySiteId . "/builds", [
            'form_params' => [
                [clear_cache] => false
            ]
        ]);
        return redirect()->route('settings')->with('status', 'Deployment Started');
    }
}
