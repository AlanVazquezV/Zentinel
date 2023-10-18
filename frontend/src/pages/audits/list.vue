<template>
    <main class="main-page"  id="">
        <template v-if="showHeader">
            <section class="page-section mb-3" >
                <div class="container-fluid">
                    <div class="grid justify-content-between align-items-center">
                        <div  class="col " >
                            <div class=" text-2xl text-primary font-bold" >
                                Audits
                            </div>
                        </div>
                        <div  class="col-12 md:col-3 " >
                            <router-link :to="`/audits/add`">
                                <Button label="Agregar nuevo" icon="pi pi-plus" type="button" class="p-button w-full bg-primary "  />
                            </router-link>
                        </div>
                        <div  class="col-12 md:col-5 lg:col-4 " >
                            <span class="p-input-icon-left w-full">
                            <i class="pi pi-search" />
                            <InputText  placeholder="Buscar" class="w-full" :value="filters.search.value" @input="debounce(() => { filters.search.value = $event.target.value })"  />
                            </span>
                        </div>
                    </div>
                </div>
            </section>
        </template>
        <section class="page-section " >
            <div class="container-fluid">
                <div class="grid ">
                    <div  class="col comp-grid" >
                        <div class="flex align-items-center">
                            <filter-tags :controller="page.filterController" />
                        </div>
                        <div >
                            <template v-if="showBreadcrumbs && $route.query.tag && !isSubPage">
                                <Breadcrumb :home="{icon: 'pi pi-home', to: '/audits'}" :model="pageBreadCrumb" />
                            </template>
                            <!-- page records template -->
                            <div class="page-records"  >
                                <DataTable :lazy="true"   :loading="loading"     :value="records" dataKey="id" @sort="onSort($event)" class=" table-hover table-striped" :showGridlines="false" :rowHover="true" responsiveLayout="stack">
                                    <Column  field="id" header="Id" >
                                        <template #body="{data}">
                                            <router-link :to="`/audits/view/${data.id}`">
                                                {{ data.id }}
                                            </router-link>
                                        </template>
                                    </Column>
                                    <Column  field="user_type" header="User Type" >
                                        <template #body="{data}">
                                            {{ data.user_type }}
                                        </template>
                                    </Column>
                                    <Column  field="user_id" header="User Id" >
                                        <template #body="{data}">
                                            {{ data.user_id }}
                                        </template>
                                    </Column>
                                    <Column  field="event" header="Event" >
                                        <template #body="{data}">
                                            {{ data.event }}
                                        </template>
                                    </Column>
                                    <Column  field="auditable_type" header="Auditable Type" >
                                        <template #body="{data}">
                                            {{ data.auditable_type }}
                                        </template>
                                    </Column>
                                    <Column  field="auditable_id" header="Auditable Id" >
                                        <template #body="{data}">
                                            {{ data.auditable_id }}
                                        </template>
                                    </Column>
                                    <Column  field="old_values" header="Old Values" >
                                        <template #body="{data}">
                                            {{ data.old_values }}
                                        </template>
                                    </Column>
                                    <Column  field="new_values" header="New Values" >
                                        <template #body="{data}">
                                            {{ data.new_values }}
                                        </template>
                                    </Column>
                                    <Column  field="url" header="Url" >
                                        <template #body="{data}">
                                            {{ data.url }}
                                        </template>
                                    </Column>
                                    <Column  field="ip_address" header="Ip Address" >
                                        <template #body="{data}">
                                            {{ data.ip_address }}
                                        </template>
                                    </Column>
                                    <Column  field="user_agent" header="User Agent" >
                                        <template #body="{data}">
                                            {{ data.user_agent }}
                                        </template>
                                    </Column>
                                    <Column  field="tags" header="Tags" >
                                        <template #body="{data}">
                                            {{ data.tags }}
                                        </template>
                                    </Column>
                                    <Column  field="created_at" header="Created At" >
                                        <template #body="{data}">
                                            {{ data.created_at }}
                                        </template>
                                    </Column>
                                    <Column  field="updated_at" header="Updated At" >
                                        <template #body="{data}">
                                            {{ data.updated_at }}
                                        </template>
                                    </Column>
                                    <Column  headerStyle="width: 2rem" headerClass="text-center">
                                        <template #body="{data}">
                                            <div class="flex justify-content-end">
                                                <SplitButton dropdownIcon="pi pi-bars" class="p-button dropdown-only p-button-text p-button-plain" :model="getActionMenuModel(data)">
                                                    <i></i>
                                                </SplitButton>
                                            </div>
                                        </template>
                                    </Column>
                                </DataTable>
                            </div>
                            <!-- page loading indicator -->
                            <template v-if="loading">
                            </template>
                            <!-- end of page loading indicator-->
                            <!-- Empty record -->
                            <template v-if="pageReady && !records.length">
                                <div class="p-3 my-3 text-500 text-lg font-medium text-center">
                                    ningún record fue encontrado
                                </div>
                            </template>
                            <!-- end of empty record-->
                            <!-- pagination component-->
                            <template v-if="showFooter && pageReady">
                                <div class="grid justify-content-between align-items-center">
                                    <div class="flex justify-content-center flex-grow-0">
                                    </div>
                                    <div v-if="paginate && totalPages > 1" class="flex-grow-1">
                                        <Paginator class="border-none bg-transparent py-3" :first="recordsPosition - 1" @page="(event)=>{pagination.page = event.page + 1}" :rows="pagination.limit" :totalRecords="totalRecords">
                                            <template #start>
                                                <span class="text-sm text-gray-500 px-2">
                                                Archivos <b>{{ recordsPosition }} de {{ totalRecords }}</b>
                                                </span>
                                            </template>
                                            <template #end>
                                            </template>
                                        </Paginator>
                                    </div>
                                </div>
                            </template>
                            <!-- end of pagination component-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<script setup>
	import {   toRefs, onMounted } from 'vue';
	import { usePageStore } from 'src/store/page';
	import { useApp } from 'src/composables/app.js';
	import { useAuth } from 'src/composables/auth';
	import { useListPage } from 'src/composables/listpage.js';
	
	const props = defineProps({
		primaryKey : {
			type : String,
			default : 'id',
		},
		pageStoreKey: {
			type: String,
			default: 'AUDITS',
		},
		pageName: {
			type: String,
			default : 'audits',
		},
		routeName: {
			type: String,
			default: 'auditslist',
		},
		apiPath: {
			type: String,
			default: 'audits/index',
		},
		autoLoad: {
			type: Boolean,
			default: true,
		},
		enableCache: {
			type: Boolean,
			default: true,
		},
		paginate: {
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
		showBreadcrumbs: {
			type: Boolean,
			default: true,
		},
		exportButton: {
			type: Boolean,
			default: true,
		},
		importButton: {
			type: Boolean,
			default: false,
		},
		multiCheckbox: {
			type: Boolean,
			default: false,
		},
		page: {
			type: Number,
			default: 1,
		},
		limit: {
			type: Number,
			default: 10,
		},
		mergeRecords: { // for infinite loading
			type: Boolean,
			default: false,
		},
		search: {
			type: String,
			default: '',
		},
		fieldName: null,
		fieldValue: null,
		queryParams: { 
			type: Object,
			default: () => ({})
		},
		sortBy: {
			type: String,
			default: '',
		},
		sortType: {
			type: String,
			default: 'desc', //desc or asc
		},
		isSubPage: {
			type: Boolean,
			default: false,
		},
		emptyRecordMsg: {
			type: String,
			default: "ningún record fue encontrado",
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
		filterTagClass: {
			type: String,
			default: 'surface-card p-2 text-500 flex-grow-1 text-center m-1 mb-3 flex-grow-1 text-center',
		}
	});
	
	const app = useApp();
	const auth = useAuth();
	
	const defaultStoreState = {
		filters: {
			search: {
				tag: "Search",
				value: '',
				valueType: 'single',
				options: [],
			}
		},
		pagination: {
			page: props.page,
			limit: props.limit,
			sortBy: props.sortBy,
			sortType: props.sortType
		},
		primaryKey: props.primaryKey,
		enableCache: props.enableCache
	}
	const store = usePageStore(props.pageStoreKey,  defaultStoreState);
	
	// page hooks where logics resides
	const page = useListPage({ store, props });
	
	const {records, filters,  totalRecords,  selectedItems,  pagination,} = toRefs(store.state);
	const { pageReady, loading, } = toRefs(page.state);
	
	const {  pageBreadCrumb,   totalPages, recordsPosition, } = page.computedProps;
	
	const { load,    exportPage, debounce, onSort,  deleteItem,    } = page.methods;
	
	function getActionMenuModel(data){
		return [
		{
			label: "View",
			to: `/audits/view/${data.id}`,
			icon: "pi pi-eye",
			visible: auth.canView('audits/view')
		},
		{
			label: "Edit",
			to: `/audits/edit`,
			icon: "pi pi-pencil"
		},
		{
			label: "Delete",
			to: `/audits/delete`,
			icon: "pi pi-trash"
		}
	]
	}
	
	onMounted(()=>{ 
		const pageTitle = "Audits";
		app.setPageTitle(props.routeName, pageTitle);
	});
</script>
<style scoped>
</style>
