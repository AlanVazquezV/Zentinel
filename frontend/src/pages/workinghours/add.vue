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
                                    Agregar nuevo
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
                                <form ref="observer" tag="form" @submit.prevent="submitForm()" :class="{ 'card ': !isSubPage }" class=" ">
                                    <div class="grid">
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Horario 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/schedule_id_option_list" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('schedule_id')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlschedule_id"  v-model="formData.schedule_id" :options="req.response" label="Horario"  placeholder="Seleccione un valor" >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('schedule_id')" class="p-error">{{ getFieldError('schedule_id') }}</small> 
                                                        </template>
                                                    </api-data-source>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Dia 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrlday" v-model.trim="formData.day"  label="Dia" type="text" placeholder="Escribir Dia"      
                                                    class=" w-full" :class="getErrorClass('day')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('day')" class="p-error">{{ getFieldError('day') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Trabajando 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrlis_working" v-model.trim="formData.is_working"  label="Trabajando" type="text" placeholder="Escribir Trabajando"      
                                                    class=" w-full" :class="getErrorClass('is_working')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('is_working')" class="p-error">{{ getFieldError('is_working') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Hora de entrada 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Calendar  :showButtonBar="true" class="w-full" :class="getErrorClass('start_time')" v-model="formData.start_time"     :showTime="true" :timeOnly="true"      />
                                                    <small v-if="isFieldValid('start_time')" class="p-error">{{ getFieldError('start_time') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Hora de salida 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Calendar  :showButtonBar="true" class="w-full" :class="getErrorClass('end_time')" v-model="formData.end_time"     :showTime="true" :timeOnly="true"      />
                                                    <small v-if="isFieldValid('end_time')" class="p-error">{{ getFieldError('end_time') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-if="showSubmitButton" class="text-center my-3">
                                        <Button class="p-button-primary" type="submit" label="Entregar" icon="pi pi-send" :loading="saving" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </template>
    </main>
</template>
<script setup>
	import {  computed,  reactive, toRefs, onMounted } from 'vue';
	import { required, numeric, } from 'src/services/validators';
	import { useApp } from 'src/composables/app.js';
	import { useAddPage } from 'src/composables/addpage.js';
	import { usePageStore } from 'src/store/page';
	const props = defineProps({
		pageStoreKey: {
			type: String,
			default: 'WORKINGHOURS',
		},
		pageName : {
			type : String,
			default : 'workinghours',
		},
		routeName : {
			type : String,
			default : 'workinghoursadd',
		},
		apiPath : {
			type : String,
			default : 'workinghours/add',
		},
		submitButtonLabel: {
			type: String,
			default: "Entregar",
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
			default: "Crear registro",
		},
		msgAfterSave: {
			type: String,
			default: "Grabar agregado exitosamente",
		},
		msgBeforeSave: {
			type: String,
			default: "",
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
		pageData: { // use to set formData default values from another page
			type: Object,
			default: () => ({
		schedule_id: "", 
		day: "", 
		is_working: "", 
		start_time: new Date(), 
		end_time: new Date(), 
			})
		},
	});
	//lines
	const store = usePageStore(props.pageStoreKey);
	const app = useApp();
	
	const formData = reactive({ ...props.pageData });
	
	//vuelidate form validation rules
	const rules = computed(() => {
		return {
			schedule_id: { numeric },
			day: {  },
			is_working: {  },
			start_time: {  },
			end_time: {  }
		}
	});
	
	const page = useAddPage({ store, props, formData, rules, beforeSubmit, afterSubmit });
	
	// event raised before submit form
	function beforeSubmit(){
		return true;
	}
	
	// event raised after form submited
	function afterSubmit(response) { 
		app.flashMsg(props.msgTitle, props.msgAfterSave);
		page.setFormDefaultValues(); //reset form data
		if(app.isDialogOpen()){
			app.closeDialogs(); // if page is open as dialog, close dialog
		}
		else if(props.redirect) {
			app.navigateTo(`/workinghours`);
		}
	}
	
	const {  saving, pageReady, } = toRefs(page.state);
	
	const { submitForm, getErrorClass, getFieldError, isFieldValid,  } = page.methods;
	
	onMounted(()=>{
		const pageTitle = "Agregar nuevo";
		app.setPageTitle(props.routeName, pageTitle); // set browser page title
	});
	
	// expose page object for other components access
	defineExpose({
		page
	});
</script>
<style scoped>
</style>
