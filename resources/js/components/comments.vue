<template>

<div>

            <!-- Comment with nested comments-->
            <div class="d-flex mb-4">

                <!-- Parent comment-->
                <div class="flex-shrink-0"><img class="rounded-circle" src="https://picsum.photos/50/50" alt="..." /></div>
                <div class="ms-3">
                    <div class="fw-bold">{{ comment.user }}</div>
                    {{comment.comment }}
                    <br> <a class="badge bg-secondary text-decoration-none link-light" href="#fo"  @click="showForm(comment.id)">{{formButton}}</a>
                    <!-- Child comment 1-->
                    <div v-if="comment.replay_count > 0">
                        <div class="d-flex mt-4" v-for="replay in comment.replies">
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://picsum.photos/50/50" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">{{ replay.user }}</div>
                                {{replay.comment }}
                                <br><a class="badge bg-secondary text-decoration-none link-light" href="#fo"  @click="showForm(replay.id)">Replay</a>
                                <div v-if="replay.replay_count > 0">
                                    <div class="d-flex mt-4" v-for="Nreplay in replay.replies">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://picsum.photos/50/50" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">{{ Nreplay.user }}</div>
                                            {{Nreplay.comment }}
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>


                </div>
            </div>
            <!-- Single comment-->

</div>
</template>

<script>
export default {
    props:['comment','formButton'],
    name: "comments",
    created() {

    },
    methods:{
        showForm(e){
           this.$parent.showForm(e)

        },


    }
}
</script>

<style scoped>

</style>
