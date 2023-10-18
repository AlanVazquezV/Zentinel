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
			default: 'WORKINGHOURS',
		},
		pageName: {
			type: String,
			default: 'workinghours',
		},
		routeName: {
			type: String,
			default: 'workinghoursedit',
		},
		pagePath: {
			type : String,
			default : 'workinghours/edit',
		},
		apiPath: {
			type: String,
			default: 'workinghours/edit',
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
		schedule_id: "", 
		day: "", 
		is_working: "", 
		start_time: new Date(), 
		end_time: new Date(), 
	}, props.pageData);
	
	const formData = reactive({ ...formDefaultValues });
	
	function afterSubmit(response) {
		app.flashMsg(props.msgTitle, props.msgAfterSave);
		if(app.isDialogOpen()){
			app.closeDialogs(); // if page is open as dialog, close dialog
		}
		else if(props.redirect) {
			app.navigateTo(`/workinghours`);
		}
	}
	
	// form validation rules
	const rules = computed(() => {
		return {
			schedule_id: { numeric },
			day: {  },
			is_working: {  },
			start_time: {  },
			end_time: {  }
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
