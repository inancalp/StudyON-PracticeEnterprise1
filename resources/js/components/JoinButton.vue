<template>
    <div>
        <button class="btn btn-primary" @click="joinStudyGroup">Join the Group</button> 
    </div>
</template>

<script>
    export default {

        props: ["studygroupId"],

        mounted() {
            console.log('Component mounted.')
        },

        methods : {
            joinStudyGroup(){
                axios.post('/studygroup/join/' + this.studygroupId)
                        .then(response => {
                            alert(response.data);
                            });

            }
        }
    }

    
</script>
