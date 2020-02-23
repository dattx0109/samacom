<template>
    <div class="matching-job-result animated fadeInDown">
        <div class="button-secondary m-b-30 m-l-15" v-on:click="backStep()"><i class="icon-left-arrow m-r-10"></i>Quay lại</div>
        <div class="m-text6 m-b-30 tac"  v-if="listJob.length > 0">Chúng tôi tìm thấy 3 công việc phù hợp nhất với bạn</div>
        <div class="m-text6 m-b-30 tac"  v-if="listJob.length == 0">Chúng tôi không tìm thấy công việc phù hợp với bạn</div>
        <div class="matching-job p-b-40" id="root-job">
            <div class="col-md-4 col-sm-6 col-xs-12" v-for="item in listJob">
                <div class="matching-job__item m-b-30" id="job-detail-1">
                    <div class="matching-job__img">
                        <img v-bind:src="'https://file.samacom.com.vn/userfiles' + item.logo">
                    </div>
                    <div class="matching-job__info">
                        <div class="matching-job__text">
                            <div class="s-text5 dJobTitle">{{ item.companyName }}</div>
                        </div>
                        <div class="matching-job__text">
                            <div class="page-tag page-tag--red">
                                <span v-if="item.job_type == 1">Toàn thời gian</span>
                                <span v-if="item.job_type == 2">Bán thời gian</span>
                                <span v-if="item.job_type == 3">Hợp đồng</span>
                                <span v-if="item.job_type == 4">Thời vụ</span>
                            </div>
                        </div>
                        <div class="matching-job__text">
                            <div class="s-text12 dCompanyName">{{ item.title }}</div>
                        </div>
                        <div class="matching-job__text dSalaryDetail"> {{formatPrice(item.income_min)}} VND - {{formatPrice(item.income_max)}} VND</div>
                        <div class="matching-job__text">Không yêu cầu bằng cấp</div>
                        <div class="matching-job__text">
                            <span v-if="item.gender == 1">Nam</span>
                            <span v-if="item.gender == 2">Nữ</span>
                            <span v-if="item.gender == 3">Khác</span>
                        </div>
                        <div class="matching-job__text dProvince">{{item.provinceName}}</div>
                        <div class="matching-job__text dDistrict">{{item.districtName}}</div>
                    </div>
                    <div class="matching-job__link">
                        <a v-bind:href="'/cong-viec/'+ item.id" class="button-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "stepLast",
        props:{
            virdata : {
                type : Object
            }
        },
        data() {
            return {
                listJob : []
            }
        },
        mounted(){
            // localStorage.clear();
            let rawData = this.getRawDataToLocalStorage();
            this.fetchAllDataJob();
            this.updateDesire();
            this.updateSkill();
            this.updateCharactor();

        },
        methods: {
            btnSubmit(){

            },
            formatPrice(value) {
                let val = (value/1).toFixed(0).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            },
            backStep(){
                this.$emit('pass-data-to-paren', 3);
            },
            getRawDataToLocalStorage(){
                return JSON.parse(localStorage.getItem('rawDataCallServer'));
            },

            updateAllRawDataToProfileUser(){

            },

            updateCharactor(){
                var rawDataLocalStorage = this.getRawDataToLocalStorage();

                if (typeof(rawDataLocalStorage['step2']['character']) != "undefined" && rawDataLocalStorage['step2']['character'].length > 0){
                    var rawData = [];
                    rawDataLocalStorage['step2']['character'].forEach(function (item) {
                       rawData.push({
                           name : 'Can than',
                           id : item
                       })
                    });
                    axios
                        .post('/api/update-account-character', [rawData])
                        .then(response => {

                        }).catch(err => {
                    })

                }
            },

            updateSkill(){
                var rawDataLocalStorage = this.getRawDataToLocalStorage();

                if (typeof(rawDataLocalStorage['step2']['skill']) != "undefined" && rawDataLocalStorage['step2']['skill'].length > 0){
                    rawDataLocalStorage['step2']['skill'].forEach(function (item) {
                        let dataPost = {
                            'skill_id' : item,
                            'point' : 50
                        };
                        axios
                            .post('/account/add-account-skill', dataPost)
                            .then(data => {
                            })
                            .catch(error => {
                                this.isLoading = false;
                                this.errors = {skill_id : 'Kỹ năng đã tồn tại'};
                                return;
                            });
                    })
                }

            },

            updateDesire(){
                let rawDataLocalStorage = this.getRawDataToLocalStorage();

                let rawData = {
                    // filed_work_wish : this.profile['accountWish']['filed_work_wish'],
                    // position_wish : this.profile['accountWish']['position_wish'],
                    // - job_type_wish : this.profile['accountWish']['job_type_wish'],
                    // - salary_wish : this.profile['accountWish']['salary_wish'],
                    // province_id : this.profile['accountWish']['province_id'],
                    // district_id : this.profile['accountWish']['district_id'],

                    //  - current_priority : this.profile['accountWish']['current_priority'],
                };

                if (typeof(rawDataLocalStorage['step1']['province']) != "undefined"){
                    rawData['province_id'] = rawDataLocalStorage['step1']['province'];
                }

                if (typeof(rawDataLocalStorage['step2']['env']) != "undefined" && rawDataLocalStorage['step2']['env'].length > 0){
                    rawData['current_priority'] = rawDataLocalStorage['step2']['env'][0];
                }

                if (typeof(rawDataLocalStorage['step1']['district']) != "undefined"){
                    rawData['district_id'] = rawDataLocalStorage['step1']['district'];
                }

                if (typeof(rawDataLocalStorage['step1']['position_wish']) != "undefined" && rawDataLocalStorage['step1']['position_wish'].length > 0){
                    rawData['position_wish'] = rawDataLocalStorage['step1']['position_wish'][0];
                }

                if (typeof(rawDataLocalStorage['step1']['filed']) != "undefined" && rawDataLocalStorage['step1']['filed'].length > 0){
                    rawData['filed_work_wish'] = rawDataLocalStorage['step1']['filed'][0];
                }


                axios
                    .post('/account/add-account-wish', rawData)
                    .then(data => {

                    })
            },


            fetchAllDataJob(){
                let rawDataLocalStorage = this.getRawDataToLocalStorage();
                let rawData = {
                    data : {
                        province_id : rawDataLocalStorage['step1']['province'],
                        name : '',
                        phone : '',
                        email : '',
                        // date_of_birth : '',
                        districts : rawDataLocalStorage['step1']['district'],
                        skill_id : rawDataLocalStorage['step1']['skill'],
                        tag_id : rawDataLocalStorage['step1']['position_wish'],
                        character_id : rawDataLocalStorage['step2']['character'],
                        base_salary_min : rawDataLocalStorage['step2']['baseSalaryMin'],
                        base_salary_max : rawDataLocalStorage['step2']['baseSalaryMax'],
                        income_min : rawDataLocalStorage['step2']['inComeMax'],
                        income_max : rawDataLocalStorage['step2']['inComeMin'],
                    }
                };
                axios
                    .post('api/virtual-assistant/get-job', rawData)
                    .then(data => {
                        this.listJob = data.data;
                    })
            }
        }
    }
</script>

<style scoped>

</style>