<template>
    <div class="container">
        <div class="text-center card">
            <Avatar class="bg-pink-500 text-white" size="large" icon="pi pi-ban" />   
            <div class="text-4xl my-3  font-bold text-pink-500 my-3">
                Tu cuenta ha sido bloqueada
            </div>
            <div class="text-primary">
                Póngase en contacto con el administrador del sistema para obtener más información
            </div>
            <hr />
            <router-link to="/">
                <Button label="Continuar" icon="pi pi-home" />
            </router-link>
        </div>
    </div>
</template>
