<template>
    <div>
        <div>
            <p>{{snsId}}  {{snsEtcName}}</p>
            <label>SNS名 : </label>
            <select name="sns_key" @change="snsChange()" v-model="selected">
                <option v-for="(sns) in snsData" :key="sns.sns_id" :value="sns.sns_id">
                    {{ sns.sns_name }}
                </option>
            </select>
        </div>
        <div class="etc_sns" v-show="selected == 1000">
            <label></label>
            <input type="text" name="sns_etc_name" placeholder="SNS名" :value="stateSnsEtcName"/>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        snsId: "",
        snsEtcName: "",
        snsData: "",
        },
    data() {
        return {
            length: "",
            selected: this.snsId ? this.snsId : 0,
            stateSnsEtcName: this.snsEtcName,
        };
    },
    methods: {
        snsChange: function() {
            if (this.selected != 1000) {
                this.stateSnsEtcName = ""
            }
            console.log(this.stateSnsEtcName)
        }
    },
    watch: {
        snsId: function(value, oldValue) {
            // this.snsIdtemp = this.snsId
            // console.log(this.snsId)
            console.log(value)
            console.log("oldValue: " + oldValue)
            // immediate: true,
            // handler() {
            //     console.log(this.snsId)
            //     this.snsIdtemp = this.snsId
            // }
        }
    },
    mounted() {
        // console.log('Component mounted.')
        console.log(this.snsId)
    }
};
</script>
