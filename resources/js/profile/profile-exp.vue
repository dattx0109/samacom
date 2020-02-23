<template>
    <div class="page-block m-b-30">
        <div class="display-flex-wrap m-b-6">
            <div class="m-text5 p-r-20">Kinh nghiệm làm việc</div>
            <div class="page-block__saved page-block__saved--active" v-if="isLoading">
                <div class="icon-container"><i class="fa fa-check"></i></div>
                Đã lưu
            </div>
        </div>
        <small class="m-b-20">Hoàn thành mục <sup class="text-danger">*</sup> để có thể ứng tuyển thành công</small>

        <div class="wrapper wrapper-content animated fadeInRight" id="list_account_exp">
            <div class="item-box item-box--has-tool" id="account_exp_" v-for="item in profile['accountExp']">
                <div class="item-box__inner">
                    <div class="item-box__head m-b-15">
                        <span class="item-box__title s-text7 m-r-20">{{item['company']}}</span>
                        <span class="item-box__date s-text8">{{formatDate(item['start_time'])}} -> {{formatDate(item['end_time'])}}</span>
                    </div>
                    <div class="item-box__label s-text11 m-b-5">{{item['position']}} - {{item['field_work']}}</div>
                    <div class="item-box__label s-text11 m-b-5">{{item['reference']}}</div>
                    <div class="item-box__desc">{{item['description']}}</div>
                </div>
                <div class="box-tool">
                    <div class="box-tool__item updateExpAccount" v-on:click="eExp(item)">
                        <i class="icon-edit" ></i>
                    </div>
                    <div class="box-tool__item" v-on:click="deleteExp(item.id)">
                        <span v-if="!isLoading">
                                            <i class="icon-trash"></i>
                                        </span>

                        <span v-if="isLoading">
                                            <span class="spinner spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Loading...</span>

                    </div>
                </div>
            </div>
        </div>

        <div class="dotted-button dotted-button--full" v-on:click="clickCreateExp()"><i
                class="icon-add-2"></i>Thêm kinh nghiệm làm việc
        </div>

        <div id="modal-form-create-exp" class="modal fade modal-no-padding" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup-container p-b-25 m-p-20">
                            <div class="m-text3 m-b-20">Kinh nghiệm làm việc</div>
                            <form method="post" action="" id="form_creat_exp">
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Chức vụ<sup>*</sup></label>
                                    <div class="select-wrapper">
                                        <select id="position_exp" v-model="expPosition" data-placeholder="Chọn chức vụ ..." class="chosen-select primary-select" tabindex="2">
                                            <option value="" disabled selected>Chọn chức vụ </option>
                                            <option v-for="item in allRank"  :value="item.id">{{ item.name }}</option>
                                        </select>
                                    </div>
                                    <span class="msg-alert" v-if="errors['expPosition']">{{errors['expPosition']}}</span>
<!--                                    <div class="error-create-account-exp error_position" vshow-if="errors['expPosition']"> {{errors['expPosition']}}</div>-->
                                </div>
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Công ty<sup>*</sup></label>
                                    <input type="text" placeholder="Công ty" class="form-control" v-model="expCompany"
                                           id="company_exp">
                                    <span class="msg-alert" v-if="errors['expCompany']">{{errors['expCompany']}}</span>
<!--                                    <div class="error-create-account-exp error_company"></div>-->
                                </div>
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Ngành nghề<sup>*</sup></label>
                                    <div class="select-wrapper">
                                        <select id="field_work_exp" v-model="expFieldWork" data-placeholder="Chọn ngành nghề ..." class="chosen-select primary-select" tabindex="2">
                                            <option value="" disabled selected>Chọn ngành nghề </option>
                                            <option v-for="item in profile['fieldJobs']" :value="item.id">{{ item.name }}</option>
                                        </select>
                                    </div>
                                    <span class="msg-alert" v-if="errors['expFieldWork']">{{errors['expFieldWork']}}</span>
<!--                                    <div class="error-create-account-exp error_field_work"></div>-->
                                </div>
                                <div class="form-group form-group--half m-b-20 m-r-30" id="data_1">
                                    <label class="m-b-6">Thời gian bắt đầu<sup>*</sup></label>
                                    <div class="form-control-container date">
                                        <date-pick
                                                v-model="expStartTime"
                                                :displayFormat="'DD-MM-YYYY'"
                                        ></date-pick>
                                        <span class="msg-alert" v-if="errors['expStartTime']">{{errors['expStartTime']}}</span>
<!--                                        <input type="text" class="form-control" name="start_time" id="start_time_exp" v-model="expStartTime">-->
                                    </div>
                                    <div class="error-create-account-exp error_start_time"></div>
                                </div>
                                <div class="form-group form-group--half div_date_end m-b-20" v-if="isShowEndTime" >
                                    <label class="m-b-6">Thời gian kết thúc<sup>*</sup></label>
                                    <div class="form-control-container date">
                                        <date-pick
                                                v-model="expEndTime"
                                                :displayFormat="'DD-MM-YYYY'"
                                                :isDateDisabled="isFutureDate"
                                        ></date-pick>
                                        <span class="msg-alert" v-if="errors['expEndTime']">{{errors['expEndTime']}}</span>
<!--                                        <input type="text" class="form-control" name="end_time" id="end_time_exp" v-model="expEndTime">-->
                                    </div>
                                    <div class="error-create-account-exp error_end_time"></div>
                                </div>
<!--                                <div class="form-group m-b-20">-->
<!--                                    <label class="m-b-6 w100">Trạng thái làm việc</label>-->
<!--                                    <label class="s-text8" for="still_in_role">-->
<!--                                        <input type="checkbox" name="still_in_role" class="checkbox-input" id="still_in_role" v-on:click="clickStatusTimeNow()">-->
<!--                                        Đang làm việc-->
<!--                                    </label>-->
<!--                                </div>-->
                                <div class="form-group m-b-25">
                                    <label class="m-b-6">Mô tả công việc trước đây<sup>*</sup></label>
                                    <textarea type="text" placeholder="Mô tả công việc trước đây" class="form-control"
                                              name="description_exp" id="description_exp" v-model="descriptionJob"></textarea>
                                    <span class="text-danger notificaiton_phone pull-right text-under-input"></span>
                                    <span class="msg-alert" v-if="errors['descriptionJob']">{{errors['descriptionJob']}}</span>
<!--                                    <div class="error-create-account-exp error_description_exp"></div>-->
                                </div>
                                <div class="popup-btn-container tar">
                                    <div class="button-primary" id="btnExpAccount" v-on:click="saveExp()">
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


        <div id="modal-form-edit-exp" class="modal fade modal-no-padding" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup-container p-b-25 m-p-20">
                            <div class="m-text3 m-b-20">Kinh nghiệm làm việc</div>
                            <form method="post" action="" id="">
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Chức vụ<sup>*</sup></label>
                                    <div class="select-wrapper">
                                        <select  v-model="editExp.expPosition" data-placeholder="Chọn chức vụ ..." class="chosen-select primary-select" tabindex="2">
                                            <option value="" selected>Chọn chức vụ </option>
                                            <option v-for="item in allRank"  :value="item.id">{{ item.name }}</option>
                                        </select>
                                    </div>
                                    <span class="msg-alert" v-if="errors['e_expPosition']">{{errors['e_expPosition']}}</span>
<!--                                    <span class="msg-alert" v-if="errors['expPosition']">{{errors['expPosition']}}</span>-->
                                    <!--                                    <div class="error-create-account-exp error_position" vshow-if="errors['expPosition']"> {{errors['expPosition']}}</div>-->
                                </div>
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Công ty<sup>*</sup></label>
                                    <input type="text" placeholder="Công ty" class="form-control" v-model="editExp.expCompany">
                                    <span class="msg-alert" v-if="errors['e_expCompany']">{{errors['e_expCompany']}}</span>
<!--                                    <span class="msg-alert" v-if="errors['expCompany']">{{errors['expCompany']}}</span>-->
                                    <!--                                    <div class="error-create-account-exp error_company"></div>-->
                                </div>
                                <div class="form-group m-b-20">
                                    <label class="m-b-6">Ngành nghề<sup>*</sup></label>
                                    <div class="select-wrapper">
                                        <select  v-model="editExp.expFieldWork" data-placeholder="Chọn ngành nghề ..." class="chosen-select primary-select" tabindex="2">
                                            <option value="" selected>Chọn ngành nghề </option>
                                            <option v-for="item in profile['fieldJobs']" :value="item.id">{{ item.name }}</option>
                                        </select>
                                    </div>
                                    <span class="msg-alert" v-if="errors['e_expFieldWork']">{{errors['e_expFieldWork']}}</span>
<!--                                    <span class="msg-alert" v-if="errors['expFieldWork']">{{errors['expFieldWork']}}</span>-->
                                    <!--                                    <div class="error-create-account-exp error_field_work"></div>-->
                                </div>
                                <div class="form-group form-group--half m-b-20 m-r-30">
                                    <label class="m-b-6">Thời gian bắt đầu<sup>*</sup></label>
                                    <div class="form-control-container date">
                                        <date-pick
                                                v-model="editExp.expStartTime"
                                                :displayFormat="'DD-MM-YYYY'"
                                        ></date-pick>
<!--                                        <span class="msg-alert" v-if="errors['expStartTime']">{{errors['expStartTime']}}</span>-->
                                        <!--                                        <input type="text" class="form-control" name="start_time" id="start_time_exp" v-model="expStartTime">-->
                                    </div>
                                    <span class="msg-alert" v-if="errors['e_expStartTime']">{{errors['e_expStartTime']}}</span>
<!--                                    <div class="error-create-account-exp error_start_time"></div>-->
                                </div>
                                <div class="form-group form-group--half div_date_end m-b-20" >
                                    <label class="m-b-6">Thời gian kết thúc <sup>*</sup></label>
                                    <div class="form-control-container date">
                                        <date-pick
                                                v-model="editExp.expEndTime"
                                                :displayFormat="'DD-MM-YYYY'"
                                                :isDateDisabled="isFutureDateEdit"
                                        ></date-pick>
<!--                                        <span class="msg-alert" v-if="errors['expEndTime']">{{errors['expEndTime']}}</span>-->
                                        <!--                                        <input type="text" class="form-control" name="end_time" id="end_time_exp" v-model="expEndTime">-->
                                    </div>
                                    <span class="msg-alert" v-if="errors['e_expEndTime']">{{errors['e_expEndTime']}}</span>
<!--                                    <div class="error-create-account-exp error_end_time"></div>-->
                                </div>
<!--                                <div class="form-group m-b-20">-->
<!--                                    <label class="m-b-6 w100">Trạng thái làm việc</label>-->
<!--                                    <label class="s-text8" for="still_in_role">-->
<!--                                        <input type="checkbox" name="still_in_role" v-model="isShowEndTime || !editExp.expEndTime" class="checkbox-input"  v-on:click="clickStatusTimeNow()">-->
<!--                                        Đang làm việc-->
<!--                                    </label>-->
<!--                                </div>-->
                                <div class="form-group m-b-25">
                                    <label class="m-b-6">Mô tả công việc trước đây<sup>*</sup></label>
                                    <textarea type="text" placeholder="Mô tả công việc trước đây" class="form-control"
                                              name="description_exp"  v-model="editExp.descriptionJob"></textarea>
                                    <span class="msg-alert" v-if="errors['e_descriptionJob']">{{errors['e_descriptionJob']}}</span>
<!--                                    <span class="text-danger notificaiton_phone pull-right text-under-input"></span>-->
<!--                                    <span class="msg-alert" v-if="errors['descriptionJob']">{{errors['descriptionJob']}}</span>-->
                                    <!--                                    <div class="error-create-account-exp error_description_exp"></div>-->
                                </div>
                                <div class="popup-btn-container tar">
                                    <div class="button-primary" v-on:click="saveExpEdit()">
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
                allRank : [
                    {
                        'id' : 1,
                        'name' : 'Nhân viên'
                    },
                    {
                        'id' : 2,
                        'name' : 'Trưởng nhóm'
                    },
                    {
                        'id' : 3,
                        'name' : 'Phó phòng'
                    },
                    {
                        'id' : 4,
                        'name' : 'Trưởng phòng'
                    },
                    {
                        'id' : 5,
                        'name' : 'Thực tập sinh'
                    }
                ],
                expPosition : '',
                expCompany : '',
                expFieldWork : '',
                expStartTime : '',
                expEndTime : '',
                isTimeNow : false,
                descriptionJob : '',
                isShowEndTime : true,
                errors : {},
                editExp : {
                    expPosition : '',
                    expCompany : '',
                    expFieldWork : '',
                    expStartTime : '',
                    expEndTime : '',
                    isTimeNow : false,
                    descriptionJob : '',
                    isShowEndTime : false,
                    id : ''
                }
            }
        },
        mounted() {
        },

        methods: {
            formatDate(inputDate){
                if(inputDate == '1970-01-01'){
                    return 'Đang làm việc';
                }
                var p = inputDate.split(/\D/g)
                return [p[2],p[1],p[0] ].join("-")
            },
            eExp(item){
                this.editExp.expPosition = item.position;
                this.editExp.expCompany = item.company;
                this.editExp.descriptionJob = item.description;
                this.editExp.expEndTime = item.end_time;
                this.editExp.expFieldWork = item.field_work_id;
                this.editExp.expStartTime = item.start_time;
                this.editExp.id = item.id;

                if(this.editExp.expEndTime == this.buildDateTimeNow()){
                    this.isShowEndTime = true;
                }else {
                    this.isShowEndTime = false;
                }

                $('#modal-form-edit-exp').modal('show');
            },

            deleteExp(id){
                this.isLoading = true;
                axios
                    .post('/account/delete-exp/'+id)
                    .then(data => {

                        axios
                            .get('/account/get-list-exp')
                            .then(data => {
                                this.profile.accountExp = data.data;
                                this.isLoading = false;
                            });
                        axios
                            .get('/account/get-list-profile-percentage')
                            .then(data => {
                                this.$emit('pass-data-to-paren', data.data);
                            })

                    });
            },

            clickCreateExp(){
                this.resetFormEdit();
                $('#modal-form-create-exp').modal('show');
            },
            isFutureDate(date){
                let dateStart = new Date(this.expStartTime);
                return date < dateStart;
            },
            isFutureDateEdit(date){
                let dateStart = new Date(this.editExp.expStartTime);
                return date < dateStart;
            },

            isDateTimeNow(){
                let dateStart = new Date();
                return date > dateStart;
            },
            validateForm (){

                var requiredInput = 'Trường này không được để trống';
                var errors = {};

                if( ! this.expPosition){
                    errors.expPosition = requiredInput;
                }

                if( ! this.expCompany){
                    errors.expCompany = requiredInput;
                }
                if( ! this.expFieldWork){
                    errors['expFieldWork'] = requiredInput;
                }

                if( ! this.expStartTime){
                    errors['expStartTime']= requiredInput;
                }

                if( ! this.expEndTime && this.isShowEndTime){
                    errors['expEndTime'] = requiredInput;
                }

                if( ! this.descriptionJob){
                    errors['descriptionJob'] = requiredInput;
                }
                return errors;
            },

            validateEditForm (){

                var requiredInput = 'Trường này không được để trống';
                var errors = {};

                if( ! this.editExp.expPosition){
                    errors.e_expPosition = requiredInput;
                }

                if( ! this.editExp.expCompany){
                    errors.e_expCompany = requiredInput;
                }
                if( ! this.editExp.expFieldWork){
                    errors['e_expFieldWork'] = requiredInput;
                }

                if( ! this.editExp.expStartTime){
                    errors['e_expStartTime']= requiredInput;
                }

                if( ! this.editExp.expEndTime){
                    errors['e_expEndTime'] = requiredInput;
                }

                if( ! this.editExp.descriptionJob){
                    errors['e_descriptionJob'] = requiredInput;
                }
                return errors;
            },

            resetFormEdit(){
                this.expPosition = '';
                this.expCompany  =  '';
                this.expFieldWork  = '';
                this.expStartTime =  '';
                this.expEndTime = '';
                this.descriptionJob = '';
                this.isTimeNow = false;
                this.isShowEndTime = true;
                this.errors = {};
            },

            saveExpEdit(){
                let objectNullValidate = ! (Object.keys(this.validateEditForm()).length === 0 && this.validateEditForm().constructor === Object);

                if( objectNullValidate ){
                    this.errors = this.validateEditForm();
                    return;
                }

                let rawDataCreateExp = {
                    'position' : this.editExp.expPosition,
                    'company' : this.editExp.expCompany,
                    'field_work' : this.editExp.expFieldWork,
                    'start_time' : this.editExp.expStartTime,
                    'end_time' : this.editExp.expEndTime,
                    'description' : this.editExp.descriptionJob,
                    'id' : this.editExp.id
                };
                this.errors = {};
                this.isLoading = true;
                axios
                    .post('/account/update-exp/', rawDataCreateExp)
                    .then(data => {
                        axios
                            .get('/account/get-list-exp')
                            .then(data => {
                                this.profile.accountExp = data.data;
                                this.isLoading = false;
                                $('#modal-form-edit-exp').modal('hide');
                            });
                        axios
                            .get('/account/get-list-profile-percentage')
                            .then(data => {
                                this.$emit('pass-data-to-paren', data.data);
                                // this.profile = data.data;
                            })

                    });
            },

            saveExp(){

                let objectNullValidate = ! (Object.keys(this.validateForm()).length === 0 && this.validateForm().constructor === Object);

                if( objectNullValidate ){
                    this.errors = this.validateForm();
                    return;
                }

                let rawDataCreateExp = {
                    'position' : this.expPosition,
                    'company' : this.expCompany,
                    'field_work' : this.expFieldWork,
                    'start_time' : this.expStartTime,
                    'end_time' : this.expEndTime,
                    'description' : this.descriptionJob,
                };
                this.errors = {};
                this.isLoading = true;
                axios
                    .post('/account/add-exp', rawDataCreateExp)
                    .then(data => {
                        $('#modal-form-create-exp').modal('hide');
                        axios
                            .get('/account/get-list-exp')
                            .then(data => {
                                this.isLoading = false;
                                this.profile.accountExp = data.data;
                                // this.isLoading = false;
                                // this.profile = data.data;
                            })
                        axios
                            .get('/account/get-list-profile-percentage')
                            .then(data => {
                                // this.isLoading = false;
                                // this.profile = data.data;
                                this.$emit('pass-data-to-paren', data.data);
                            })

                     });
            },
            clickStatusTimeNow(){

                this.editExp.expEndTime = this.buildDateTimeNow();
                this.isShowEndTime = ! this.isShowEndTime;

            },
            buildDateTimeNow(){
                let date         = new Date().getDate();
                let month       = new Date().getMonth()+1;
                let year        = new Date().getFullYear();
                return year + '-' + month + '-' + date ;
            }

        }
    }
</script>

<style scoped>

</style>