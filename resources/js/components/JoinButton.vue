<template>
    <div>
        <button class="btn btn-primary" @click="joinStudyGroup">Join Group</button> 
    </div>
</template>

<script>
    export default {

        props: ["studygroupId"],

        mounted() {
            console.log('Component mounted.')
        },

        // data: function(){
        //     return {
        //         status:
        //     }
        // }
         
        

        methods : {
            joinStudyGroup(){
                axios.post('/studygroup/join/' + this.studygroupId)
                        .then(response => {
                            console.log(response.data);
                            });

            }
        }
    }

    
</script>
