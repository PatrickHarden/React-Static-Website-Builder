<spark-update-profile-photo @if(auth()->user()->website()) :website="{{ auth()->user()->website() }}" @endif inline-template>
    <div class="card card-default" v-if="user">
        <div class="card-header">{{__('Background Image')}}</div>

        <div class="card-body">
            <div class="alert alert-danger" v-if="form.errors.has('firmWelcomeImg')">
                @{{ form.errors.get('firmWelcomeImg') }}
            </div>

            <form role="form">
                <div class="form-group row justify-content-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="image-placeholder mr-4">
                            <span role="img" class="firmWelcomeImg-photo-preview" :style="previewStyle"></span>
                        </div>
                        <div class="spark-uploader mr-4">
                            <input ref="firmWelcomeImg" type="file" class="spark-uploader-control" name="firmWelcomeImg" @change="update" :disabled="form.busy">
                            <div class="btn btn-outline-dark">{{__('Update Image')}}</div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-update-profile-photo>

<update-website-details @if(auth()->user()->website()) :website="{{ auth()->user()->website() }}" @endif inline-template>
    <div>
        <div class="card card-default">
            <div class="card-header">
                {{__('Welcome')}}
            </div>
            <div id="firmWelcomenForm" class="card-body" aria-labelledby="headingOne">
                <fieldset>
<!--                     <div class="form-group row">
                        <label class="col-md-4 control-label" for="firmWelcomeImg">Background Image</label>
                        <div class="col-md-8 row">
                            <div class="col-sm-4">
                                <div class="image-placeholder">
                                    <span role="img" class="profile-photo-preview" :style="previewStyle"></span>
                                </div>
                            </div>
                            <div class="spark-uploader col-sm-8">
                                <input ref="photo" type="file" class="spark-uploader-control" name="firmWelcomeImg" @change="update" :disabled="form.busy">
                                <div class="btn btn-outline-dark">{{__('Upload Image')}}</div>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="firmWelcome">Welcome Content</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="firmWelcome" name="firmWelcome" v-model="form.firmWelcome" :class="{'is-invalid': form.errors.has('firmWelcome')}"
                                placeholder="">
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
