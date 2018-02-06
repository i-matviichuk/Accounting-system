<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>
                    <!--<el-input></el-input>-->
                    <el-date-picker
                            v-model="value1"
                            type="date"
                            placeholder="Pick a day">
                    </el-date-picker>
                    <div class="panel-body">
                        I'm an example component!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ElInput from "../../../../node_modules/element-ui/packages/input/src/input";
    export default {
        components: {ElInput},
        data() {
            return {
                variable: '',
                value1: '',
            };
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" rel="stylesheet/css" scoped>
    div {
        color: whitesmoke;
    }
</style>