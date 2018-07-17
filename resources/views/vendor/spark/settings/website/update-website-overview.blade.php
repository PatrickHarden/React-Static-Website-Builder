<update-website-details @if(auth()->user()->website()) :website="{{ auth()->user()->website() }}" @endif inline-template>
    <div>
        <div class="card card-default">
            <div class="card-header">
                {{__('Firm Overview')}}
            </div>
            <div id="firmOverviewForm" class="card-body" aria-labelledby="headingOne">
                <fieldset>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea class="form-control" id="firmAbout" name="firmAbout" v-model="form.firmAbout" :class="{'is-invalid': form.errors.has('firmAbout')}"
                                placeholder="Our Law Firm is a general practice office with concentrations in every aspect of legal assistance you need.  For years we have prided ourselves in building a firm that creates opportunity for our client's advancement, that promotes family life, respects diversity, and offers our staff fulfilling careers.  We are also proud of the work we have done protecting and advocating for our client's rights, while also working in the community to support many great causes.
">
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
