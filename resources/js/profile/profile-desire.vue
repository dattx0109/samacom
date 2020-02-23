<template>
    <div class="page-block m-b-30">
        <div class="display-flex-wrap m-b-20">
            <div class="m-text5 p-r-20">Mong muốn</div>
        </div>
            <div class="page-col-4">
                <div class="form-group m-r-30 m-m-r-0">
                    <label class="m-b-6">Ngành nghề<sup>*</sup></label>
                    <div class="select-wrapper">
                        <select id="filed_work_wish" name="filed_work_wish" v-model="desire.filed_work_wish"
                                data-placeholder="Chọn chức vụ..."
                                class="chosen-select primary-select" tabindex="2">
                            <option value="null" disabled selected>Chọn lĩnh vực</option>
                            <option v-for="item in profile['fieldJobs']"  :value="item.id">{{ item.name }}</option>
                        </select>
                    </div>
                    <span class="msg-alert"></span>
                </div>
                <div class="form-group m-r-30 m-m-r-0">
                    <label class="m-b-6">Vị trí:</label>
                    <div class="select-wrapper">
                        <select name="position_wish" data-placeholder="Chọn vị trí..."
                                class="chosen-select primary-select" tabindex="2" v-model="desire.position_wish">
                            <option value="null" disabled selected>Chọn vị trí</option>
                            <option v-for="item in groupSale"  :value="item.id">{{ item.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group m-r-30 m-m-r-0">
                    <label class="m-b-6">Loại hình công việc:</label>
                    <div class="select-wrapper">
                        <select name="job_type_wish" data-placeholder="Loại hình công việc..."
                                class="chosen-select primary-select" tabindex="2" v-model="desire.job_type_wish">
                            <option value="null" disabled selected>Chọn loại hình</option>
                            <option v-for="item in jobType"  :value="item.id">{{ item.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="m-b-6">Mức lương:</label>
                    <div class="select-wrapper">
                        <select name="salary_wish" data-placeholder="Mức lương.."
                                class="chosen-select primary-select" tabindex="2" v-model="desire.salary_wish">
                            <option value="null" disabled selected>Chọn mức lương</option>
                            <option v-for="item in jobSalary"  :value="item.id">{{ item.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group m-r-30 m-m-r-0">
                    <label class="m-b-6">Thành phố/ Tỉnh:</label>
                    <div class="select-wrapper">
                        <select name="province_id" id="province_id_wish" v-model="desire.province_id"
                                data-placeholder="Chọn tỉnh thành..."
                                class="chosen-select primary-select" tabindex="2" :click="changeProvince()">
                            <option value="null" disabled selected>Chọn Thành phố/Tỉnh</option>
                            <option v-for="item in province"  :value="item.id">{{ item.provinceName }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group m-r-30 m-m-r-0">
                    <label class="m-b-6">Quận/Huyện:</label>
                    <div class="select-wrapper">
                        <select name="district_id" id="district_id_wish" v-model="desire.district_id"
                                data-placeholder="Chọn quận huyện..."
                                class="chosen-select primary-select"
                                tabindex="2">
                            <option value="null" disabled selected>Chọn Quận/Huyện</option>
                            <option v-for="item in district"  :value="item.districtsId">{{ item.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group m-r-30 m-m-r-0">
                    <label class="m-b-6">Điều mong muốn:</label>
                    <div class="select-wrapper">
                        <select name="current_priority" data-placeholder="Điều mong muốn ..." v-model="desire.current_priority"
                                class="chosen-select primary-select" tabindex="2">
                            <option value="null" disabled selected>Chọn mong muốn</option>
                            <option v-for="item in priority"  :value="item.id">{{ item.name }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="btn-container display-flex-wrap jce">
                <div class="page-block__saved page-block__saved--active m-r-10" v-if="isLoading">
                    <div class="icon-container"><i class="fa fa-check"></i></div>
                    Đã lưu
                </div>
                <button class="button-primary" type="submit" v-on:click="saveDesire()">
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
                province : [],
                districtAll : [],
                district : [],
                isLoading : false,
                desire : {
                    filed_work_wish : this.profile['accountWish']['filed_work_wish'],
                    position_wish : this.profile['accountWish']['position_wish'],
                    job_type_wish : this.profile['accountWish']['job_type_wish'],
                    salary_wish : this.profile['accountWish']['salary_wish'],
                    province_id : this.profile['accountWish']['province_id'],
                    district_id : this.profile['accountWish']['district_id'],
                    current_priority : this.profile['accountWish']['current_priority'],
                },
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
                jobType : [
                    {
                        id : 1,
                        name : 'Toàn thời gian'
                    },
                    {
                        id : 2,
                        name : 'Bán thời gian'
                    },
                    {
                        id : 3,
                        name : 'Hợp đồng'
                    },
                    {
                        id : 4,
                        name : 'Mùa vụ'
                    },
                ],
                jobSalary : [
                    {
                        id : 1,
                        name : 'Dưới 6,000,000 vnđ'
                    },
                    {
                        id : 2,
                        name : '6,000,000 vnđ - 8,000,000 vnđ'
                    },
                    {
                        id : 3,
                        name : '8,000,000 vnđ - 10,000,000 vnđ'
                    },
                    {
                        id : 4,
                        name : '10,000,000 vnđ - 15,000,000 vnđ'
                    },
                    {
                        id : 5,
                        name : '15,000,000 vnđ - 20,000,000 vnđ'
                    },
                    {
                        id : 6,
                        name : '20,000,000 vnđ - 30,000,000 vnđ'
                    },
                    {
                        id : 7,
                        name : '30,000,000 vnđ - 50,000,000 vnđ'
                    },
                    {
                        id : 8,
                        name : '50,000,000 vnđ - 100,000,000 vnđ'
                    },
                    {
                        id : 9,
                        name : 'Trên 100,000,000 vnđ'
                    },
                ],
                priority : [
                    {
                        id : 1,
                        name : 'Thu nhập'
                    },
                    {
                        id : 2,
                        name : 'Kiến thức'
                    },
                    {
                        id : 3,
                        name : 'Môi trường'
                    },
                    {
                        id : 4,
                        name : 'Cơ hội thăng tiến'
                    },
                ],
                errors : {}
            }
        },
        methods:{
            validateForm(){
                var requiredInput = 'Trường này không được để trống';
                var errors = {};

                if( ! this.desire['filed_work_wish']){
                    errors.filed_work_wish = requiredInput;
                }

                return errors;
            },
            changeProvince(){
                this.district = this.districtAll[this.desire['province_id']];
            },
            fetchAllProvince() {
                axios
                    .get('/api/list-province')
                    .then(data => {
                        this.province = data.data[0];
                        this.districtAll = data.data[1];
                    })
            },
            saveDesire(){
                let objectNullValidate = ! (Object.keys(this.validateForm()).length === 0 && this.validateForm().constructor === Object);

                if( objectNullValidate ){
                    this.errors = this.validateForm();
                    return;
                }
                this.errors = {};
                let rawData = this.desire;
                this.isLoading =  true;
                axios
                    .post('/account/add-account-wish', rawData)
                    .then(data => {
                        axios
                            .get('/account/get-list-profile-percentage')
                            .then(data => {
                                this.$emit('pass-data-to-paren', data.data);
                            });
                        this.isLoading = false;
                    })

            }
        },
        mounted() {
            this.fetchAllProvince();
        },
    }
</script>

<style scoped>

</style>
