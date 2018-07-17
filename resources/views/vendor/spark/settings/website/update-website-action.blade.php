<update-website-details @if(auth()->user()->website()) :website="{{ auth()->user()->website() }}" @endif inline-template>
    <div>
        <div class="card card-default">
            <div class="card-header">
                {{__('Call To Action')}}
            </div>
            <div id="firmActionForm" class="card-body" aria-labelledby="headingOne">
                <fieldset>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea class="form-control" id="firmAction" name="firmAction" v-model="form.firmAction" :class="{'is-invalid': form.errors.has('firmAction')}">
                                IF you need legal assistance, call us today!
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
