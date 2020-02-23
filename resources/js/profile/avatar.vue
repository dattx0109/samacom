<template>
    <div class="page-flex">
        <div class="fixed-top">
            <div class="container">
                <div class="fixed-top__inner fixed-top__inner--flex-end display-flex-wrap">
                    <div class="fixed-top__block display-flex-wrap" v-if="urlRedirect">
                        <div class="fixed-top__img">
<!--                            <img src="{{jobRedirect.logo}}">-->
                        </div>
                        <div class="fixed-top__text p-r-0">
                            <div class="fixed-top__head display-flex-wrap">
                                <div class="fixed-top__title s-text17 m-r-20">{{jobRedirect.title}}</div>
                                <div class="page-tag page-tag--red mobile-hidden">
                                    <span v-if="jobRedirect.job_type == 1">Toàn thời gian</span>
                                    <span v-if="jobRedirect.job_type == 2">Part time</span>
                                    <span v-if="jobRedirect.job_type == 3">Hợp đồng</span>
                                    <span v-if="jobRedirect.job_type == 4">Mùa vụ</span>
                                </div>
                            </div>
                            <div class="fixed-top__desc s-text8 mobile-hidden">{{jobRedirect.name}}</div>
                        </div>
                    </div>
                    <div class="fixed-top__block fixed-top__block--right display-flex-wrap">
                        <div class="page-point page-point--full m-r-20 mobile-hidden" style="width: 255px;">
                            <div class="page-point__item page-point__item--inline">
                                <div class="page-point__title s-text9 m-b-7">Mức độ hoàn thành:</div>
                                <div class="page-point__point s-text9">
                                    {{Math.round(profile['percentageProfile']['percentage_profile'])}}%
                                </div>
                                <div class="page-point__block">
                                    <div class="page-point__progress processBarLoading"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tar" v-if="urlRedirect">
                            <a @click="btnApplyJob()" class="button-primary" :disabled=" ! (urlRedirect && profile['percentageProfile']['is_pass_apply'])">Ứng tuyển ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        <div style="clear: both" v-if="urlRedirect && profile['percentageProfile']['is_pass_apply']">-->
<!--            <h1>Ứng tuyển job</h1>-->
<!--            <a href="" class="btn btn-success">Ứng tuyển job</a>-->
<!--        </div>-->
        <div class="upload-example mo-m0a">
            <div class="page-block__img m-m-r-0"
                 id="avatr_show">
                <img :src="profile['accountDetail']['avatar']" v-if="profile['accountDetail']['avatar']">
                <img src="/img/avatar_default.png" v-if="!profile['accountDetail']['avatar']">
            </div>

        </div>

        <div class="page-block__desc page-block__desc--flex">
            <div class="page-block__head page-block__head--full m-tac display-block">
                <h4 class="page-block__title m-text3 m-b-0 m-b-5 m-r-20">{{profile['account']['name']}}</h4>
                <div class="s-text10 m-b-20 m-m-b-10">{{profile['account']['email']}}</div>
                <span class="label-link label-link--no-input" @click="$refs.file.click()">
				    <input type="file" ref="file" @click="resetImageUploader" @change="uploadImage($event)"
                           accept="image/*">
				    Đổi ảnh đại diện<sup class="text-warning">*</sup>
			    </span>
            </div>
            <div class="page-block__info">
                <div>{{profile2}}</div>

                <div class="form-group">
                    <div class="display-flex-wrap">
                        <label for="job_search_status" class="m-r-10">Trạng thái tìm việc</label>
                        <div class="page-block__saved page-block__saved--active m-b-5" v-if="isLoading">
                            <div class="icon-container"><i class="fa fa-check"></i></div>
                            Đã lưu
                        </div>
                    </div>
                    <div class="select-wrapper">
                        <select id="job_search_status" class="chosen-select primary-select mw100" v-model="statusJob"
                                @change="onChangeStatus()"
                                tabindex="2">
                            <option v-for="item in profileStatus" :value="item.id">{{ item.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="page-point page-point--full">
                    <div class="page-point__item">
                        <div class="page-point__title s-text9 m-b-7">Mức độ hoàn thành:</div>
                        <div class="page-point__point s-text9">
                            {{Math.round(profile['percentageProfile']['percentage_profile'])}}%
                        </div>
                        <div class="page-point__block">
                            <div class="page-point__progress processBarLoading"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalAvatar" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="icon-close-2"></i></button>
                        <h4 class="modal-title">Cập nhật avatar</h4>
                    </div>
                    <div class="modal-body">
                        <div style="margin: auto">
                            <Cropper
                                    classname="upload-example-cropper"
                                    :src="image"
                                    :defaultSize="defaultSize"
                                    ref="cropper"
                                    :restrictions="pixelsRestriction"
                                    :minHeight="360"
                                    :minWidth="360"
                                    :stencil-props="{
                                    minAspectRatio: 8/8,
                                    maxAspectRatio: 8/8,
	                                }"
                            />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button-register m-r-10" data-dismiss="modal">Hủy</button>
                        <button @click="crop" class="button-primary">
                            <span v-if="!isLoading">
                                            Lưu hình ảnh
                                        </span>

                            <span v-if="isLoading">
                                            <span class="spinner spinner-border spinner-border-sm" role="status"
                                                  aria-hidden="true"></span>
                                            Loading...</span>

                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>
<script>
    import {Cropper} from 'vue-advanced-cropper'

    export default {
        components: {
            Cropper
        },
        props: [
            // Aspect ratios
            'aspectRatio', 'minAspectRatio', 'maxAspectRatio',
        ],
        props: {
            profile: {
                type: Object
            },
            profile2: {
                type: Object
            }
        },
        data() {
            return {
                profileStatus: [
                    {
                        'id': 1,
                        'name': 'Đang tìm việc'
                    },
                    {
                        'id': 2,
                        'name': 'Đang cân nhắc'
                    },
                    {
                        'id': 3,
                        'name': 'Không tìm việc'
                    },
                ],
                coordinates: {
                    width: 0,
                    height: 0,
                    left: 0,
                    top: 0
                },
                image: null,
                imageView: null,
                isLoading: false,
                statusJob: 1,
                urlRedirect: '',
                jobId : '',
                jobRedirect : {
                    'title' : '',
                    'logo' : '',
                    'name' : '',
                    'job_type' : ''
                }
            }
        },
        methods: {
            pixelsRestriction({minWidth, minHeight, maxWidth, maxHeight, imageWidth, imageHeight}) {
                return {
                    minWidth: minWidth,
                    minHeight: minHeight,
                    maxWidth: Math.min(imageWidth, maxWidth),
                    maxHeight: Math.min(imageHeight, maxHeight),
                }
            },

            aspectRatios() {
                return {
                    minimum: this.aspectRatio || this.minAspectRatio,
                    maximum: this.aspectRatio || this.maxAspectRatio,
                }
            },

            checkRouterRedirect() {
                let urlParams = new URLSearchParams(window.location.search);
                let redirectParam = urlParams.get('redirect');
                console.log(redirectParam);
                console.log('============= >>>>>');
                if (redirectParam) {
                    let listParam = redirectParam.split('/');
                    let jobId = listParam[listParam.length - 1];
                    this.jobId = jobId;
                    axios
                        .get('/job/'+jobId)
                        .then(data => {
                            this.jobRedirect = data.data;
                        });
                    // let urlFull = redirectParam;

                    this.urlRedirect = redirectParam;

                }

            },
            btnApplyJob(){
                axios
                    .get('/candidate-api/'+this.jobId)
                    .then(data => {
                        window.location.href = data.data;
                        this.isLoading = false;
                    });

            },
            resetImageUploader() {
                this.$refs.file.value = '';
            },
            onChangeStatus() {
                let rawDataUpdate = {
                    'status': this.statusJob
                };
                this.isLoading = true;
                axios
                    .post('/account/update-job-status', rawDataUpdate)
                    .then(data => {
                        this.isLoading = false;
                    });
                console.log(this.statusJob);
            },
            crop() {
                const {coordinates, canvas} = this.$refs.cropper.getResult()
                this.coordinates = coordinates;
                // You able to do different manipulations at a canvas
                // but there we just get a cropped image
                let rawDataUploadImage = {
                    image: canvas.toDataURL()
                };
                this.isLoading = true;
                axios
                    .post('/account/update-avatar', rawDataUploadImage)
                    .then(data => {
                        this.isLoading = false;
                        this.profile.accountDetail.avatar = data.data;
                        $('#modalAvatar').modal('hide');
                    });
            },
            uploadImage(event) {
                console.log('pingggg 111');
                $('#modalAvatar').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#modalAvatar').modal('show');

                // Reference to the DOM input element
                var input = event.target;
                // Ensure that you have a file before attempting to read it
                if (input.files && input.files[0]) {
                    // create a new FileReader to read this image and convert to base64 format
                    var reader = new FileReader();
                    // Define a callback function to run, when FileReader finishes its job
                    reader.onload = (e) => {
                        // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                        // Read image as base64 and set to imageData
                        this.image = e.target.result;
                    }
                    // Start the reader job - read file as a data url (base64 format)
                    reader.readAsDataURL(input.files[0]);
                }
            },
            defaultSize() {
                return {
                    width: 360,
                    height: 360,
                }
            }
        },
        mounted() {
            this.checkRouterRedirect();
            this.statusJob = this.profile['accountDetail']['job_search_status'];
            if (!this.statusJob) {
                this.statusJob = 1;
            }
            $('.processBarLoading').attr('data-width', Math.round(this.profile['percentageProfile']['percentage_profile']))
        }

    }
</script>