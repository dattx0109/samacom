<template>
    <div class="page-block m-b-30">
        <div class="display-flex-wrap m-b-6">
            <div class="m-text5 p-r-20">Thông tin cơ bản</div>
        </div>
        <small class="m-b-20">Hoàn thành mục <sup class="text-danger">*</sup> để có thể ứng tuyển thành công</small>
        <div class="page-col-4">
            <div class="form-group m-r-30 m-m-r-0">
                <label class="m-b-6">Họ và tên<sup>*</sup></label>
                <input type="text" class="form-control" placeholder="VD: Nguyen Van A"
                       v-model="profile['account']['name']">
                <span class="msg-alert" v-if="errors['name']">{{errors['name']}}</span>
            </div>
            <div class="form-group m-r-30 m-m-r-0" id="data_1">
                <label class="m-b-6">Ngày sinh<sup>*</sup></label>

                <div class="form-control-container date">
                    <date-pick v-model="profile['accountDetail']['date_of_birth']" :displayFormat="'DD-MM-YYYY'">
                    </date-pick>
                </div>
                <span class="msg-alert" v-if="errors['date_of_birth']">{{errors['date_of_birth']}}</span>
            </div>
            <div class="form-group m-r-30 m-m-r-0">
                <label class="m-b-6">Email<sup>*</sup></label>
                <div class="fixed-var">
                    {{profile['account']['email']}}
                </div>
            </div>
            <div class="form-group">
                <label class="m-b-6">Điện thoại<sup>*</sup></label>
                <div class="fixed-var">
                    {{profile['account']['phone']}}
                </div>
            </div>
            <div class="form-group m-r-30 m-m-r-0">
                <label>Link Facebook</label>
                <input type="text" placeholder="Link Facebook" class="form-control"
                       v-model="profile['accountDetail']['link_fb']"
                      >
            </div>
            <div class="form-group m-r-30 m-m-r-0">
                <label class="m-b-6">Giới tính</label>
                <div class="m-checkbox-container">
                    <label class="m-checkbox p-r-20">
                        <input  class="i-checks"
                        type="radio" value="1"
                                v-model="profile['accountDetail']['gender']"
                        >Nam<span
                            class="checkmark"></span>
                    </label>
                    <label class="m-checkbox p-r-20">
                        <input class="i-checks"
                        type="radio" value="2"
                        v-model="profile['accountDetail']['gender']"
                        >Nữ<span
                            class="checkmark"></span>
                    </label>
                    <label class="m-checkbox">
                        <input class="i-checks"
                        type="radio" value="3" v-model="profile['accountDetail']['gender']"
                        >
                        Khác<span
                            class="checkmark"></span>
                    </label>
<!--                    <span class="msg-alert"></span>-->
                </div>
            </div>
            <div class="form-group col-4-2">
                <label class="m-b-6">Tình trạng hôn nhân</label>
                <div class="m-checkbox-container">
                    <label class="m-checkbox p-r-20 m-m-b-10">
                        <input class="i-checks"
                        type="radio" value="1"
                        v-model="profile['accountDetail']['marital_status']"
                        >Độc
                        thân<span class="checkmark"></span>
                    </label>
                    <label class="m-checkbox p-r-20 m-m-b-10">
                        <input class="i-checks"
                        type="radio" value="2"
                        v-model="profile['accountDetail']['marital_status']"
                        >Đã
                        có gia đình<span class="checkmark"></span>
                    </label>
                    <label class="m-checkbox">
                        <input class="i-checks"
                        type="radio" value="3"
                        v-model="profile['accountDetail']['marital_status']"
                        >Đã
                        có con<span class="checkmark"></span>
                    </label>
<!--                    <span class="msg-alert"></span>-->
                </div>
            </div>
            <div class="form-group col-4-2 m-r-30 m-m-r-0">
                <label class="m-b-6">Địa chỉ<sup>*</sup></label>
                <input type="text" placeholder="Địa chỉ" class="form-control"
                       v-model="profile['accountDetail']['full_address']"
                >
                <span class="msg-alert" v-if="errors['full_address']">{{errors['full_address']}}</span>
            </div>
            <div class="form-group m-r-30 m-m-r-0">
                <label class="m-b-6">Tỉnh/Thành phố<sup>*</sup></label>
                <div class="select-wrapper">
                    <select id="province_id" v-model="profile['accountDetail']['province_id']" :click="changeProvince()"
                            data-placeholder="Chọn tỉnh thành..."
                            class="chosen-select primary-select" tabindex="2">
                        <option value="" selected>Chọn tỉnh thành</option>
                        <option v-for="item in province"  :value="item.id" data-placeholder="Chọn Tỉnh/Thành phố">{{ item.provinceName }}</option>
                    </select>
                </div>
                <span class="msg-alert" v-if="errors['province_id']">{{errors['province_id']}}</span>
            </div>
            <div class="form-group">
                <label class="m-b-6">Quận/Huyện<sup>*</sup></label>
                <div class="select-wrapper">
                    <select name="district_id" id="district_id"
                            data-placeholder="Chọn quận huyện..."
                            class="chosen-select primary-select"
                            tabindex="2"
                            v-model="profile['accountDetail']['district_id']">
                        <option value="" selected>Chọn quận huyện</option>
                        <option v-for="item in district"  :value="item.districtsId">{{ item.name }}</option>
                    </select>
                </div>
                <span class="msg-alert" v-if="errors['district_id']">{{errors['district_id']}}</span>
<!--                <span class="msg-alert"></span>-->
            </div>
        </div>
        <div class="btn-container display-flex-wrap jce">
            <div class="page-block__saved page-block__saved--active m-r-10" v-if="isLoading">
                <div class="icon-container"><i class="fa fa-check"></i></div>
                Đã lưu
            </div>
            <button class="button-primary btn-submit-step1" v-on:click="saveAccountDetail()">
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
        components: {
            DatePick
        },
        props:{
            profile : {
                type : Object
            },
        },
        data(){
            return {
                province : [],
                districtAll : [],
                district : [],
                isLoading : false,
                errors : {},
            }
        },
        mounted() {
            this.fetchAllProvince();
            // this.profile['account']['name'] = 'tienvm';
            // this.profile['accountDetail']['gender'] = 2;
        },
        methods: {
            fetchAllProvince() {
                axios
                    .get('/api/list-province')
                    .then(data => {
                        this.province = data.data[0];
                        this.districtAll = data.data[1];
                    })
            },
            getAllProfile(){

            },
            validateForm (){

                var requiredInput = 'Trường này không được để trống';
                var errors = {};

                if( ! this.profile['account']['name']){
                    errors.name = requiredInput;
                }

                if( ! this.profile['accountDetail']['date_of_birth']){
                    errors.date_of_birth = requiredInput;
                }
                if( ! this.profile['accountDetail']['district_id']){
                    errors['district_id'] = requiredInput;
                }

                if( ! this.profile['account']['email']){
                    errors['email']= requiredInput;
                }

                if( ! this.profile['accountDetail']['full_address']){
                    errors['full_address'] = requiredInput;
                }

                if( ! this.profile['accountDetail']['province_id']){
                    errors['province_id'] = requiredInput;
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
                    'date_of_birth' : this.profile['accountDetail']['date_of_birth'],
                    'district_id' : this.profile['accountDetail']['district_id'],
                    'email' : this.profile['account']['email'],
                    'full_address' : this.profile['accountDetail']['full_address'],
                    'gender' : this.profile['accountDetail']['gender'],
                    'link_fb' : this.profile['accountDetail']['link_fb'],
                    'marital_status' : this.profile['accountDetail']['marital_status'],
                    'name' : this.profile['account']['name'],
                    'province_id' : this.profile['accountDetail']['province_id'],
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

            changeProvince(){
                this.district = this.districtAll[this.profile['accountDetail']['province_id']];
            }
        }

    }
</script>
<style scoped>
</style>