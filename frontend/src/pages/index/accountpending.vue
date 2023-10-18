<template>
    <div class="container">
        <div class="text-center card">
            <Avatar size="large" class="bg-orange-500 text-white" icon="pi pi-user" /> 
            <div class="text-4xl font-bold text-orange-500 my-3">
                Su cuenta está esperando revisión
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
