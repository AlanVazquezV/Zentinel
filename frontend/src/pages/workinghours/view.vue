<template>
    <main class="main-page"  id="">
        <template v-if="pageReady">
            <template v-if="showHeader">
                <section class="page-section mb-3" >
                    <div class="container">
                        <div class="grid align-items-center">
                            <div  v-if="!isSubPage"  class="col-fixed " >
                                <Button @click="$router.go(-1)" label=""  class="p-button p-button-text " icon="pi pi-arrow-left"  />
                            </div>
                            <div  class="col " >
                                <div class=" text-2xl text-primary font-bold" >
                                    Ver
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </template>
            <section class="page-section " >
                <div class="container">
                    <div class="grid ">
                        <div  class="col comp-grid" >
                            <div >
                                <div class="mb-3 grid justify-content-start">
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">Horario</div>
                                                <div class="font-bold">{{ item.schedules_label }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">Dia</div>
                                                <div class="font-bold">{{ item.day }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">Trabajando</div>
                                                <div class="font-bold">{{ item.is_working }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">Hora de entrada</div>
                                                <div class="font-bold">{{ item.start_time }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">Hora de salida</div>
                                                <div class="font-bold">{{ item.end_time }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-3 justify-content-start">
                                    <Menubar class="p-0 inline-menu" ref="actionMenu" :model="getActionMenuModel(item)" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </template>
        <template v-if="loading">
            <div style="min-height:200px" class="flex gap-3 justify-content-center align-items-center p-3">
                <div><ProgressSpinner style="width:50px;height:50px" /> </div>
                <div class="text-500">Cargando... </div>
            </div>
        </template>
    </main>
</template>
<script setup>
	import {   toRefs, onMounted } from 'vue';
	import { useApp } from 'src/composables/app.js';
	import { useAuth } from 'src/composables/auth';
	import { usePageStore } from 'src/store/page';
	import { useViewPage } from 'src/composables/viewpage.js';
	const props = defineProps({
		id: [String, Number],
		primaryKey: {
			type: String,
			default: 'id',
		},
		pageStoreKey: {
			type: String,
			default: 'WORKINGHOURS',
		},
		pageName: {
			type: String,
			default: 'workinghours',
		},
		routeName: {
			type: String,
			default: 'workinghoursview',
		},
		apiPath: {
			type: String,
			default: 'workinghours/view',
		},
		autoLoad: {
			type: Boolean,
			default: true,
		},
		titleBeforeDelete: {
			type: String,
			default: "Eliminar el registro",
		},
		msgBeforeDelete: {
			type: String,
			default: "¿Seguro que quieres borrar este registro?",
		},
		msgAfterDelete: {
			type: String,
			default: "Grabar eliminado con éxito",
		},
		exportButton: {
			type: Boolean,
			default: true,
		},
		showHeader: {
			type: Boolean,
			default: true,
		},
		showFooter: {
			type: Boolean,
			default: true,
		},
		isSubPage: {
			type : Boolean,
			default : false,
		}
	});
	
	const store = usePageStore(props.pageStoreKey);
	const app = useApp(props);
	const auth = useAuth();
	
	const page = useViewPage({ store, props }); // where page logics resides
	
	const {  currentRecord } = toRefs(store.state);
	const { loading, pageReady } = toRefs(page.state);
	const item = currentRecord;
	
	const  { load, deleteItem, exportPage,   } = page.methods;
	
	function getActionMenuModel(data){
		return [
		{
			label: "Edit",
			command: (event) => { app.openPageDialog({ page:'workinghours/edit', url: `/workinghours/edit/${data.id}`, closeBtn: true }) },
			icon: "pi pi-pencil",
			visible: auth.canView('workinghours/edit')
		},
		{
			label: "Delete",
			command: (event) => { deleteItem(data.id) },
			icon: "pi pi-trash",
			visible: auth.canView('workinghours/delete')
		}
	]
	}
	
	onMounted(()=>{ 
		const pageTitle = "Ver";
		app.setPageTitle(props.routeName, pageTitle); // set browser page title
	});
	
</script>
<style scoped>
</style>
