<?php
$icons = '
<option value="set01-icon01">Set #1 - Education</option>
<option value="set01-icon02">Set #1 - Hammer</option>
<option value="set01-icon03">Set #1 - Law</option>
<option value="set01-icon04">Set #1 - Old Law</option>
<option value="set01-icon05">Set #1 - Justice</option>
<option value="set01-icon06">Set #1 - Cash</option>
<option value="set01-icon07">Set #1 - Laws</option>
<option value="set01-icon08">Set #1 - Agreement</option>
<option value="set01-icon09">Set #1 - Prisoner</option>
<option value="set01-icon10">Set #1 - Handcuffs</option>
<option value="set01-icon11">Set #1 - Pistol</option>
<option value="set01-icon12">Set #1 - Documents</option>
<option value="set01-icon13">Set #1 - Safe</option>
<option value="set01-icon14">Set #1 - Honesty</option>
<option value="set01-icon15">Set #1 - Lawyer</option>
<option value="set01-icon16">Set #1 - Court</option>
<option value="set01-icon17">Set #1 - Real Estate Laws</option>
<option value="set01-icon18">Set #1 - Bandit</option>
<option value="set01-icon19">Set #1 - Emergency Light</option>
<option value="set01-icon20">Set #1 - Crime Scene</option>
<option value="set01-icon21">Set #1 - Time</option>
<option value="set01-icon22">Set #1 - Evidence</option>
<option value="set01-icon23">Set #1 - Police Station</option>
<option value="set01-icon24">Set #1 - International Law</option>
<option value="set01-icon25">Set #1 - Video Surveillance</option>
<option value="set01-icon26">Set #1 - Computer Base</option>
<option value="set01-icon27">Set #1 - Secret Testimony</option>
<option value="set01-icon28">Set #1 - Judge</option>
<option value="set01-icon29">Set #1 - Sight</option>
<option value="set01-icon30">Set #1 - Fingerprints</option>
';
?>

<update-website-details @if(auth()->user()->website()) :website="{{ auth()->user()->website() }}" @endif inline-template>
    <div>
        <div class="card card-default">
            <div class="card-header">
                {{__('Practice Areas')}}
            </div>
            <div id="firmPracticeForm" class="card-body" aria-labelledby="headingOne">
                <fieldset>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="areaOne">Practice Area 1</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input name="areaOneCheck" type="checkbox" checked="checked" v-model="form.areaOneCheck">
                                    </div>
                                </div>
                                <input id="areaOne" name="areaOne" v-model="form.areaOne" class="form-control" type="text" placeholder="Family Law">
                            </div>
                        </div>
                        <label class="col-md-4 control-label" for="areaOneIcon">Practice Area 1 Icon</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <select id="areaOneIcon" name="areaOneIcon" v-model="form.areaOneIcon" class="form-control">
                                    <?php echo $icons; ?>
                                </select>
                            </div>
                        </div>

                        <label class="col-md-4 control-label" for="areaTwo">Practice Area 2</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="areaTwoCheck" v-model="form.areaTwoCheck">
                                    </div>
                                </div>
                                <input id="areaTwo" name="areaTwo" v-model="form.areaTwo" class="form-control" type="text" placeholder="Family Law">
                            </div>
                        </div>
                        <label class="col-md-4 control-label" for="areaTwoIcon">Practice Area 2 Icon</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <select id="areaTwoIcon" name="areaTwoIcon" v-model="form.areaTwoIcon" class="form-control">
                                    <?php echo $icons; ?>
                                </select>
                            </div>
                        </div>

                        <label class="col-md-4 control-label" for="areaThree">Practice Area 3</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="areaThreeCheck" v-model="form.areaThreeCheck">
                                    </div>
                                </div>
                                <input id="areaThree" name="areaThree" v-model="form.areaThree" class="form-control" type="text" placeholder="Family Law">
                            </div>
                        </div>
                        <label class="col-md-4 control-label" for="areaThreeIcon">Practice Area 3 Icon</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <select id="areaThreeIcon" name="areaThreeIcon" v-model="form.areaThreeIcon" class="form-control">
                                    <?php echo $icons; ?>
                                </select>
                            </div>
                        </div>

                        <label class="col-md-4 control-label" for="areaFour">Practice Area 4</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="areaFourCheck" v-model="form.areaFourCheck">
                                    </div>
                                </div>
                                <input id="areaFour" name="areaFour" v-model="form.areaFour" class="form-control" type="text" placeholder="Family Law">
                            </div>
                        </div>
                        <label class="col-md-4 control-label" for="areaFourIcon">Practice Area 4 Icon</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <select id="areaFourIcon" name="areaFourIcon" v-model="form.areaFourIcon" class="form-control">
                                    <?php echo $icons; ?>
                                </select>
                            </div>
                        </div>

                        <label class="col-md-4 control-label" for="areaFive">Practice Area 5</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="areaFiveCheck" v-model="form.areaFiveCheck">
                                    </div>
                                </div>
                                <input id="areaFive" name="areaFive" v-model="form.areaFive" class="form-control" type="text" placeholder="Family Law">
                            </div>
                        </div>
                        <label class="col-md-4 control-label" for="areaFiveIcon">Practice Area 5 Icon</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <select id="areaFiveIcon" name="areaFiveIcon" v-model="form.areaFiveIcon" class="form-control">
                                    <?php echo $icons; ?>
                                </select>
                            </div>
                        </div>

                        <label class="col-md-4 control-label" for="areaSix">Practice Area 6</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="areaSixCheck" v-model="form.areaSixCheck">
                                    </div>
                                </div>
                                <input id="areaSix" name="areaSix" v-model="form.areaSix" class="form-control" type="text" placeholder="Family Law">
                            </div>
                        </div>
                        <label class="col-md-4 control-label" for="areaSixIcon">Practice Area 6 Icon</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <select id="areaSixIcon" name="areaSixIcon" v-model="form.areaSixIcon" class="form-control">
                                    <?php echo $icons; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>

            </div>
        </div>

        <!-- Success Message -->
        <div class="alert alert-success" v-if="form.successful">
            {{__('Your website information has been updated!')}}
        </div>

        <button type="submit" class="btn btn-accent"
            @click.prevent="update"
            :disabled="form.busy">Save
        </button>
    </div>
</update-website-details>
