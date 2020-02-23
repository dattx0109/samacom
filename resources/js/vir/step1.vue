<template>
    <div class="va-step va-step-1 animated ">
        <div class="page-block m-b-30 p-b-20">
            <div class="choose-tags" id="va_step_workfield">
                <div class="s-text2 m-b-6">Ngành nghề mà bạn quan tâm?</div>
                <div class="s-text8 m-b-20">Được chọn tối đa 3 ngành nghề</div>
                <div class="choose-tags__block">
                    <div class="choose-tags__item" v-for="item in filedJob">
                        <label :class="vir.filed.includes(item.id) ? 'is-checked' : ''" v-bind:for="'workfield-' + item.id">
                            {{item.name}}
                            <input type="checkbox" checked="checked" class="custom-control-input"
                                   :value="item.id"
                                   :id="'workfield-' + item.id"
                                   v-model="vir.filed"
                                   :disabled="vir.filed.length > 2 && vir.filed.indexOf(item.id) === -1"
                            >
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-block m-b-30 p-b-10">
            <div class="s-text2 m-b-20">Bạn ở khu vực nào?</div>
            <div class="grid-form grid-form--no-fix">
                <div class="grid-form__item">
                    <label>Tỉnh/Thành phố <sup class="text-danger">*</sup></label>
                    <div class="select-wrapper">
                        <select id="province_id" v-model="vir.province" :click="changeProvince()"
                                data-placeholder="Chọn tỉnh thành..."
                                class="chosen-select primary-select" tabindex="2">
                            <option value="" selected>Chọn tỉnh thành</option>
                            <option v-for="item in province"  :value="item.id" data-placeholder="Chọn Tỉnh/Thành phố">{{ item.provinceName }}</option>
                        </select>
                        <span class="text-danger notification_email text-under-input" v-if="errors['province']">{{ errors['province'] }}</span>
<!--                        <select name="province" data-placeholder="Tỉnh/Thành Phố" class="primary-select" id="provinceValue">-->
<!--                            <option value="-1">Tỉnh/Thành Phố</option>-->
<!--                            <option value=""></option>-->
<!--                        </select>-->
                    </div>
                </div>
                <div class="grid-form__item">
                    <label>Quận/Huyện</label>
                    <div class="select-wrapper">
                        <select name="district_id" id="district_id"
                                data-placeholder="Chọn quận huyện..."
                                class="chosen-select primary-select"
                                tabindex="2"
                                v-model="vir.district"

                        >
                            <option value="" selected>Chọn quận huyện</option>
                            <option v-for="item in district"  :value="item.districtsId">{{ item.name }}</option>
                        </select>
<!--                        <select name="districts" data-placeholder="Quận/Huyện" class="primary-select">-->
<!--                            <option value="-1">Quận/Huyện</option>-->
<!--                        </select>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="page-block m-b-30 p-b-20">
            <div class="choose-tags" id="va_step_salefield">
                <div class="s-text2 m-b-6">Vị trí mà bạn thấy phù hợp?</div>
                <div class="s-text8 m-b-20">Được chọn tối đa 2 vị trí</div>
                <div class="choose-tags__block">
                    <div class="choose-tags__item" v-for="item in groupSale">
                        <label :class="vir.position_wish.includes(item.id) ? 'is-checked' : ''"  v-bind:for="'position-' + item.id">
                            {{item.name}}
                            <input type="checkbox" class="custom-control-input"
                                   value="" name="tag_id"
                                   :value="item.id"
                                   :id="'position-' + item.id"
                                   v-model="vir.position_wish"
                                   @change="changeInputPostition()"
                                   :disabled="vir.position_wish.length > 1 && vir.position_wish.indexOf(item.id) === -1"
                            >
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-container tar m-b-40">
            <div class="button-primary btn-step-1 tac" v-on:click="nextStep1()">Tiếp tục<i class="icon-right-arrow m-l-10"></i></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "step1",
        props:{
            virdata : {
                type : Object
            }
        },
        data(){
            return {
                filedJob : [],
                vir : {
                    filed : [],
                    province : '',
                    district : '',
                    position_wish : []
                },
                province : [],
                districtAll : [],
                district : [],
                groupSale : [
                    {
                        id : 1,
                        name : 'Sale Admin'
                    },
                    {
                        id : 2,
                        name : 'Telesale'
                    },
                    {
                        id : 3,
                        name : 'Sale tư vấn'
                    },
                    {
                        id : 4,
                        name : 'Sale thị trường'
                    },
                    {
                        id : 5,
                        name : 'Sale bán hàng'
                    },
                    {
                        id : 6,
                        name : 'Sale online'
                    },
                ],
                errors: {

                }
            }
        },
        mounted() {
            // this.removeAllRawDataLocalStorage();
            this.fetchAllFieldJob();
            this.fetchAllProvince();
            // this.profile['account']['name'] = 'tienvm';
            // this.profile['accountDetail']['gender'] = 2;
        },
        methods: {
            changeInputPostition(){
            },
            nextStep1(){
                let objectNullValidate = ! (Object.keys(this.validateForm()).length === 0 && this.validateForm().constructor === Object);

                if( objectNullValidate ){
                    this.errors = this.validateForm();
                    return;
                }

                this.pushRawDataToLocalStorage(this.vir);
                this.$emit('pass-data-to-paren', 2);
            },

            validateForm (){
                var requiredInput = 'Trường này không được để trống';
                var errors = {};

                if( ! this.vir.province){
                    errors.province = requiredInput;
                }

                return errors;

            },


            fetchAllFieldJob(){
                axios
                    .get('/account/get-all-filed-job')
                    .then(data => {
                        this.filedJob = data.data;
                        // this.profile.accountEdu = data.data;
                    })
            },
            fetchAllProvince() {
                axios
                    .get('/api/list-province')
                    .then(data => {
                        this.province = data.data[0];
                        this.districtAll = data.data[1];
                    })
            },

            pushRawDataToLocalStorage(rawData){
                let rawDataStorage = {};

                if(this.getRawDataToLocalStorage()){
                    rawDataStorage = this.getRawDataToLocalStorage();
                }

                rawDataStorage['step1'] = rawData;
                localStorage.setItem('rawDataCallServer', JSON.stringify(rawDataStorage));
            },

            getRawDataToLocalStorage(){
                return JSON.parse(localStorage.getItem('rawDataCallServer'));
            },


            removeAllRawDataLocalStorage(){
                let rawDataStorage = {};

                if(this.getRawDataToLocalStorage()){
                    rawDataStorage = this.getRawDataToLocalStorage();
                    delete rawDataStorage['step2'];
                    delete rawDataStorage['step3'];
                    delete rawDataStorage['step1'];
                    localStorage.setItem('rawDataCallServer', JSON.stringify(rawDataStorage));
                }
            },

            changeProvince(){
                this.district = this.districtAll[this.vir.province];
            }

        }
    }
</script>

<style scoped>

</style>