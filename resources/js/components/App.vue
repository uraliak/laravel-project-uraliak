<template> 
    <div v-if="this.article" class="alert alert-primary" role="alert"> 
        Добавлен новый комментарий к статье 
        <a :href="`/article/${this.article.id}/`">
            <strong>{{this.article.name}}</strong> 
        </a> 
    </div> 
</template> 
     
    <script> 
        export default { 
        data() { return { 
            article: null,
        } }, 
            created() { 
                window.Echo.channel('test').listen('EventNewComment', (data) => { 
                    console.log(data);
                    this.article=data.article; 
                    console.log("Добавлен комментарий", this.article)
                    // alert('Добавлена новая статья!'); 
                }) 
            } 
        } 
    </script>

