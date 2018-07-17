<update-website-details  @if(auth()->user()->website()) :website="{{ auth()->user()->website() }}" @endif inline-template>
    <div>
        <div class="card card-default">
            <div class="card-header">
                {{__('Social Media Accounts')}}
            </div>
            <div id="firmSocialForm" class="card-body" aria-labelledby="headingOne">
                <fieldset>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="Facebook">Facebook</label>
                        <div class="col-md-8">
                            <input id="Facebook" name="Facebook" v-model="form.Facebook" type="text" placeholder="" class="form-control input-md" :class="{'is-invalid': form.errors.has('Facebook')}">
                        </div>
                        @if(auth()->user()->website()) :website="{{ auth()->user()->website() }}" @endif
                        <label class="col-md-4 control-label" for="Twitter">Twitter</label>
                        <div class="col-md-8">
                            <input id="Twitter" name="Twitter" v-model="form.Twitter" type="text" placeholder="" class="form-control input-md" :class="{'is-invalid': form.errors.has('Twitter')}">
                        </div>

                        <label class="col-md-4 control-label" for="Instagram">Instagram</label>
                        <div class="col-md-8">
                            <input id="Instagram" name="Instagram" v-model="form.Instagram" type="text" placeholder="" class="form-control input-md" :class="{'is-invalid': form.errors.has('Instagram')}">
                        </div>

                        <label class="col-md-4 control-label" for="LinkedIn">LinkedIn</label>
                        <div class="col-md-8">
                            <input id="LinkedIn" name="LinkedIn" v-model="form.LinkedIn" type="text" placeholder="" class="form-control input-md" :class="{'is-invalid': form.errors.has('LinkedIn')}">
                        </div>

                        <label class="col-md-4 control-label" for="Google">Google+</label>
                        <div class="col-md-8">
                            <input id="Google" name="Google" v-model="form.Google" type="text" placeholder="" class="form-control input-md" :class="{'is-invalid': form.errors.has('Google')}">
                        </div>

                        <label class="col-md-4 control-label" for="Pinterest">Pinterest</label>
                        <div class="col-md-8">
                            <input id="Pinterest" name="Pinterest" v-model="form.Pinterest" type="text" placeholder="" class="form-control input-md" :class="{'is-invalid': form.errors.has('Pinterest')}">
                        </div>

                        <label class="col-md-4 control-label" for="Tumblr">Tumblr</label>
                        <div class="col-md-8">
                            <input id="Tumblr" name="Tumblr" v-model="form.Tumblr" type="text" placeholder="" class="form-control input-md" :class="{'is-invalid': form.errors.has('Tumblr')}">
                        </div>

                        <label class="col-md-4 control-label" for="YouTube">YouTube</label>
                        <div class="col-md-8">
                            <input id="YouTube" name="YouTube" v-model="form.YouTube" type="text" placeholder="" class="form-control input-md" :class="{'is-invalid': form.errors.has('YouTube')}">
                        </div>

                        <label class="col-md-4 control-label" for="Vimeo">Vimeo</label>
                        <div class="col-md-8">
                            <input id="Vimeo" name="Vimeo" v-model="form.Vimeo" type="text" placeholder="" class="form-control input-md" :class="{'is-invalid': form.errors.has('Vimeo')}">
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
