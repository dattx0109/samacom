<template>
    <div class="va-progress p-t-35 p-b-20">
        <ul class="progress-list" :class="buildClassStep()">
            <li class="progress-list__point progress-list__point-1">
                <div class="progress-list__number m-b-8">1</div>
                <div class="progress-list__title">Mô tả bản thân</div>
                <div class="progress-list__line">
                    <div class="progress-list__line-inner"></div>
                </div>
            </li>
            <li class="progress-list__point progress-list__point-2">
                <div class="progress-list__number m-b-8">2</div>
                <div class="progress-list__title">Mô tả mong muốn</div>
                <div class="progress-list__line">
                    <div class="progress-list__line-inner"></div>
                </div>
            </li>
            <li class="progress-list__point progress-list__point-3">
                <div class="progress-list__number m-b-8">3</div>
                <div class="progress-list__title">Thông tin liên hệ</div>
                <div class="progress-list__line">
                    <div class="progress-list__line-inner"></div>
                </div>
            </li>
            <li class="progress-list__point progress-list__point-4">
                <div class="progress-list__number m-b-8">4</div>
                <div class="progress-list__title">Kết quả</div>
                <div class="progress-list__line">
                    <div class="progress-list__line-inner"></div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "top-step",
        props:{
            virdata : {
                type : Object
            }
        },
        data(){
            return{
                classActive : {
                    step1 : '',
                    step2 : '',
                    step3 : '',
                    step5 : ''
                }
            }
        },
        methods: {
            buildClassStep(){
                return  'progress-list--active-'+this.virdata.step;
            }
        },
        mounted(){
        }
    }
</script>

<style scoped>

</style>