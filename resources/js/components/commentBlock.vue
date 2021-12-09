<template>

</template>

<script>
export default {
    name: "commentBlock",
    props:['replayId'],
    data(){
        return{
            form:{
                name:null,
                comment:null,
                replayId:this.replayId
            }
        }
    },
    created() {
        this.listenID()
        console.log(this.replayId)
    },
    methods: {
        saveForm() {
            console.log(this.form)
            axios.post('api/add-comment', this.form)
                .then(res => {
                    this.body = ''
                        EventBus.$emit('newReply', res.data)
                        //window.scrollTo(0,0)

                    }
                )
                .catch(error => console.log(error.response.data))
        }
        ,
        listenID() {

            EventBus.$on('UpdateReplayId', (e) => {
                this.replayId = e;
            })
        }
    }
}
</script>

<style scoped>

</style>
