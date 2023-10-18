<template>
    <div class="grid justify-content-center">
        <div class="col-12 md:col-6">
            <div class="card my-4 text-center">
                <div class="text-2xl font-bold text-success">
                    <Avatar icon="pi pi-check-circle" size="large" />
                    Tu contraseña ha sido restablecida
                </div>
                <hr  />
                <router-link to="/">
                    <Button class="p-button-text" label="Haga clic aquí para ingresar" />
                </router-link>
            </div>
        </div>
    </div>
</template>