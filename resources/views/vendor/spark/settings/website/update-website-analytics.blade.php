<update-website-details @if(auth()->user()->website()) :website="{{ auth()->user()->website() }}" @endif inline-template>
    <div>
        <div class="card card-default">
            <div class="card-header">
                {{__('Analytics')}}
            </div>
            <div id="firmAnalyticsForm" class="card-body" aria-labelledby="headingOne">
                <fieldset>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="firmAnalytics">Google UA</label>
                        <div class="col-md-8">
                            <input id="firmAnalytics" name="firmAnalytics" v-model="form.firmAnalytics" type="text" placeholder="" class="form-control input-md" :class="{'is-invalid': form.errors.has('firmAnalytics')}">
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
