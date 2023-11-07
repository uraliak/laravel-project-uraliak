<template> 
    <div v-show="this.msg !== null" class="alert  alert-primary" role="alert"> 
    Добавлен новый комментарий к статье <strong>{{this.msg}}</strong> 
    </div> 
    </template> 
     
    <script> 
        export default { 
        data() { return { msg: null } }, 
            created() { 
                window.Echo.channel('test').listen('EventNewComment', (article) => { 
                    console.log(article); 
                    this.msg=article.name; 
                    // alert('Добавлена новая статья!'); 
                }) 
            } 
        } 
    </script>

