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
                                                    <InputText  ref="ctrlemployee_number" v-model.trim="formData.employee_number"  label="No. Empleado" type="number" placeholder="Escribir No. Empleado"   step="any"    
                                                    class=" w-full" :class="getErrorClass('employee_number')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('employee_number')" class="p-error">{{ getFieldError('employee_number') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Nombre 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrlfirst_name" v-model.trim="formData.first_name"  label="Nombre" type="text" placeholder="Escribir Nombre"      
                                                    class=" w-full" :class="getErrorClass('first_name')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('first_name')" class="p-error">{{ getFieldError('first_name') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Apellido paterno 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrllast_name" v-model.trim="formData.last_name"  label="Apellido paterno" type="text" placeholder="Escribir Apellido paterno"      
                                                    class=" w-full" :class="getErrorClass('last_name')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('last_name')" class="p-error">{{ getFieldError('last_name') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Apellido materno 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrlsurname" v-model.trim="formData.surname"  label="Apellido materno" type="text" placeholder="Escribir Apellido materno"      
                                                    class=" w-full" :class="getErrorClass('surname')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('surname')" class="p-error">{{ getFieldError('surname') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    RFC 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrltax_id" v-model.trim="formData.tax_id"  label="RFC" type="text" placeholder="Escribir RFC"      
                                                    class=" w-full" :class="getErrorClass('tax_id')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('tax_id')" class="p-error">{{ getFieldError('tax_id') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    CURP 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrlid_number" v-model.trim="formData.id_number"  label="CURP" type="text" placeholder="Escribir CURP"      
                                                    class=" w-full" :class="getErrorClass('id_number')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('id_number')" class="p-error">{{ getFieldError('id_number') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Puesto 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/position_id_option_list" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('position_id')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlposition_id"  v-model="formData.position_id" :options="req.response" label="Puesto"  placeholder="Seleccione un valor" >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('position_id')" class="p-error">{{ getFieldError('position_id') }}</small> 
                                                        </template>
                                                    </api-data-source>
                                                </div>
                                            </div>
                                        </div>
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
                                                    Estatus 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/status_option_list_3" >
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
                                                    Id User 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/id_user_option_list" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('id_user')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlid_user"  v-model="formData.id_user" :options="req.response" label="Id User"  placeholder="Seleccione un valor" >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('id_user')" class="p-error">{{ getFieldError('id_user') }}</small> 
                                                        </template>
                                                    </api-data-source>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Fotografia 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <div class="mb-3">
                                                        <Uploader :class="getErrorClass('photo')" :auto="true" :fileLimit="1" :maxFileSize="3000000" accept=".jpg,.png,.gif,.jpeg" :multiple="false" style="width:100%" label="Elija archivos o suelte archivos aquí" upload-path="fileuploader/upload/photo" v-model="formData.photo"></Uploader>
                                                    </div>
                                                    <small v-if="isFieldValid('photo')" class="p-error">{{ getFieldError('photo') }}</small> 
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
			default: 'EMPLOYEES',
		},
		pageName: {
			type: String,
			default: 'employees',
		},
		routeName: {
			type: String,
			default: 'employeesedit',
		},
		pagePath: {
			type : String,
			default : 'employees/edit',
		},
		apiPath: {
			type: String,
			default: 'employees/edit',
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
		employee_number: "", 
		first_name: "", 
		last_name: "", 
		surname: "", 
		tax_id: "", 
		id_number: "", 
		position_id: "", 
		schedule_id: "", 
		status: "", 
		id_user: "", 
		photo: "", 
	}, props.pageData);
	
	const formData = reactive({ ...formDefaultValues });
	
	function afterSubmit(response) {
		app.flashMsg(props.msgTitle, props.msgAfterSave);
		if(app.isDialogOpen()){
			app.closeDialogs(); // if page is open as dialog, close dialog
		}
		else if(props.redirect) {
			app.navigateTo(`/employees`);
		}
	}
	
	// form validation rules
	const rules = computed(() => {
		return {
			employee_number: { numeric },
			first_name: {  },
			last_name: {  },
			surname: {  },
			tax_id: {  },
			id_number: {  },
			position_id: { numeric },
			schedule_id: { numeric },
			status: { numeric },
			id_user: { numeric },
			photo: {  }
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
