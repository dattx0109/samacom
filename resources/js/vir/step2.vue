<template>
    <div class="va-step va-step-2 animated fadeInDown">
        <div class="button-secondary m-b-30" v-on:click="backStep()"><i class="icon-left-arrow m-r-10"></i>Quay lại</div>
        <div class="page-block m-b-30 p-b-20">
            <div class="choose-tags" id="va_step_concern">
                <div class="s-text2 m-b-6">Hiện tại bạn quan tâm đến điều gì nhất?</div>
                <div class="s-text8 m-b-20">Được chọn 1 điều quan tâm</div>
                <div class="choose-tags__block">
                    <div class="choose-tags__item" v-for="item in envCompany">
                        <label :class="vir.env.includes(item.id) ? 'is-checked' : ''" v-bind:for="'concern-' + item.id">
                            {{item.name}}
                            <input type="checkbox" class="custom-control-input"
                                   :value="item.id"
                                   :id="'concern-' + item.id"
                                   v-model="vir.env"
                                   :disabled="vir.env.length > 0 && vir.env.indexOf(item.id) === -1"
                            >
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-block m-b-30">
            <div class="choose-tags">
                <div class="s-text2 m-b-20">Bạn đã có kinh nghiệm chưa?</div>
                <div class="m-checkbox-container">
                    <div class="m-checkbox__item">
                        <label class="m-checkbox m-b-18">
                            <input type="radio" name="exp" value="1" id="exp_1" checked="checked" class="radio-select-input">Đã có<span class="checkmark"></span>
                        </label>
                        <div class="grid-form">
                            <div class="grid-form__item select-wrapper">
                                <select name="exp_sale" data-placeholder="Telesale" class="primary-select">
                                    <option value="-1">Vị trí sale</option>
                                    <option value="1">Telesales</option>
                                    <option value="2">Sales trực tiếp</option>
                                    <option value="3">Sales tư vấn</option>
                                    <option value="4">Sales phân phối</option>
                                    <option value="5">Sales online</option>
                                    <option value="6">Sales admin</option>
                                </select>
                            </div>
                            <div class="grid-form__item select-wrapper">
                                <select name="exp_field" data-placeholder="Bất động sản" class="primary-select" >
                                    <option :value="item.id" v-for="item in allFieldJob">{{item.name}}</option>
                                </select>
                            </div>
                            <div class="grid-form__item select-wrapper">
                                <select name="exp_year" data-placeholder="2 năm" class="primary-select">
                                    <option value="-1">Số năm kinh nghiệm</option>
                                    <option value="1">1 năm</option>
                                    <option value="2">2 năm</option>
                                    <option value="3">3 năm</option>
                                    <option value="4">Trên 3 năm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="m-checkbox__item">
                        <label class="m-checkbox">
                            <input type="radio" name="exp" value="2" id="exp_2">Chưa có<span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-block m-b-30 p-b-20">
            <div class="choose-tags" id="va_step_skill">
                <div class="s-text2 m-b-6">Bạn có những kĩ năng nào sau đây?</div>
                <div class="s-text8 m-b-20">Được chọn tối đa 5 kĩ năng</div>
                <div class="choose-tags__block">
                    <div class="choose-tags__item" v-for="item in allSkill">
                        <label :class="vir.skill.includes(item.id) ? 'is-checked' : ''" v-bind:for="'skill-' + item.id">
                            {{item.value}}
                            <input type="checkbox" class="custom-control-input"
                                   :value="item.id"
                                   :id="'skill-' + item.id"
                                   v-model="vir.skill"
                                   :disabled="vir.skill.length > 4 && vir.skill.indexOf(item.id) === -1"
                            >
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-block m-b-30 p-b-20">
            <div class="choose-tags" id="va_step_character">
                <div class="s-text2 m-b-6">Bạn thấy mình là người thế nào?</div>
                <div class="s-text8 m-b-20">Được chọn tối đa 5 tính cách</div>
                <div class="choose-tags__block">
                    <div class="choose-tags__item" v-for="item in allCharacters">
                        <label :class="vir.character.includes(item.id) ? 'is-checked' : ''" v-bind:for="'character-' + item.id">
                            {{item.name}}
                            <input type="checkbox" class="custom-control-input"
                                   :value="item.id"
                                   :id="'character-' + item.id"
                                   v-model="vir.character"
                                   :disabled="vir.character.length > 4 && vir.character.indexOf(item.id) === -1"
                            >
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-block m-b-30 p-b-10">
            <div class="s-text2 m-b-20">Thu nhập</div>
            <div class="grid-form">
                <div class="grid-form__item">
                    <label>Thu nhập</label>
                    <div class="select-wrapper">
                        <select name="salary_wish" data-placeholder="Chọn mức thu nhập" tabindex="2" class="primary-select">
                            <option value="null" disabled="disabled" selected="selected">Chọn mức thu nhập</option>
                            <option value="1">Dưới 6,000,000 vnđ</option>
                            <option value="2">6,000,000 vnđ - 8,000,000 vnđ</option>
                            <option value="3">8,000,000 vnđ - 10,000,000 vnđ</option>
                            <option value="4">10,000,000 vnđ - 15,000,000 vnđ</option>
                            <option value="5">15,000,000 vnđ - 20,000,000 vnđ</option>
                            <option value="6">20,000,000 vnđ - 30,000,000 vnđ</option>
                            <option value="7">30,000,000 vnđ - 50,000,000 vnđ</option>
                            <option value="8">50,000,000 vnđ - 100,000,000 vnđ</option>
                            <option value="9">Trên 100,000,000 vnđ</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-container tar m-b-40">
            <div class="button-secondary fl" v-on:click="backStep()"><i class="icon-left-arrow m-r-10"></i>Quay lại</div>
            <div class="button-primary" v-on:click="nextStep2()">Tiếp tục<i class="icon-right-arrow m-l-10"></i></div>
        </div>
    </div>
</template>

<script>
    import MyCurrencyInput from './my-current-input.vue';
    export default {
        name: "step2",
        components: {
            MyCurrencyInput
        },
        data(){
            return {
                envCompany : [
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
                vir : {
                    env   :   [],
                    skill : [],
                    character : [],
                    baseSalaryMin : '',
                    baseSalaryMax : '',
                    inComeMin     : '',
                    inComeMax     : ''
                },
                allSkill : [],
                allCharacters : [],
                allFieldJob : []
            }
        },
        methods: {
            fetchAllSkill(){
                axios
                    .get('/account/get-list-all-skill')
                    .then(data => {
                        this.allSkill = data.data;
                    })
            },

            fetchAllFieldJob(){
                axios
                    .get('/account/get-all-filed-job')
                    .then(data => {
                        this.allFieldJob = data.data;
                        this.allFieldJob.unshift({
                            'id' :  0,
                            'name' : 'Ngành nghề'
                        });
                    })
            },

            pushRawDataToLocalStorage(rawData){
                let rawDataStorage = {};

                if(this.getRawDataToLocalStorage()){
                    rawDataStorage = this.getRawDataToLocalStorage();
                }

                rawDataStorage['step2'] = rawData;
                localStorage.setItem('rawDataCallServer', JSON.stringify(rawDataStorage));
            },

            getRawDataToLocalStorage(){
                return JSON.parse(localStorage.getItem('rawDataCallServer'));
            },

            fetchAllCharactor(){
                axios
                    .get('/account/get-list-all-character')
                    .then(data => {
                        this.allCharacters = data.data;
                        // this.profile.accountEdu = data.data;
                    })
            },
            nextStep2(){
                this.pushRawDataToLocalStorage(this.vir);
                this.$emit('pass-data-to-paren', 3);
            },

            removeRawDataLocalStorage(){
                let rawDataStorage = {};

                if(this.getRawDataToLocalStorage()){
                    rawDataStorage = this.getRawDataToLocalStorage();
                    delete rawDataStorage['step2'];
                    delete rawDataStorage['step3'];
                    localStorage.setItem('rawDataCallServer', JSON.stringify(rawDataStorage));
                }
            },

            backStep(){
                this.$emit('pass-data-to-paren', 1);
            }
        },
        mounted() {
            let rawData = this.getRawDataToLocalStorage();
            this.fetchAllSkill();
            this.fetchAllCharactor();
            this.fetchAllFieldJob();
            // this.removeRawDataLocalStorage();
        }
    }
</script>

<style scoped>

</style>