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
                                    Editar
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </template>
            <section class="page-section " >
                <div class="container">
                    <div class="grid ">
                        <div  class="md:col-9 sm:col-12 comp-grid" >
                            <div >
                                <form ref="observer"  tag="form" @submit.prevent="submitForm()" :class="{ 'card ': !isSubPage }" class=" ">
                                    <!--[form-content-start]-->
                                    <div class="grid">
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Asistencia 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/attendance_id_option_list" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('attendance_id')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlattendance_id"  v-model="formData.attendance_id" :options="req.response" label="Asistencia"  placeholder="Seleccione un valor" >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('attendance_id')" class="p-error">{{ getFieldError('attendance_id') }}</small> 
                                                        </template>
                                                    </api-data-source>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    No. Empleado 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/employee_id_option_list" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('employee_id')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlemployee_id"  v-model="formData.employee_id" :options="req.response" label="No. Empleado"  placeholder="Seleccione un valor" >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('employee_id')" class="p-error">{{ getFieldError('employee_id') }}</small> 
                                                        </template>
                                                    </api-data-source>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Estatus 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/status_option_list_4" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('status')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlstatus"  v-model="formData.status" :options="req.response" label="Estatus"  placeholder="Seleccione un valor" >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('status')" class="p-error">{{ getFieldError('status') }}</small> 
                                                        </template>
                                                    </api-data-source>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Actualizado por 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/employee_id_option_list" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('updated_by')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlupdated_by"  v-model="formData.updated_by" :options="req.response" label="Actualizado por"  placeholder="Seleccione un valor" >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('updated_by')" class="p-error">{{ getFieldError('updated_by') }}</small> 
                                                        </template>
                                                    </api-data-source>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Justificación 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrljustified" v-model.trim="formData.justified"  label="Justificación" type="number" placeholder="Escribir Justificación"   step="any"    
                                                    class=" w-full" :class="getErrorClass('justified')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('justified')" class="p-error">{{ getFieldError('justified') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Descripcion 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Textarea :class="getErrorClass('description')" class="w-full" ref="ctrldescription" rows="5"  v-model="formData.description" placeholder="Escribir Descripcion"    type="textarea">
                                                    </Textarea>
                                                    <small v-if="isFieldValid('description')" class="p-error">{{ getFieldError('description') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Documentos 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Textarea :class="getErrorClass('documents')" class="w-full" ref="ctrldocuments" rows="5"  v-model="formData.documents" placeholder="Escribir Documentos"    type="textarea">
                                                    </Textarea>
                                                    <small v-if="isFieldValid('documents')" class="p-error">{{ getFieldError('documents') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--[form-content-end]-->
                                    <div v-if="showSubmitButton" class="text-center my-3">
                                        <Button type="submit" label="Actualizar" icon="pi pi-send" :loading="saving" />
                                    </div>
                                </form>
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
	import {  computed,  reactive, toRefs, onMounted } from 'vue';
	import { required, numeric, } from 'src/services/validators';
	import { useApp } from 'src/composables/app.js';
	import { useEditPage } from 'src/composables/editpage.js';
	import { usePageStore } from 'src/store/page';
	const props = defineProps({
		id: [String, Number],
		pageStoreKey: {
			type: String,
			default: 'INCIDENTS',
		},
		pageName: {
			type: String,
			default: 'incidents',
		},
		routeName: {
			type: String,
			default: 'incidentsedit',
		},
		pagePath: {
			type : String,
			default : 'incidents/edit',
		},
		apiPath: {
			type: String,
			default: 'incidents/edit',
		},
		submitButtonLabel: {
			type: String,
			default: "Actualizar",
		},
		formValidationError: {
			type: String,
			default: "El formulario no es válido",
		},
		formValidationMsg: {
			type: String,
			default: "Por favor complete el formulario",
		},
		msgTitle: {
			type: String,
			default: "Actualizar registro",
		},
		msgBeforeSave: {
			type: String,
			default: "",
		},
		msgAfterSave: {
			type: String,
			default: "Registro actualizado con éxito",
		},
		showHeader: {
			type: Boolean,
			default: true,
		},
		showSubmitButton: {
			type: Boolean,
			default: true,
		},
		redirect: {
			type : Boolean,
			default : true,
		},
		isSubPage: {
			type : Boolean,
			default : false,
		},
	});
	
	const store = usePageStore(props.pageStoreKey);
	const app = useApp();
	
	const formDefaultValues = Object.assign({
		attendance_id: "", 
		employee_id: "", 
		status: "", 
		updated_by: "", 
		justified: "NULL", 
		description: "", 
		documents: "", 
	}, props.pageData);
	
	const formData = reactive({ ...formDefaultValues });
	
	function afterSubmit(response) {
		app.flashMsg(props.msgTitle, props.msgAfterSave);
		if(app.isDialogOpen()){
			app.closeDialogs(); // if page is open as dialog, close dialog
		}
		else if(props.redirect) {
			app.navigateTo(`/incidents`);
		}
	}
	
	// form validation rules
	const rules = computed(() => {
		return {
			attendance_id: { numeric },
			employee_id: { numeric },
			status: { numeric },
			updated_by: { numeric },
			justified: { numeric },
			description: {  },
			documents: {  }
		}
	});
	
	const page = useEditPage({store, props, formData, rules, afterSubmit });
	
	const {  currentRecord: editRecord } = toRefs(store.state);
	const {  pageReady, saving, loading, } = toRefs(page.state);
	
	const { apiUrl } = page.computedProps;
	
	const { load, submitForm, getErrorClass, getFieldError, isFieldValid,  } = page.methods;
	
	onMounted(()=>{
		const pageTitle = "Editar";
		app.setPageTitle(props.routeName, pageTitle); // set browser page title
	});
</script>
<style scoped>
</style>
