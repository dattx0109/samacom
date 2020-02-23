<template>
<!--    <div class="page-block m-b-30">

        <div class="display-flex-wrap m-b-20">
            <div class="m-text5 p-r-20">Tính cách</div>
            <div class="page-block__saved page-block__saved&#45;&#45;active" v-if="isLoading">
                <div class="icon-container"><i class="fa fa-check"></i></div>
                Đã lưu
            </div>
        </div>

&lt;!&ndash;        <div class="form-group m-b-25">&ndash;&gt;
&lt;!&ndash;            <label class="m-b-6">Tính cách của ứng viên</label>&ndash;&gt;
&lt;!&ndash;            <textarea type="text" placeholder="Tính cách ứng viên" class="form-control"&ndash;&gt;
&lt;!&ndash;                      name="character"></textarea>&ndash;&gt;
&lt;!&ndash;        </div>&ndash;&gt;
        <div class="btn-container tar">
            <span v-if="!isLoading">
                    Lưu lại
                </span>

            <span v-if="isLoading">
                    <span class="spinner spinner-border spinner-border-sm" role="status" aria-hidden="true">
                    </span>Loading...
                </span>
        </div>
    </div>-->
    <div class="page-block m-b-30">
        <label class="m-text5 m-b-20">Tính cách</label>
        <div class="select-wrapper">
            <multiselect
                    v-model="value"
                    tag-placeholder="Thêm tính cách mới"
                    placeholder="Chọn tính cách"
                    label="name"
                    track-by="name"
                    :options="listCharacter"
                    :multiple="true"
                    :taggable="false"
                    @input="saveCharacter"
            >

            </multiselect>
        </div>
    </div>

</template>

<script>
    import Multiselect from 'vue-multiselect'
    export default {
        props:{
            profile : {
                type : Object
            }
        },
        components: {
            Multiselect
        },
        data(){
            return {
                isLoading : false,
                value: {}
                ,
            }
        },
        mounted() {
            this.accountCharacter();
        },
        computed: {
            listCharacter() {
                return this.profile.characters;
            },

        },
        methods: {
            accountCharacter(){
                let dataAccountCharacter = this.profile.accCharacter;
                this.value = dataAccountCharacter;
            },
            saveCharacter(val) {
                let vm = [this.value];
                // return;
                // let vm = this;
                // let id_character = val.id;
                axios
                    .post('/api/update-account-character', vm)
                    .then(response => {
                        // axios
                        //     .get('/api/update-detail-api')
                        //     .then(data => {
                        //         this.$emit('pass-data-to-paren', data.data);
                        //     });

                    }).catch(err => {
                })
            }
        }
    }
</script>
