<template>
    <main class="main-page"  id="">
        <template v-if="pageReady">
            <template v-if="showHeader">
                <section class="page-section mb-3" >
                    <div class="container">
                        <div class="grid align-items-center">
                            <div  v-if="!isSubPage"  class="1 " >
                                <Button @click="$router.go(-1)" label=""  class="p-button p-button-text " icon="pi pi-arrow-left"  />
                            </div>
                            <div  class="col-sm-4-col-md-4 lg:col-8 " >
                                <div class=" font-semibold text-primary" >
                                    Detalle de Empleado
                                    <br /><span class="text-600"> No. Empleado </span>
                                </div>
                            </div>
                            <div  class="col-sm-4 col-md-4 lg:col-1 enroll-btn comp-grid" >
                                <div class="">
                                    <Button label="Foto" icon="pi pi-camera" @click="Modal654 = true" class="" />
                                    <Dialog v-model:visible="Modal654" :dismissableMask="true" :breakpoints="{'960px': '50vw', '640px': '95vw'}" modal style="width:750px" >
                                        <template #header>
                                            <div class="text-2xl">Capturar imagen</div>
                                        </template>
                                        <div class="">
                                            <div id="app" class="web-camera-container">
                                                <div class="camera-button">
                                                    <button type="button" class="button is-rounded" :class="{ 'is-primary' : !isCameraOpen, 'is-danger' : isCameraOpen}" @click="toggleCamera">
                                                    <span v-if="!isCameraOpen">Open Camera</span>
                                                    <span v-else>Close Camera</span>
                                                    </button>
                                                </div>
                                                <div v-show="isCameraOpen && isLoading" class="camera-loading">
                                                    <ul class="loader-circle">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                </div>
                                                <div v-if="isCameraOpen" v-show="!isLoading" class="camera-box" :class="{ 'flash' : isShotPhoto }">
                                                    <div class="camera-shutter" :class="{'flash' : isShotPhoto}"></div>
                                                    <video v-show="!isPhotoTaken" ref="camera" :width="450" :height="337.5" autoplay></video>
                                                    <canvas v-show="isPhotoTaken" id="photoTaken" ref="canvas" :width="450" :height="337.5"></canvas>
                                                </div>
                                                <div v-if="isCameraOpen && !isLoading" class="camera-shoot">
                                                    <button type="button" class="button" @click="takePhoto">
                                                    <img src="https://img.icons8.com/material-outlined/50/000000/camera--v2.png">
                                                    </button>
                                                </div>
                                                <div v-if="isPhotoTaken && isCameraOpen" class="camera-download">
                                                    <a id="downloadPhoto" download="my-photo.jpg" class="button" role="button" @click="downloadImage">
                                                        Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </Dialog>
                                </div>
                            </div>
                            <div  class="col-sm-4 col-md-4 lg:col-1 enroll-btn comp-grid" >
                                <div class="">
                                    <Button label="Firma" icon="pi pi-pencil" @click="Modal525 = true" class="" />
                                    <Dialog v-model:visible="Modal525" :dismissableMask="true" :breakpoints="{'960px': '50vw', '640px': '95vw'}" modal style="width:750px" >
                                        <template #header>
                                            <div class="text-2xl">Modal Title</div>
                                        </template>
                                    </Dialog>
                                </div>
                            </div>
                            <div  class="col-sm-4 col-md-4 lg:col-1 enroll-btn comp-grid" >
                                <div class="">
                                    <Button label="Imprimir" icon="pi pi-id-card" @click="Modal525 = true" class="" />
                                    <Dialog v-model:visible="Modal525" :dismissableMask="true" :breakpoints="{'960px': '50vw', '640px': '95vw'}" modal style="width:750px" >
                                        <template #header>
                                            <div class="text-2xl">Modal Title</div>
                                        </template>
                                    </Dialog>
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
                                                <div class="text-400 font-medium mb-1">Fotografia</div>
                                                <div class="font-bold">
                                                    <image-viewer image-size="medium" image-preview-size="" :src="item.photo" width="auto" height="auto" class="img-fluid" :num-display="1">
                                                    </image-viewer>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">Id</div>
                                                <div class="font-bold">{{ item.id }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">CURP</div>
                                                <div class="font-bold">{{ item.id_number }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">Nombre</div>
                                                <div class="font-bold">{{ item.first_name }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">Apellido paterno</div>
                                                <div class="font-bold">{{ item.last_name }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">Apellido Materno</div>
                                                <div class="font-bold">{{ item.surname }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">RFC</div>
                                                <div class="font-bold">{{ item.tax_id }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">Estatus</div>
                                                <div class="font-bold">{{ item.status }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">No. Empleado</div>
                                                <div class="font-bold">{{ item.employee_number }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">Schedules Label</div>
                                                <div class="font-bold">{{ item.schedules_label }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">Schedules Status</div>
                                                <div class="font-bold">{{ item.schedules_status }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4">
                                        <div class="card flex gap-3 align-items-center p-3 ">
                                            <div class="">
                                                <div class="text-400 font-medium mb-1">Positions Title</div>
                                                <div class="font-bold">{{ item.positions_title }}</div>
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
	import {  ref, toRefs, onMounted } from 'vue';
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
			default: 'EMPLOYEES',
		},
		pageName: {
			type: String,
			default: 'employees',
		},
		routeName: {
			type: String,
			default: 'employeesview',
		},
		apiPath: {
			type: String,
			default: 'employees/view',
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
	const Modal654 = ref(false);
	const Modal525 = ref(false);
	
	const  { load, deleteItem, exportPage,   } = page.methods;
	
	function getActionMenuModel(data){
		return [
		{
			label: "Edit",
			command: (event) => { app.openPageDialog({ page:'employees/edit', url: `/employees/edit/${data.id}`, closeBtn: true }) },
			icon: "pi pi-pencil",
			visible: auth.canView('employees/edit')
		},
		{
			label: "Delete",
			command: (event) => { deleteItem(data.id) },
			icon: "pi pi-trash",
			visible: auth.canView('employees/delete')
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
