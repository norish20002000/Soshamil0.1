<template>
    <div>
        <div>
            <label>SNS名 : </label>
            <select @change="snsChange()" v-model="selected">
                <option v-for="(sns, key) in snss" :value="key" :key="key">
                    {{ sns }}
                </option>
            </select>
        </div>
        <div class="etc_sns" v-show="selected == length-1">
            <label></label>
            <input type="text" name="etcsns_name" placeholder="SNS名" />
        </div>
    </div>
</template>
<script>
export default {
    props: {
    },
    data() {
        return {
            snss: ['twitter', 'Instagram', 'Facebook', 'その他'],
            length: "",
            selected: 0,
        };
    },
    methods: {
        snsChange: function() {
            console.log(this.selected)
        }
    },
    computed: {
    },
    mounted() {
        // this.selected = this.snss[0]
        this.length = this.snss.length
        console.log('Component mounted.')
    }
};
</script>
