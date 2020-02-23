<template>
    <div class="page-block m-b-30">
        <div class="display-flex-wrap m-b-6">
            <div class="m-text5 p-r-20">Học vấn/Bằng cấp</div>
            <div class="page-block__saved page-block__saved--active" v-if="isLoading">
                <div class="icon-container"><i class="fa fa-check"></i></div>
                Đã lưu
            </div>
        </div>
        <small class="m-b-20">Hoàn thành mục <sup class="text-danger">*</sup> để có thể ứng tuyển thành công</small>
        <div class="wrapper wrapper-content animated fadeInRight listAccountEdu">
            <div class="item-box item-box--has-tool"  id="education" v-for="item in profile['accountEdu']">
                <div class="item-box__inner">
                    <div class="item-box__head m-b-15">
                        <span class="item-box__title s-text7 m-r-20">
                            {{item['school']}}
                        </span>
                        <span class="item-box__date s-text8">
                            {{formatDate(item['start_time'])}} -> {{formatDate(item['end_time'])}}
                        </span>
                    </div>
                    <div class="item-box__label s-text11 m-b-5">
                        {{item['filed_study']}} - {{ degreeEducationRefactor[item['degree']]}}
                    </div>
                    <div class="item-box__desc">
                        {{item['description']}}
                    </div>
                </div>
                <div class="box-tool">
                    <div class="box-tool__item">
                        <i class="fa fa-edit" v-on:click="modalEditSchool(item)"></i>
                    </div>
                    <div class="box-tool__item" v-on:click="deleteSchool(item.id)">
                        <i class="fa fa-trash" v-if="!isLoadingDelete"></i>
                        <span v-if="isLoadingDelete">
                                            <span class="spinner spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Loading...</span>
                    </div>
                </div>
            </div>
        </div>
        <a data-toggle="modal" href="#modal-form1" class="dotted-button dotted-button--full" v-on:click="modalCreateSchool()"><i
                class="icon-add-2"></i>Thêm học vấn/bằng cấp</a>
        <div id="modal-create-school" class="modal fade modal-no-padding" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup-container p-b-25 m-p-20">
                            <div class="m-text3 m-b-20">Học vấn/Bằng cấp</div>
                            <form method="post" id="formEducation" action="" class="">
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Trường học<sup>*</sup></label>
                                    <input type="text" v-model="createSchool['school']" placeholder="Trường học" class="form-control">
                                    <!--                                    <div class="error-create-account-edu error_school"></div>-->
                                    <span class="msg-alert" v-if="errors['school']">{{errors['school']}}</span>
                                </div>
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Ngành nghề học</label>
                                    <input type="text" placeholder="Ngành nghề học" v-model="createSchool['filed_study']" class="form-control">
                                    <!--                                    <div class="error-create-account-edu error_filed_study"></div>-->
                                    <span class="msg-alert" v-if="errors['filed_study']">{{errors['filed_study']}}</span>
                                </div>
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Bằng cấp</label>
                                    <div class="select-wrapper">
                                        <select id="degree" v-model="createSchool.degree" data-placeholder="Chọn chức vụ ..." class="chosen-select primary-select" tabindex="2">
                                            <option value="" disabled selected>Chọn bằng cấp </option>
                                            <option v-for="item in degreeEducation"  :value="item.id">{{ item.name }}</option>
                                        </select>
                                    </div>
                                    <!--                                    <div class="error-create-account-edu error_degree"></div>-->
                                    <span class="msg-alert" v-if="errors['degree']">{{errors['degree']}}</span>
                                </div>
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Thành tích trong quá trình học</label>
                                    <textarea type="text" placeholder="Thành tích trong quá trình học" class="form-control" id="description_edu"
                                              name="description" v-model="createSchool.description"></textarea>
                                    <!--                                    <div class="error-create-account-edu error_description_edu"></div>-->
                                    <span class="msg-alert" v-if="errors['description']">{{errors['description']}}</span>
                                </div>
                                <div class="form-group form-group--half m-r-30 m-b-20">
                                    <label>Thời gian bắt đầu<sup>*</sup></label>
                                    <div class="form-control-container date">
                                        <date-pick
                                                v-model="createSchool.start_time_edu"
                                                :displayFormat="'DD-MM-YYYY'"
                                        ></date-pick>
                                        <!--                                        <input type="text" class="form-control" name="start_time_edu" id="start_time_edu">-->
                                    </div>
                                    <!--                                    <div class="error-create-account-edu error_start_time_edu"></div>-->
                                    <span class="msg-alert" v-if="errors['start_time_edu']">{{errors['start_time_edu']}}</span>
                                </div>
                                <div class="form-group form-group--half div_date_end m-b-25" id="data_1" >
                                    <label class="m-b-6">Thời gian kết thúc<sup>*</sup></label>
                                    <div class="form-control-container date">
                                        <date-pick
                                                v-model="createSchool.end_time_edu"
                                                :displayFormat="'DD-MM-YYYY'"
                                                :isDateDisabled="isFutureDateCreate"
                                        ></date-pick>
                                        <!--                                        <input type="text" class="form-control" name="end_time_edu" id="end_time_edu">-->
                                    </div>
                                    <!--                                    <div class="error-create-account-edu error_end_time_edu"></div>-->
                                    <span class="msg-alert" v-if="errors['end_time_edu']">{{errors['end_time_edu']}}</span>
                                </div>

                                <div class="popup-btn-container tar">
                                    <div data-id="" class="button-primary" id="btnEduAccount" type="submit" v-on:click="saveSchool()">
                                        <span v-if="!isLoading">
                                            Lưu lại
                                        </span>

                                        <span v-if="isLoading">
                                            <span class="spinner spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Loading...</span>
                                    </div>
                                </div>
                            </form>
                            <div class="popup-form-cls" data-dismiss="modal">
                                <div class="popup-form-cls-inner">
                                    <i class="icon-close-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal-edit-school" class="modal fade modal-no-padding" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup-container p-b-25 m-p-20">
                            <div class="m-text3 m-b-20">Học vấn/Bằng cấp</div>
                            <form method="post" action="" class="">
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Trường học<sup>*</sup></label>
                                    <input type="text" v-model="editSchool['school']" placeholder="Trường học" class="form-control">
                                    <!--                                    <div class="error-create-account-edu error_school"></div>-->
                                    <span class="msg-alert" v-if="errors['edit_school']">{{errors['edit_school']}}</span>
                                </div>
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Ngành nghề học</label>
                                    <input type="text" placeholder="Ngành nghề học" v-model="editSchool['filed_study']" class="form-control">
                                    <!--                                    <div class="error-create-account-edu error_filed_study"></div>-->
                                    <span class="msg-alert" v-if="errors['edit_filed_study']">{{errors['edit_filed_study']}}</span>
                                </div>
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Bằng cấp</label>
                                    <div class="select-wrapper">
                                        <select v-model="editSchool.degree" data-placeholder="Chọn chức vụ ..." class="chosen-select primary-select" tabindex="2">
                                            <option value="" disabled selected>Chọn bằng cấp </option>
                                            <option v-for="item in degreeEducation"  :value="item.id">{{ item.name }}</option>
                                        </select>
                                    </div>
                                    <!--                                    <div class="error-create-account-edu error_degree"></div>-->
                                    <span class="msg-alert" v-if="errors['edit_degree']">{{errors['edit_degree']}}</span>
                                </div>
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Thành tích trong quá trình học</label>
                                    <textarea type="text" placeholder="Thành tích trong quá trình học" class="form-control"
                                              name="description" v-model="editSchool.description"></textarea>
                                    <!--                                    <div class="error-create-account-edu error_description_edu"></div>-->
                                    <span class="msg-alert" v-if="errors['edit_description']">{{errors['edit_description']}}</span>
                                </div>
                                <div class="form-group form-group--half m-r-30 m-b-20">
                                    <label>Thời gian bắt đầu<sup>*</sup></label>
                                    <div class="form-control-container date">
                                        <date-pick
                                                v-model="editSchool.start_time"
                                                :displayFormat="'DD-MM-YYYY'"
                                        ></date-pick>
                                        <!--                                        <input type="text" class="form-control" name="start_time_edu" id="start_time_edu">-->
                                    </div>
                                    <!--                                    <div class="error-create-account-edu error_start_time_edu"></div>-->
                                    <span class="msg-alert" v-if="errors['edit_start_time_edu']">{{errors['edit_start_time_edu']}}</span>
                                </div>
                                <div class="form-group form-group--half div_date_end m-b-25">
                                    <label class="m-b-6">Thời gian kết thúc<sup>*</sup></label>
                                    <div class="form-control-container date">
                                        <date-pick
                                                v-model="editSchool.end_time"
                                                :displayFormat="'DD-MM-YYYY'"
                                                :isDateDisabled="isFutureDateEdit"
                                        ></date-pick>
                                        <!--                                        <input type="text" class="form-control" name="end_time_edu" id="end_time_edu">-->
                                    </div>
                                    <!--                                    <div class="error-create-account-edu error_end_time_edu"></div>-->
                                    <span class="msg-alert" v-if="errors['edit_end_time_edu']">{{errors['edit_end_time_edu']}}</span>
                                </div>

                                <div class="popup-btn-container tar">
                                    <div data-id="" class="button-primary" type="submit" v-on:click="saveEditSchool()">
                                        <span v-if="!isLoading">
                                            Lưu lại
                                        </span>

                                        <span v-if="isLoading">
                                            <span class="spinner spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Loading...</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        components: {
            DatePick
        },
        props:{
            profile : {
                type : Object
            }
        },
        data(){
            return {
                isLoading : false,
                isLoadingDelete : false,
                degreeEducation : [
                    {
                        'id' : 1,
                        'name' : 'Trung bình'
                    },
                    {
                        'id' : 2,
                        'name' : 'Khá'
                    },
                    {
                        'id' : 3,
                        'name' : 'Giỏi'
                    }
                ],
                degreeEducationRefactor : {
                    1 : 'Trung bình',
                    2 : 'Khá',
                    3 : 'Giỏi'
                },
                createSchool: {
                    school : '',
                    filed_study : '',
                    degree : '',
                    description : '',
                    start_time_edu : '',
                    end_time_edu : ''
                },
                editSchool: {
                    school : '',
                    filed_study : '',
                    degree : '',
                    description : '',
                    start_time : '',
                    end_time : ''
                },
                errors: {
                }
            }
        },
        mounted() {
        },
        methods: {

            resetInput(){
                this.createSchool =  {
                    school : '',
                        filed_study : '',
                        degree : '',
                        description : '',
                        start_time_edu : '',
                        end_time_edu : ''
                };
                this.errors = {};
            },
            isFutureDateEdit(date){
                let dateStart = new Date(this.editSchool.start_time);
                return date < dateStart;
            },
            isFutureDateCreate(date){
                let dateStart = new Date(this.createSchool.start_time_edu);
                return date < dateStart;
            },

            formatDate(inputDate){
                var p = inputDate.split(/\D/g)
                return [p[2],p[1],p[0] ].join("-")
            },
            isDateTimeNow(){
                let dateStart = new Date();
                return date > dateStart;
            },
            validateForm (){

                var requiredInput = 'Trường này không được để trống';
                var errors = {};
                if( ! this.createSchool.school){
                    errors.school = requiredInput;
                }

                // if( ! this.createSchool.filed_study){
                //     errors.filed_study = requiredInput;
                // }
                // if( ! this.createSchool.degree){
                //     errors['degree'] = requiredInput;
                // }
                //
                // if( ! this.createSchool.description){
                //     errors['description'] = requiredInput;
                // }


                if( ! this.createSchool.start_time_edu){
                    errors['start_time_edu'] = requiredInput;
                }

                if( ! this.createSchool.end_time_edu){
                    errors['end_time_edu'] = requiredInput;
                }

                if(this.createSchool.start_time_edu){
                    var q = new Date();
                    var m = q.getMonth();
                    var d = q.getDay();
                    var y = q.getFullYear();

                    var date = new Date(y,m,d);

                    let mydate = new Date(this.createSchool.start_time_edu);

                    if(date < mydate) {
                        errors['start_time_edu'] = 'Thời gian bắt đầu phải nhỏ hơn thời gian hiện ';
                    }
                }

                if(this.createSchool.end_time_edu){
                    var q = new Date();
                    var m = q.getMonth();
                    var d = q.getDay();
                    var y = q.getFullYear();

                    let date = new Date(y,m,d);

                    let mydate = new Date(this.createSchool.end_time_edu);

                    if(date < mydate) {
                        errors['end_time_edu'] = 'Thời gian bắt đầu phải nhỏ hơn thời gian hiện ';
                    }
                }

                return errors;
            },

            validateEditForm (){
                var requiredInput = 'Trường này không được để trống';
                var errors = {};

                if( ! this.editSchool.school){
                    errors.edit_school = requiredInput;
                }

                // if( ! this.editSchool.filed_study){
                //     errors.edit_filed_study = requiredInput;
                // }
                // if( ! this.editSchool.degree){
                //     errors['edit_degree'] = requiredInput;
                // }
                //
                // if( ! this.editSchool.description){
                //     errors['edit_description'] = requiredInput;
                // }

                if( ! this.editSchool.start_time){
                    errors['edit_start_time_edu'] = requiredInput;
                }

                if( ! this.editSchool.end_time){
                    errors['edit_end_time_edu'] = requiredInput;
                }
                return errors;
            },

            modalCreateSchool(){
                this.resetInput();
                $('#modal-create-school').modal('show');
            },

            modalEditSchool(item){
                this.editSchool = item;
                $('#modal-edit-school').modal('show');
            },

            saveEditSchool(){
                let objectNullValidate = ! (Object.keys(this.validateEditForm()).length === 0 && this.validateEditForm().constructor === Object);
                if( objectNullValidate ){
                    this.errors = this.validateEditForm();
                    return;
                }

                let rawDataPost = {
                    school          : this.editSchool.school,
                    filed_study     : this.editSchool.filed_study,
                    degree          : this.editSchool.degree,
                    description     : this.editSchool.description,
                    start_time      : this.editSchool.start_time,
                    end_time        : this.editSchool.end_time,
                };
                this.isLoading = true;
                axios
                    .post('/account/update-account-education/'+this.editSchool.id, rawDataPost)
                    .then(data => {
                        axios
                            .get('/account/get-list-edu')
                            .then(data => {
                                $('#modal-edit-school').modal('hide');
                                this.isLoading = false;
                                this.profile.accountEdu = data.data;
                            });
                    })
            },

            deleteSchool(schoolId){
                this.isLoadingDelete = true;
                axios
                    .post('/account/delete-account-education/'+schoolId)
                    .then(data => {
                        axios
                            .get('/account/get-list-edu')
                            .then(data => {
                                $('#modal-edit-school').modal('hide');
                                this.isLoadingDelete = false;
                                this.profile.accountEdu = data.data;
                            });

                });
            },

            saveSchool(){
                let objectNullValidate = ! (Object.keys(this.validateForm()).length === 0 && this.validateForm().constructor === Object);

                if( objectNullValidate ){
                    this.errors = this.validateForm();
                    return;
                }

                let rawDataPost = {
                    school          : this.createSchool.school,
                    filed_study     : this.createSchool.filed_study,
                    degree          : this.createSchool.degree,
                    description     : this.createSchool.description,
                    start_time      : this.createSchool.start_time_edu,
                    end_time        : this.createSchool.end_time_edu,
                };
                this.isLoading = true;
                axios
                    .post('/account/add-account-education/', rawDataPost)
                    .then(data => {
                        axios
                            .get('/account/get-list-edu')
                            .then(data => {
                                $('#modal-create-school').modal('hide');
                                this.isLoading = false;
                                this.profile.accountEdu = data.data;
                            });
                        axios
                            .get('/account/get-list-profile-percentage')
                            .then(data => {
                                this.$emit('pass-data-to-paren', data.data);

                                // this.profile = data.data;
                            })

                    });
            }

        }
    }
</script>

<style scoped>

</style>