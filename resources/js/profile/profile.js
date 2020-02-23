import Avatar from './avatar.vue';
import ProfileBase from './profile-base.vue';
import ProfileGold from './profile-goal.vue';
import ProfileCharacter from './profile-character.vue';
import ProfileExp from './profile-exp.vue';
import ProfileSkill from './profile-skill.vue';
import ProfileSchool from './profile-school.vue';
import ProfileDesire from './profile-desire.vue';

import 'vue-date-pick/dist/vueDatePick.css';

var app = new Vue({
    el: '#profile',
    components: {
        Avatar,
        ProfileBase,
        ProfileGold,
        ProfileCharacter,
        ProfileExp,
        ProfileSkill,
        ProfileSchool,
        ProfileDesire,
    },
    data(){
      return {
          isLoading : true,
          isLoadingDesire : true,
          isLoadingCharactor : true,
          isLoadingPercentageProfile : true,
          profile : {
              accSkill : [],
              skill : [],
              provinces : [],
              accountDetail : {},
              account : {},
              districts : [],
              fieldJobs : [],
              accountExp : [],
              accountEdu : [],
              accountWish : [],
              districtsAccountWish : [],
              percentageProfile : [],
              characters : [],
              accCharacter : [],
          },
          image: null,
      }
    },
    mounted (){
        this.fetchAllProfile();
        this.fetchAllProfileExp();
        this.fetchAllProfileEdu();
        this.fetchAllProfileAccountWish();
        this.fetchAllProfilePercentage();
        this.fetchAllSkill();
        this.fetchAllCharactor();
        this.fetchProfileCharacter();
        this.fetchListProvince();
        this.fetchProfileAccount();
        this.fetchAllFieldJob();
        this.fetchSkillCharactor();
    },

    methods: {
        passDataToParent(item){
            this.profile.percentageProfile = item;
        },

        fetchAllProfile() {
            this.isLoading = true;
            axios
                .get('/api/update-detail-api')
                .then(data => {
                    // console.log('data default', data.data);
                    // console.log('=====?????===========');
                    this.isLoading = false;
                    this.profile.accountDetail = data.data.accountDetail;
                    this.profile.districts = data.data.districts;
                })
        },

        fetchAllProfileExp(){
            axios
                .get('/account/get-list-exp')
                .then(data => {
                    this.profile.accountExp = data.data;
                    // this.isLoading = false;
                    // this.profile = data.data;
                })
        },

        fetchAllProfileEdu(){
            axios
                .get('/account/get-list-edu')
                .then(data => {
                    this.profile.accountEdu = data.data;
                })
        },

        fetchAllProfileAccountWish(){
            axios
                .get('/account/get-list-account-wish')
                .then(data => {
                    this.isLoadingDesire = false;
                    this.profile.accountWish = data.data.accountWish;
                    this.profile.districtsAccountWish = data.data.districtsAccountWish;
                    // this.profile.accountEdu = data.data;
                })
        },

        fetchAllProfilePercentage(){
            axios
                .get('/account/get-list-profile-percentage')
                .then(data => {
                    this.profile.percentageProfile = data.data;
                    this.isLoadingPercentageProfile = false;
                    // this.profile.accountEdu = data.data;
                })
        },

        fetchAllSkill(){
            axios
                .get('/account/get-list-all-skill')
                .then(data => {
                    this.profile.skill = data.data;
                    // this.profile.accountEdu = data.data;
                })
        },

        fetchSkillCharactor(){
            axios
                .get('/account/get-list-account-skill')
                .then(data => {
                    this.profile.accSkill = data.data;
                })

        },

        fetchAllCharactor(){
            axios
                .get('/account/get-list-all-character')
                .then(data => {
                    this.profile.characters = data.data;
                    // this.profile.accountEdu = data.data;
                })
        },
        fetchProfileCharacter(){
            axios
                .get('/account/get-profile-character')
                .then(data => {
                    this.isLoadingCharactor = false;
                    this.profile.accCharacter = data.data;
                    // this.profile.accountEdu = data.data;
                })
        },

        fetchListProvince(){
            axios
                .get('/account/get-list-province')
                .then(data => {
                    this.profile.provinces = data.data;
                    // this.profile.accountEdu = data.data;
                })
        },

        fetchProfileAccount(){
            axios
                .get('/account/get-account')
                .then(data => {
                    this.profile.account = data.data;
                    // this.profile.accountEdu = data.data;
                })
        },

        fetchAllFieldJob(){
            axios
                .get('/account/get-all-filed-job')
                .then(data => {
                    this.profile.fieldJobs = data.data;
                    // this.profile.accountEdu = data.data;
                })
        },

        getAllProfile(){

        }
    }
})
