<template>
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on January 1, 2021 by Start Bootstrap</div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="https://picsum.photos/900/400" alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">Science is an enterprise that should be cherished as an activity of the free human mind. Because it transforms who we are, how we live, and it gives us an understanding of our place in the universe.</p>
                    <p class="fs-5 mb-4">The universe is large and old, and the ingredients for life as we know it are everywhere, so there's no reason to think that Earth would be unique in that regard. Whether of not the life became intelligent is a different question, and we'll see if we find that.</p>
                    <p class="fs-5 mb-4">If you get asteroids about a kilometer in size, those are large enough and carry enough energy into our system to disrupt transportation, communication, the food chains, and that can be a really bad day on Earth.</p>
                    <h2 class="fw-bolder mb-4 mt-5">I have odd cosmic thoughts every day</h2>
                    <p class="fs-5 mb-4">For me, the most fascinating interface is Twitter. I have odd cosmic thoughts every day and I realized I could hold them to myself or share them with people who might be interested.</p>
                    <p class="fs-5 mb-4">Venus has a runaway greenhouse effect. I kind of want to know what happened there because we're twirling knobs here on Earth without knowing the consequences of it. Mars once had running water. It's bone dry today. Something bad happened there as well.</p>
                    <header class="mb-4">

                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!" @click="showForm(0)">Replay</a>

                    </header>
                </section>
            </article>
            <!-- Comments section-->

            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
               <comments
                   v-for="(comment,index) in comments.data"
                   :key="comment.id"
                   :index =index
                   :comment="comment"
                   :form-button="formButton"
               ></comments>
                    </div>
                </div>
            </section>
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        <form class="mb-4" @submit.prevent="saveForm" id="fo">
                            <input type="name" v-model="form.name" class="form-control mb-3" placeholder="user name " required>
                            <textarea class="form-control mb-3" v-model="form.comment" rows="3" placeholder="Join the discussion and leave a comment!" required></textarea>
                            <input type="submit" value="Add!">
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Web Design</a></li>
                                <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div>
        </div>

    </div>
</template>

<script>
import CommentBlock from "./commentBlock";
import Comments from "./comments";
export default {
    name: "blog",
    components: {Comments, CommentBlock},

   data(){
        return{

            formButton:"Replay",
            comments:{},
            form:{
                name:null,
                comment:null,
                replayId:0
            }
        }
   },
    created() {


        this.getComments()
    },
    methods:{
        showForm(e){

            return this.form.replayId=e;


        },
        getComments(){
            axios.get('api/comments')
                .then(res=> this.comments = res.data)
                .catch(error => console.log(error.response.data))
        },
        saveForm() {
            console.log(this.form)
            axios.post('api/add-comment', this.form)
                .then(res => {
                    this.$toasted.show("your comment added successfully !!", {
                        theme: "toasted-primary",
                        position: "top-center",
                        duration : 5000,
                        className: 'toasting'
                    });
                       this.comments.data =  res.data
                        window.scrollTo(0,0)
                    this.form.name=null;
                        this.form.comment=null;
                        this.form.replayId=0;
                    }
                )
                .catch(error => console.log(error.response.data))
        }

    }
}
</script>

<style scoped>
.toasting{
    background: green !important;

}
</style>
