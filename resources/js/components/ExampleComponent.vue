<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mensagens</div>

                    <div class="card-body">
                        <ul>
                           <li v-for="(mensagem,index) in mensagens" :key="index">{{ mensagem.title }} - {{ mensagem.body }}</li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                mensagens: [],
            }
        },
        mounted() {
            Echo.channel('message-received')
                .listen('SendMessage', (e) => {
                    this.mensagens.push(e);
                });
        }
    }
</script>
