<template>
    <div class="page-block m-b-30">
        <div class="display-flex-wrap m-b-20">
            <div class="m-text5 p-r-20">Kỹ năng</div>
            <div class="page-block__saved page-block__saved--active" v-if="isLoading">
                <div class="icon-container"><i class="fa fa-check"></i></div>
                Đã lưu
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight m-p-r-60">
            <div class="page-point m-b-20" id="list_account_skill">
                <div class="page-point__item page-point__item--delete m-b-12" id="account_skill_" v-for="item in profile['accSkill']">
                    <div class="page-point__title s-text9 m-b-7"> {{ item['name']}}</div>
                    <div class="page-point__point s-text9">
                        {{item['point']}}%
                    </div>
                    <div class="page-point__block">
                        <div class="page-point__progress"
                             v-bind:data-width="item.point"></div>
                    </div>
                    <div class="page-point__delete--hover">
                        <div class="page-point__delete" v-on:click="deleteSkill(item.id)"><i class="icon-trash"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <a v-on:click="createSkill()" class="dotted-button dotted-button--full"><i
                class="icon-add-2"></i>Thêm kỹ năng
        </a>
        <div id="modal-form_ky_nang" class="modal fade modal-no-padding" aria-hidden="true">
            <div class="modal-dialog modal-dialog--center">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup-container p-b-25 m-p-20">
                            <div class="m-text3 m-b-20">Kỹ năng ứng viên</div>
                            <form method="post" action="" class="" id="form_create_skill">
                                <div class="form-group m-b-20">
                                    <label>Kỹ năng<sup>*</sup></label>
                                    <div class="select-wrapper">
                                        <select id="skill" name="skill" data-placeholder="Chọn kỹ năng" class="chosen-select primary-select" tabindex="2" v-model="skill.skill_id">
                                            <option value="" disabled selected>Chọn kỹ năng</option>
                                            <option v-for="item in profile['skill']"  :value="item.id">{{ item.value }}</option>
                                        </select>
                                    </div>
                                    <span class="msg-alert" v-if="errors['skill_id']">{{errors['skill_id']}}</span>
<!--                                    <div class="error-create-skill error_skill"></div>-->
                                </div>
                                <div class="form-group m-b-25">
                                    <label>Điểm kỹ năng<sup>*</sup></label>
                                    <input v-model="skill.point" type="number" min="0" max="100" placeholder="Điểm kỹ năng từ 1 đến 100" class="form-control" id="point" name="point">
                                    <span class="msg-alert" v-if="errors['point']">{{errors['point']}}</span>
                                    <div class="error-create-skill error_point"></div>
                                </div>
                                <div class="popup-btn-container tar">
                                    <div class="button-primary" id="btnSkill" v-on:click="saveSkill()">
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
        props:{
            profile : {
                type : Object
            }
        },
        data(){
            return {
                isLoading : false,
                skill : {
                    'skill_id' : '',
                    'point' : ''
                },
                errors : {

                }
            }
        },
        mounted() {
        },
        methods: {
            createSkill(){
                this.resetInputAfterDone();
                $('#modal-form_ky_nang').modal('show');
            },

            resetInputAfterDone(){
                this.skill.skill_id = '';
                this.skill.point =  '';
                this.errors = {};
            },

            validateForm (){

                var requiredInput = 'Trường này không được để trống';
                var maxInput = 'Giá trị không hợp lệ';
                var errors = {};

                if( ! this.skill.skill_id){
                    errors.skill_id = requiredInput;
                }

                if( ! this.skill.point){
                    errors.point = requiredInput;
                }

                if(this.skill.point > 100 || this.skill.point < 1){
                    errors.point = maxInput;
                }

                return errors;
            },
            saveSkill(){
                let objectNullValidate = ! (Object.keys(this.validateForm()).length === 0 && this.validateForm().constructor === Object);

                if( objectNullValidate ){
                    this.errors = this.validateForm();
                    return;
                }

                let rawDataInsert =  this.skill;

                this.isLoading =  true;
                axios
                    .post('/account/add-account-skill', rawDataInsert)
                    .then(data => {
                        axios
                            .get('/account/get-list-profile-percentage')
                            .then(data => {
                                $('#modal-form_ky_nang').modal('hide');
                                axios
                                    .get('/account/get-list-account-skill')
                                    .then(data => {
                                        this.isLoading = false;
                                        this.profile.accSkill = data.data;
                                    })
                                // this.profile = data.data;

                                this.$emit('pass-data-to-paren', data.data);
                            })
                    })
                    .catch(error => {
                        this.isLoading = false;
                        this.errors = {skill_id : 'Kỹ năng đã tồn tại'};
                        return;
                    });
            },
            deleteSkill(id){
                this.isLoading = true;
                axios
                    .post('/account/delete-account-skill/'+id)
                    .then(data => {
                        axios
                            .get('/account/get-list-account-skill')
                            .then(data => {
                                this.isLoading = false;
                                this.profile.accSkill = data.data;
                            })
                    });
            }


        }
    }
</script>
