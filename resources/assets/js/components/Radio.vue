<template>
    <div>
        <el-radio name="role" v-model="radio" label="student" border>Студент</el-radio>
        <el-radio name="role" v-model="radio" label="operator" border>Оператор</el-radio>
        <el-radio name="role" v-model="radio" label="teacher" border>Викладач</el-radio>
        <el-radio v-if="withAdmin" name="role" v-model="radio" label="admin" border>Адміністратор</el-radio>
    </div>
</template>

<script>
    import ElInput from "../../../../node_modules/element-ui/packages/input/src/input";
    export default {
        props: ['withAdmin'],
        components: {ElInput},
        data() {
            return {
                radio: 'student',
            };
        },
    }
</script>

<style>

</style>
