<update-website-details @if(auth()->user()->website()) :website="{{ auth()->user()->website() }}" @endif inline-template>
    <div>
        <div class="card card-default">
            <div class="card-header">
                {{__('Staff Members')}}
            </div>
            <div id="firmStaffForm" class="card-body" aria-labelledby="headingOne">
                <fieldset>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="staffOne">Staff 1</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="StaffOneCheck" checked="checked" v-model="form.StaffOneCheck">
                                    </div>
                                </div>
                                <input id="staffOne" name="staffOne" v-model="form.staffOne" class="form-control" type="text" placeholder="Tom Jones">
                            </div>
                            <div class="input-group">
                                <input id="staffOneTitle" name="staffOneTitle" v-model="form.staffOneTitle" class="form-control" type="text" placeholder="Partner">
                                <input id="staffOneContactEmail" name="staffOneContactEmail" v-model="form.staffOneContactEmail" class="form-control" type="text" placeholder="tom@email.com">
                                <input id="staffOneContactPhone" name="staffOneContactPhone" v-model="form.staffOneContactPhone" class="form-control" type="text" placeholder="555-765-4321">
                            </div>
                            <div class="input-group">
                                <textarea class="form-control" id="staffOneBio" v-model="form.staffOneBio" name="staffOneBio">
                                    Tom has been practicing law since graduating from Law School in 1995 and has recivied numerous accomodations for excellence.
                                </textarea>
                            </div>
                        </div>

                        <label class="col-md-4 control-label" for="staffTwo">Staff 2</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="StaffTwoCheck" v-model="form.StaffTwoCheck">
                                    </div>
                                </div>
                                <input id="staffTwo" name="staffTwo" v-model="form.staffTwo" class="form-control" type="text" placeholder="Tom Jones">
                            </div>
                            <div class="input-group">
                                <input id="staffTwoTitle" name="staffTwoTitle" v-model="form.staffTwoTitle" class="form-control" type="text" placeholder="Partner">
                                <input id="staffTwoContactEmail" name="staffTwoContactEmail" v-model="form.staffTwoContactEmail" class="form-control" type="text" placeholder="tom@email.com">
                                <input id="staffTwoContactPhone" name="staffTwoContactPhone" v-model="form.staffTwoContactPhone" class="form-control" type="text" placeholder="555-765-4321">
                            </div>
                            <div class="input-group">
                                <textarea class="form-control" id="staffTwoBio" name="staffTwoBio" v-model="form.staffTwoBio">
                                    Tom has been practicing law since graduating from Law School in 1995 and has recivied numerous accomodations for excellence.
                                </textarea>
                            </div>
                        </div>

                        <label class="col-md-4 control-label" for="staffThree">Staff 3</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="StaffThreeCheck" v-model="form.StaffThreeCheck">
                                    </div>
                                </div>
                                <input id="staffThree" name="staffThree" v-model="form.staffThree" class="form-control" type="text" placeholder="Tom Jones">
                            </div>
                            <div class="input-group">
                                <input id="staffThreeTitle" name="staffThreeTitle" v-model="form.staffThreeTitle" class="form-control" type="text" placeholder="Partner">
                                <input id="staffThreeContactEmail" name="staffThreeContactEmail" v-model="form.staffThreeContactEmail" class="form-control" type="text" placeholder="tom@email.com">
                                <input id="staffThreeContactPhone" name="staffThreeContactPhone" v-model="form.staffThreeContactPhone" class="form-control" type="text" placeholder="555-765-4321">
                            </div>
                            <div class="input-group">
                                <textarea class="form-control" id="staffThreeBio" name="staffThreeBio" v-model="form.staffThreeBio">
                                    Tom has been practicing law since graduating from Law School in 1995 and has recivied numerous accomodations for excellence.
                                </textarea>
                            </div>
                        </div>

                        <label class="col-md-4 control-label" for="staffFour">Staff 4</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="StaffFourCheck" v-model="form.StaffFourCheck">
                                    </div>
                                </div>
                                <input id="staffFour" name="staffFour" v-model="form.staffFour" class="form-control" type="text" placeholder="Tom Jones">
                            </div>
                            <div class="input-group">
                                <input id="staffFourTitle" name="staffFourTitle" v-model="form.staffFourTitle" class="form-control" type="text" placeholder="Partner">
                                <input id="staffFourContactEmail" name="staffFourContactEmail" v-model="form.staffFourContactEmail" class="form-control" type="text" placeholder="tom@email.com">
                                <input id="staffFourContactPhone" name="staffFourContactPhone" v-model="form.staffFourContactPhone" class="form-control" type="text" placeholder="555-765-4321">
                            </div>
                            <div class="input-group">
                                <textarea class="form-control" id="staffFourBio" name="staffFourBio" v-model="form.staffFourBio">
                                    Tom has been practicing law since graduating from Law School in 1995 and has recivied numerous accomodations for excellence.
                                </textarea>
                            </div>
                        </div>

                        <label class="col-md-4 control-label" for="staffFive">Staff 5</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="StaffFiveCheck" v-model="form.StaffFiveCheck">
                                    </div>
                                </div>
                                <input id="staffFive" name="staffFive" v-model="form.staffFive" class="form-control" type="text" placeholder="Tom Jones">
                            </div>
                            <div class="input-group">
                                <input id="staffFiveTitle" name="staffFiveTitle" v-model="form.staffFiveTitle" class="form-control" type="text" placeholder="Partner">
                                <input id="staffFiveContactEmail" name="staffFiveContactEmail" v-model="form.staffFiveContactEmail" class="form-control" type="text" placeholder="tom@email.com">
                                <input id="staffFiveContactPhone" name="staffFiveContactPhone" v-model="form.staffFiveContactPhone" class="form-control" type="text" placeholder="555-765-4321">
                            </div>
                            <div class="input-group">
                                <textarea class="form-control" id="staffFiveBio" name="staffFiveBio" v-model="form.staffFiveBio">
                                    Tom has been practicing law since graduating from Law School in 1995 and has recivied numerous accomodations for excellence.
                                </textarea>
                            </div>
                        </div>

                        <label class="col-md-4 control-label" for="staffSix">Staff 6</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="StaffSixCheck" v-model="form.StaffSixCheck">
                                    </div>
                                </div>
                                <input id="staffSix" name="staffSix" v-model="form.staffSix" class="form-control" type="text" placeholder="Tom Jones">
                            </div>
                            <div class="input-group">
                                <input id="staffSixTitle" name="staffSixTitle" v-model="form.staffSixTitle" class="form-control" type="text" placeholder="Partner">
                                <input id="staffSixContactEmail" name="staffSixContactEmail" v-model="form.staffSixContactEmail" class="form-control" type="text" placeholder="tom@email.com">
                                <input id="staffSixContactPhone" name="staffSixContactPhone" v-model="form.staffSixContactPhone" class="form-control" type="text" placeholder="555-765-4321">
                            </div>
                            <div class="input-group">
                                <textarea class="form-control" id="staffSixBio" name="staffSixBio" v-model="form.staffSixBio">
                                    Tom has been practicing law since graduating from Law School in 1995 and has recivied numerous accomodations for excellence.
                                </textarea>
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
