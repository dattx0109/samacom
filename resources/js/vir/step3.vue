<template>
    <div class="va-step va-step-3 animated fadeInDown">
        <div class="page-container size1">
            <div class="button-secondary m-b-30" v-on:click="backStep()"><i class="icon-left-arrow m-r-10"></i>Quay lại</div>
            <div class="page-block m-b-40">
                <div class="s-text2 m-b-20">Thông tin cơ bản<sup>*</sup></div>
                <div class="form-group m-b-20">
                    <label>Họ và tên<sup>*</sup></label>
                    <div class="form-group__input">
                        <input value=""
                               placeholder="Họ và tên" type="text" class="form-control" name="full_name"
                               v-model="vir.full_name"
                               :disabled="isDisable.full_name"
                        >
                        <span class="text-danger notification_name pull-right text-under-input" v-if="errors['full_name']">{{ errors['full_name'] }}</span>
                    </div>
                </div>
                <div class="form-group m-b-20">
                    <label>Số điện thoại<sup>*</sup></label>
                    <div class="form-group__input">
                        <input type="number"
                               value=""
                               placeholder="Số điện thoại" class="form-control" name="number_phone"
                               v-model="vir.number_phone"
                               :disabled="isDisable.number_phone"
                        >
                        <span class="text-danger notification_phone pull-right text-under-input" v-if="errors['number_phone']">{{ errors['number_phone'] }}</span>
                    </div>
                </div>
                <div class="form-group m-b-30">
                    <label>Email<sup>*</sup></label>
                    <div class="form-group__input">
                        <input type="email"
                               value=""
                               placeholder="Email" class="form-control" name="email"
                               v-model="vir.email"
                               :disabled="isDisable.email"
                        >
                        <span class="text-danger notification_email pull-right text-under-input" v-if="errors['email']">{{ errors['email'] }}</span>
                    </div>
                </div>
                <!--            <div class="form-group m-b-30" id="va_step_dob">-->
                <!--                <label>Ngày sinh</label>-->
                <!--                <div class="form-group__input date input-group">-->
                <!--                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>-->
                <!--                    <input type="text"-->
                <!--                           value=""-->
                <!--                           placeholder="dd/mm/yyyy" class="form-control" name="date_of_birth"-->
                <!--                           v-model="vir.date_of_birth"-->
                <!--                    >-->
                <!--                    <span class="text-danger notification_email pull-right text-under-input"></span>-->
                <!--                </div>-->
                <!--            </div>-->
                <button class="button-primary w100 btn-step-3" v-on:click="btnSubmit()">
                    Hoàn thành
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "step3",
        data(){
            return {
                vir : {
                    full_name : '',
                    number_phone : '',
                    email : '',
                    // date_of_birth : ''
                },
                errors : {

                },
                isDisable: {
                    full_name : false,
                    number_phone : false,
                    email : false,
                }
            }
        },
        mounted(){
            let rawData = this.getRawDataToLocalStorage();
            this.setUserLogin();
            // this.removeRawDataLocalStorage();
        },
        methods: {
            setUserLogin(){
                if(userInfo){
                    this.vir.full_name = userInfo.name;
                    this.vir.number_phone = userInfo.phone;
                    this.vir.email = userInfo.email;

                    // set disable button
                    this.isDisable.full_name = true;
                    this.isDisable.number_phone = true;
                    this.isDisable.email = true;
                }
            },

            pushRawDataToLocalStorage(rawData){
                let rawDataStorage = {};

                if(this.getRawDataToLocalStorage()){
                    rawDataStorage = this.getRawDataToLocalStorage();
                }

                rawDataStorage['step3'] = rawData;
                localStorage.setItem('rawDataCallServer', JSON.stringify(rawDataStorage));
            },

            getRawDataToLocalStorage(){
                return JSON.parse(localStorage.getItem('rawDataCallServer'));
            },

            backStep(){
                this.$emit('pass-data-to-paren', 2);
            },
            btnSubmit(){
                let objectNullValidate = ! (Object.keys(this.validateForm()).length === 0 && this.validateForm().constructor === Object);

                if( objectNullValidate ){
                    this.errors = this.validateForm();
                    return;
                }

                this.pushRawDataToLocalStorage(this.vir);
                this.$emit('pass-data-to-paren', 5);
            },

            removeRawDataLocalStorage(){
                let rawDataStorage = {};

                if(this.getRawDataToLocalStorage()){
                    rawDataStorage = this.getRawDataToLocalStorage();
                    delete rawDataStorage['step3'];
                    localStorage.setItem('rawDataCallServer', JSON.stringify(rawDataStorage));
                }
            },

            validateForm (){

                var requiredInput = 'Trường này không được để trống';
                var errors = {};

                if( ! this.vir.full_name){
                    errors.full_name = requiredInput;
                }

                if( ! this.vir.number_phone){
                    errors.number_phone = requiredInput;
                }

                if( ! this.vir.email){
                    errors.email = requiredInput;
                }

                return errors;

            },
        }
    }
</script>

<style scoped>

</style>