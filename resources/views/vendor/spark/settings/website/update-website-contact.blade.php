<update-website-details @if(auth()->user()->website()) :website="{{ auth()->user()->website() }}" @endif inline-template>
    <div>
        <div class="card card-default">
            <div class="card-header">
                {{__('Contact Form')}}
            </div>
            <div id="firmContactForm" class="card-body" aria-labelledby="headingOne">
                <fieldset>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="firmContact">Intro Content</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="firmContact" name="firmContact" v-model="form.firmContact" :class="{'is-invalid': form.errors.has('firmContact')}">
                                IF you need legal assistance, call us today!
                            </textarea>
                        </div>

                        <label class="col-md-4 control-label">Form Fields</label>
                        <div class="col-md-8 row">
                            <div class="col-md-6">
                                <input name="contactName" type="checkbox" checked="checked" v-model="form.contactName">
                                <label class="control-label" for="contactName">Name</label>
                            </div>

                            <div class="col-md-6">
                                <input name="contactEmail" type="checkbox" checked="checked" v-model="form.contactEmail">
                                <label class="control-label" for="contactEmail">Email</label>
                            </div>

                        
                            <div class="col-md-6">
                                <input name="contactPhone" type="checkbox" checked="checked" v-model="form.contactPhone">
                                <label class="control-label" for="contactPhone">Phone</label>
                            </div>

                            
                            <div class="col-md-6">
                                <input name="contactPref" type="checkbox" checked="checked" v-model="form.contactPref">
                                <label class="control-label" for="contactPref">Contact Method</label>
                            </div>

                            
                            <div class="col-md-6">
                                <input name="contactMessage" type="checkbox" checked="checked" v-model="form.contactMessage">
                                <label class="control-label" for="contactMessage">Message</label>
                            </div>
                        </div>

                        <label class="col-md-4 control-label" for="contactTerms">Terms &amp; Conditions</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="contactTerms" name="contactTerms" v-model="form.contactTerms" :class="{'is-invalid': form.errors.has('contactTerms')}">
                                By submitting this form you agree to our terms and conditions.  Submission of this form does not institute client attorney priveledge.
                            </textarea>
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
