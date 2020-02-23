<template>
    <div class="page-block m-b-30">
        <div class="display-flex-wrap m-b-6">
            <div class="m-text5 p-r-20">Mục tiêu nghề nghiệp</div>
        </div>
        <small class="m-b-20">Hoàn thành mục <sup class="text-danger">*</sup> để có thể ứng tuyển thành công</small>
        <div class="form-group">
            <label class="m-b-6">Mục tiêu nghề nghiệp<sup>*</sup></label>
            <textarea type="text" placeholder="Mục tiêu nghề nghiệp" class="form-control"
                      v-model="profile['accountDetail']['career_goals']"
            >
                {{profile['accountDetail']['career_goals']}}
            </textarea>
            <span class="msg-alert" v-if="errors['career_goals']">{{errors['career_goals']}}</span>
        </div>
        <div class="form-group">
            <label class="m-b-6">Điểm mạnh, điểm yếu</label>
            <textarea type="text" placeholder="Điểm mạnh, điểm yếu" class="form-control"
                      v-model="profile['accountDetail']['strengths_weaknesses']"
            >
                {{profile['accountDetail']['strengths_weaknesses']}}
            </textarea>
        </div>
        <div class="form-group m-b-25">
            <label class="m-b-6">Hoạt động ngoại khóa</label>
            <textarea type="text" placeholder="Hoạt động ngoại khóa" class="form-control"
                      v-model="profile['accountDetail']['extracurricular_activities']"
            >
                {{profile['accountDetail']['extracurricular_activities']}}
            </textarea>
        </div>
        <div class="btn-container display-flex-wrap jce">
            <div class="page-block__saved page-block__saved--active m-r-10" v-if="isLoading">
                <div class="icon-container"><i class="fa fa-check"></i></div>
                Đã lưu
            </div>
            <button class="button-primary btn-submit-step2" v-on:click="saveAccountDetail()" type="submit">
                <span v-if="!isLoading">
                    Lưu lại
                </span>

                <span v-if="isLoading">
                    <span class="spinner spinner-border spinner-border-sm" role="status" aria-hidden="true">
                    </span>Loading...
                </span>
            </button>
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
                errors : {}
            }
        },
        mounted() {
        },
        methods: {
            validateForm (){

                var requiredInput = 'Trường này không được để trống';
                var errors = {};

                if( ! this.profile['accountDetail']['career_goals']){
                    errors.career_goals = requiredInput;
                }

                return errors;

            },
            saveAccountDetail(){
                let objectNullValidate = ! (Object.keys(this.validateForm()).length === 0 && this.validateForm().constructor === Object);

                if( objectNullValidate ){
                    this.errors = this.validateForm();
                    return;
                }
                this.errors = {};

                let rawData = {
                    'extracurricular_activities' : this.profile['accountDetail']['extracurricular_activities'],
                    'strengths_weaknesses' : this.profile['accountDetail']['strengths_weaknesses'],
                    'career_goals' : this.profile['accountDetail']['career_goals'],
                };
                this.isLoading =  true;
                axios
                    .post('/api/update-account-detail', rawData)
                    .then(data => {
                        axios
                            .get('/account/get-list-profile-percentage')
                            .then(data => {
                                this.isLoading = false;
                                this.$emit('pass-data-to-paren', data.data);
                                // this.profile = data.data;
                            })
                        this.isLoading = false;
                    })
            },

        }
    }
</script>