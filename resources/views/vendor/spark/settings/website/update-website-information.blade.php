<update-website-details @if(auth()->user()->website()) :website="{{ auth()->user()->website() }}" @endif inline-template>
    <div>
        <div class="card card-default">
            <div class="card-header">
                {{__('Firm Information')}}
            </div>
            <div id="firmInfoForm" class="card-body" aria-labelledby="headingOne">
                <fieldset>
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="firmLogo">Firm Logo</label>
                        <div class="col-md-8 row">
                            <div class="col-sm-4">
                                <div class="image-placeholder">
                                    <span role="img" class="logo-photo-preview" :style="previewStyle"></span>
                                </div>
                            </div>
                            <div class="spark-uploader col-sm-8">
                                <input ref="photo" type="file" class="spark-uploader-control" name="firmLogo" @change="update" :disabled="form.busy">
                                <div class="btn btn-outline-dark">{{__('Upload Image')}}</div>
                            </div>
                        </div>
                        <div style="height:10px; width: 100%;"></div>

                        <label class="col-md-4 control-label" for="firmName">Firm Name</label>
                        <div class="col-md-8">
                            <input id="firmName" name="firmName" v-model="form.firmName" type="text" placeholder="The Law Firm of AWB" class="form-control input-md" :class="{'is-invalid': form.errors.has('firmName')}">
                        </div>

                        <label class="col-md-4 control-label" for="firmAddress">Firm Address</label>
                        <div class="col-md-8">
                            <input id="firmAddress" name="firmAddress" v-model="form.firmAddress" type="text" placeholder="123 N. South St" class="form-control input-md" :class="{'is-invalid': form.errors.has('firmAddress')}">
                        </div>

                        <label class="col-md-4 control-label" for="firmCity">City</label>
                        <div class="col-md-8">
                            <input id="firmCity" name="firmCity" v-model="form.firmCity" type="text" placeholder="Townville" class="form-control input-md" :class="{'is-invalid': form.errors.has('firmCity')}">
                        </div>

                        <label class="col-md-4 control-label" for="firmState">State</label>
                        <div class="col-md-8">
                            <input id="firmState" name="firmState" v-model="form.firmState" type="text" placeholder="ST" class="form-control input-md" :class="{'is-invalid': form.errors.has('firmState')}">
                        </div>

                        <label class="col-md-4 control-label" for="firmZip">Zip</label>
                        <div class="col-md-8">
                            <input id="firmZip" name="firmZip" v-model="form.firmZip" type="text" placeholder="12345" class="form-control input-md" :class="{'is-invalid': form.errors.has('firmZip')}">
                        </div>

                        <label class="col-md-4 control-label" for="firmLat">Map Latitude</label>
                        <div class="col-md-8">
                            <input id="firmLat" name="firmLat" v-model="form.firmLat" type="text" placeholder="36.153982" class="form-control input-md" :class="{'is-invalid': form.errors.has('firmLat')}">
                        </div>

                        <label class="col-md-4 control-label" for="firmLong">Map Longitude</label>
                        <div class="col-md-8">
                            <input id="firmLong" name="firmLong" v-model="form.firmLong" type="text" placeholder="-95.992775" class="form-control input-md" :class="{'is-invalid': form.errors.has('firmLong')}">
                            <small>Find your Latitude and Longitude by visiting <a target="_blank" href="http://latlong.net">http://latlong.net</a></small>
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
