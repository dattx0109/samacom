import TopStep from './top-step.vue'
import Step1 from './step1.vue';
import Step2 from './step2.vue';
import Step3 from './step3.vue';
import Step4 from './step4.vue';
import StepLast from './stepLast.vue';

const TIME_EXPIRED = 10*60*1000;

var app = new Vue({
    el: '#vir',
    components: {
        TopStep,
        Step1,
        Step2,
        Step3,
        Step4,
        StepLast
    },
    data(){
      return {
          virdata : {
              step : 1
          }
      }
    },
    mounted (){
        // localStorage.clear();
        this.virdata.step = this.getStepToLocalStorage();
    },

    methods: {
        passDataToParent(step){
            this.setStepToLocalStorage(step);
            this.virdata.step = this.getStepToLocalStorage();
        },
        setStepToLocalStorage(step){
            let item = {
                'step' : step,
                'timeExpired' : new Date().getTime() + TIME_EXPIRED
            };
            localStorage.setItem('step', JSON.stringify(item));
        },
        getStepToLocalStorage(){
            let step = JSON.parse(localStorage.getItem('step'));
            if(!step){
                return 1;
            }

            if(step.timeExpired < new Date().getTime()){
                return  1;
            }

            return  step.step;
        }
    }
});
