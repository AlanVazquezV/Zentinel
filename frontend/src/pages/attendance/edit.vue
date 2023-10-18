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
                                                    Fecha 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Calendar  :showButtonBar="true" class="w-full" :class="getErrorClass('date')" dateFormat="yy-mm-dd" v-model="formData.date" :showIcon="true"     mask="YYYY-MM-DD"      />
                                                    <small v-if="isFieldValid('date')" class="p-error">{{ getFieldError('date') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Hora 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Calendar  :showButtonBar="true" class="w-full" :class="getErrorClass('time')" v-model="formData.time"     :showTime="true" :timeOnly="true"      />
                                                    <small v-if="isFieldValid('time')" class="p-error">{{ getFieldError('time') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Check Type 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrlcheck_type" v-model.trim="formData.check_type"  label="Check Type" type="number" placeholder="Escribir Check Type"   step="any"    
                                                    class=" w-full" :class="getErrorClass('check_type')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('check_type')" class="p-error">{{ getFieldError('check_type') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Estatus 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/status_option_list" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('status')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlstatus"  v-model="formData.status" :options="req.response" label="Estatus"  placeholder="Seleccione un valor" >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('status')" class="p-error">{{ getFieldError('status') }}</small> 
                                                        </template>
                                                    </api-data-source>
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
			default: 'ATTENDANCE',
		},
		pageName: {
			type: String,
			default: 'attendance',
		},
		routeName: {
			type: String,
			default: 'attendanceedit',
		},
		pagePath: {
			type : String,
			default : 'attendance/edit',
		},
		apiPath: {
			type: String,
			default: 'attendance/edit',
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
		employee_id: "", 
		date: new Date(), 
		time: new Date(), 
		check_type: "", 
		status: "", 
	}, props.pageData);
	
	const formData = reactive({ ...formDefaultValues });
	
	function afterSubmit(response) {
		app.flashMsg(props.msgTitle, props.msgAfterSave);
		if(app.isDialogOpen()){
			app.closeDialogs(); // if page is open as dialog, close dialog
		}
		else if(props.redirect) {
			app.navigateTo(`/attendance`);
		}
	}
	
	// form validation rules
	const rules = computed(() => {
		return {
			employee_id: { numeric },
			date: {  },
			time: {  },
			check_type: { numeric },
			status: { numeric }
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
