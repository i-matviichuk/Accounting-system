<template>
    <el-date-picker
            name="birthday"
            v-model="date"
            type="date"
            placeholder="Pick a day"
            value-format="yyyy-MM-dd"
    >
     </el-date-picker>
</template>

<script>
    import ElInput from "../../../../node_modules/element-ui/packages/input/src/input";
    export default {
        props: ['dateBirthday', 'old'],
        components: {ElInput},
        data() {
            return {
                date: '',
            };
        },
        created() {
            this.date = this.dateBirthday;
            this.date = this.old;
        },
    }
</script>
