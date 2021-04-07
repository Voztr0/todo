<template>
    <p class="rounded-pill"
    :class="claseEstadoItem()"
    @click="cambiarEstado"
    :key="estadoItemData"
    >{{ estadoItem }}</p>
</template>


<script>
export default {
    props:['estado', 'itemId'],
    mounted() {
        this.estadoItemData = Number(this.estado)
    },
    data: function() {
        return {
            estadoItemData: null
}
},
methods: {
    claseEstadoItem() {
        return this.estadoItemData === 1 ? "badge badge-success" : "badge badge-warning"
    },
    cambiarEstado (){
        if(this.estadoItemData === 1){
            this.estadoItemData = 0;
        }else{
            this.estadoItemData = 1;
        }
        const params = {
            estado: this.estadoItemData
        }
        // Enviar a axios
        axios
            .post('/items/e' + this.itemId, params)
            .then(respuesta => console.log(respuesta))
            .catch(error => console.log(error))
    }
    },
    computed: {
        estadoItem() {
            return this.estadoItemData === 1 ? 'Completada' : 'Pendiente'
        }
    }
}
</script>