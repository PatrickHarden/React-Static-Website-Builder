<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('netlifySiteId')->nullable();
            $table->string('bitbucketRepo')->nullable();
            $table->text('firmName')->nullable();
            $table->text('firmAddress')->nullable();
            $table->text('firmCity')->nullable();
            $table->text('firmState')->nullable();
            $table->text('firmZip')->nullable();
            $table->text('firmLat')->nullable();
            $table->text('firmLong')->nullable();
            $table->text('firmLogo')->nullable();
            $table->string('firmAbout')->nullable();
            $table->string('firmAction')->nullable();
            $table->text('areaOneCheck')->nullable();
            $table->text('areaOne')->nullable();
            $table->text('areaOneIcon')->nullable();
            $table->text('areaTwoCheck')->nullable();
            $table->text('areaTwo')->nullable();
            $table->text('areaTwoIcon')->nullable();
            $table->text('areaThreeCheck')->nullable();
            $table->text('areaThree')->nullable();
            $table->text('areaThreeIcon')->nullable();
            $table->text('areaFourCheck')->nullable();
            $table->text('areaFour')->nullable();
            $table->text('areaFourIcon')->nullable();
            $table->text('areaFiveCheck')->nullable();
            $table->text('areaFive')->nullable();
            $table->text('areaFiveIcon')->nullable();
            $table->text('areaSixCheck')->nullable();
            $table->text('areaSix')->nullable();
            $table->text('areaSixIcon')->nullable();
            $table->text('StaffOneCheck')->nullable();
            $table->text('staffOne')->nullable();
            $table->text('staffOneTitle')->nullable();
            $table->text('staffOneContactEmail')->nullable();
            $table->text('staffOneContactPhone')->nullable();
            $table->string('staffOneBio')->nullable();
            $table->text('StaffTwoCheck')->nullable();
            $table->text('staffTwo')->nullable();
            $table->text('staffTwoTitle')->nullable();
            $table->text('staffTwoContactEmail')->nullable();
            $table->text('staffTwoContactPhone')->nullable();
            $table->string('staffTwoBio')->nullable();
            $table->text('StaffThreeCheck')->nullable();
            $table->text('staffThree')->nullable();
            $table->text('staffThreeTitle')->nullable();
            $table->text('staffThreeContactEmail')->nullable();
            $table->text('staffThreeContactPhone')->nullable();
            $table->string('staffThreeBio')->nullable();
            $table->text('StaffFourCheck')->nullable();
            $table->text('staffFour')->nullable();
            $table->text('staffFourTitle')->nullable();
            $table->text('staffFourContactEmail')->nullable();
            $table->text('staffFourContactPhone')->nullable();
            $table->string('staffFourBio')->nullable();
            $table->text('StaffFiveCheck')->nullable();
            $table->text('staffFive')->nullable();
            $table->text('staffFiveTitle')->nullable();
            $table->text('staffFiveContactEmail')->nullable();
            $table->text('staffFiveContactPhone')->nullable();
            $table->string('staffFiveBio')->nullable();
            $table->text('StaffSixCheck')->nullable();
            $table->text('staffSix')->nullable();
            $table->text('staffSixTitle')->nullable();
            $table->text('staffSixContactEmail')->nullable();
            $table->text('staffSixContactPhone')->nullable();
            $table->string('staffSixBio')->nullable();
            $table->string('firmWelcome')->nullable();
            $table->text('firmWelcomeImg')->nullable();
            $table->string('firmAwards')->nullable();
            $table->string('firmContact')->nullable();
            $table->text('contactName')->nullable();
            $table->text('contactEmail')->nullable();
            $table->text('contactPhone')->nullable();
            $table->text('contactPref')->nullable();
            $table->text('contactMessage')->nullable();
            $table->string('contactTerms')->nullable();
            $table->text('Facebook')->nullable();
            $table->text('Twitter')->nullable();
            $table->text('Instagram')->nullable();
            $table->text('LinkedIn')->nullable();
            $table->text('Google')->nullable();
            $table->text('Pinterest')->nullable();
            $table->text('Tumblr')->nullable();
            $table->text('YouTube')->nullable();
            $table->text('Vimeo')->nullable();
            $table->string('firmAnalytics')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
