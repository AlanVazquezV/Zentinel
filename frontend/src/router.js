
import { createRouter, createWebHashHistory } from 'vue-router';

import { useAuth } from 'src/composables/auth';


function passRouteToProps(route){
	return {
		queryParams: route.query,
		fieldName: route.params.fieldName, 
		fieldValue: route.params.fieldValue
	}
}


let routes = [
	//Dashboard routes


//attendance routes
			{
				path: '/attendance/:fieldName?/:fieldValue?',
				name: 'attendancelist',
				component: () => import('./pages/attendance/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/attendance/view/:id', 
				name: 'attendanceview', 
				component: () => import('./pages/attendance/view.vue'), 
				props: true
			},
		
			{ 
				path: '/attendance/add', 
				name: 'attendanceadd', 
				component: () => import('./pages/attendance/add.vue'), 
				props: true
			},
	
			{ 
				path: '/attendance/edit/:id', 
				name: 'attendanceedit', 
				component: () => import('./pages/attendance/edit.vue'), 
				props: true
			},
		

//attendancestatus routes
			{
				path: '/attendancestatus/:fieldName?/:fieldValue?',
				name: 'attendancestatuslist',
				component: () => import('./pages/attendancestatus/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/attendancestatus/view/:id', 
				name: 'attendancestatusview', 
				component: () => import('./pages/attendancestatus/view.vue'), 
				props: true
			},
		
			{ 
				path: '/attendancestatus/add', 
				name: 'attendancestatusadd', 
				component: () => import('./pages/attendancestatus/add.vue'), 
				props: true
			},
	
			{ 
				path: '/attendancestatus/edit/:id', 
				name: 'attendancestatusedit', 
				component: () => import('./pages/attendancestatus/edit.vue'), 
				props: true
			},
		

//audits routes
			{
				path: '/audits/:fieldName?/:fieldValue?',
				name: 'auditslist',
				component: () => import('./pages/audits/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/audits/view/:id', 
				name: 'auditsview', 
				component: () => import('./pages/audits/view.vue'), 
				props: true
			},
		

//biometrics routes
			{
				path: '/biometrics/:fieldName?/:fieldValue?',
				name: 'biometricslist',
				component: () => import('./pages/biometrics/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/biometrics/view/:id', 
				name: 'biometricsview', 
				component: () => import('./pages/biometrics/view.vue'), 
				props: true
			},
		
			{ 
				path: '/biometrics/add', 
				name: 'biometricsadd', 
				component: () => import('./pages/biometrics/add.vue'), 
				props: true
			},
	
			{ 
				path: '/biometrics/edit/:id', 
				name: 'biometricsedit', 
				component: () => import('./pages/biometrics/edit.vue'), 
				props: true
			},
		

//biometricstatus routes
			{
				path: '/biometricstatus/:fieldName?/:fieldValue?',
				name: 'biometricstatuslist',
				component: () => import('./pages/biometricstatus/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/biometricstatus/view/:id', 
				name: 'biometricstatusview', 
				component: () => import('./pages/biometricstatus/view.vue'), 
				props: true
			},
		
			{ 
				path: '/biometricstatus/add', 
				name: 'biometricstatusadd', 
				component: () => import('./pages/biometricstatus/add.vue'), 
				props: true
			},
	
			{ 
				path: '/biometricstatus/edit/:id', 
				name: 'biometricstatusedit', 
				component: () => import('./pages/biometricstatus/edit.vue'), 
				props: true
			},
		

//biometrictypes routes
			{
				path: '/biometrictypes/:fieldName?/:fieldValue?',
				name: 'biometrictypeslist',
				component: () => import('./pages/biometrictypes/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/biometrictypes/view/:id', 
				name: 'biometrictypesview', 
				component: () => import('./pages/biometrictypes/view.vue'), 
				props: true
			},
		
			{ 
				path: '/biometrictypes/add', 
				name: 'biometrictypesadd', 
				component: () => import('./pages/biometrictypes/add.vue'), 
				props: true
			},
	
			{ 
				path: '/biometrictypes/edit/:id', 
				name: 'biometrictypesedit', 
				component: () => import('./pages/biometrictypes/edit.vue'), 
				props: true
			},
		

//employees routes
			{
				path: '/employees/:fieldName?/:fieldValue?',
				name: 'employeeslist',
				component: () => import('./pages/employees/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/employees/view/:id', 
				name: 'employeesview', 
				component: () => import('./pages/employees/view.vue'), 
				props: true
			},
		
			{ 
				path: '/employees/add', 
				name: 'employeesadd', 
				component: () => import('./pages/employees/add.vue'), 
				props: true
			},
	
			{ 
				path: '/employees/edit/:id', 
				name: 'employeesedit', 
				component: () => import('./pages/employees/edit.vue'), 
				props: true
			},
		

//employeestatus routes
			{
				path: '/employeestatus/:fieldName?/:fieldValue?',
				name: 'employeestatuslist',
				component: () => import('./pages/employeestatus/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/employeestatus/view/:id', 
				name: 'employeestatusview', 
				component: () => import('./pages/employeestatus/view.vue'), 
				props: true
			},
		
			{ 
				path: '/employeestatus/add', 
				name: 'employeestatusadd', 
				component: () => import('./pages/employeestatus/add.vue'), 
				props: true
			},
	
			{ 
				path: '/employeestatus/edit/:id', 
				name: 'employeestatusedit', 
				component: () => import('./pages/employeestatus/edit.vue'), 
				props: true
			},
		

//incidents routes
			{
				path: '/incidents/:fieldName?/:fieldValue?',
				name: 'incidentslist',
				component: () => import('./pages/incidents/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/incidents/view/:id', 
				name: 'incidentsview', 
				component: () => import('./pages/incidents/view.vue'), 
				props: true
			},
		
			{ 
				path: '/incidents/add', 
				name: 'incidentsadd', 
				component: () => import('./pages/incidents/add.vue'), 
				props: true
			},
	
			{ 
				path: '/incidents/edit/:id', 
				name: 'incidentsedit', 
				component: () => import('./pages/incidents/edit.vue'), 
				props: true
			},
		

//incidentsstatus routes
			{
				path: '/incidentsstatus/:fieldName?/:fieldValue?',
				name: 'incidentsstatuslist',
				component: () => import('./pages/incidentsstatus/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/incidentsstatus/view/:id', 
				name: 'incidentsstatusview', 
				component: () => import('./pages/incidentsstatus/view.vue'), 
				props: true
			},
		
			{ 
				path: '/incidentsstatus/add', 
				name: 'incidentsstatusadd', 
				component: () => import('./pages/incidentsstatus/add.vue'), 
				props: true
			},
	
			{ 
				path: '/incidentsstatus/edit/:id', 
				name: 'incidentsstatusedit', 
				component: () => import('./pages/incidentsstatus/edit.vue'), 
				props: true
			},
		

//permissions routes
			{
				path: '/permissions/:fieldName?/:fieldValue?',
				name: 'permissionslist',
				component: () => import('./pages/permissions/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/permissions/view/:id', 
				name: 'permissionsview', 
				component: () => import('./pages/permissions/view.vue'), 
				props: true
			},
		
			{ 
				path: '/permissions/add', 
				name: 'permissionsadd', 
				component: () => import('./pages/permissions/add.vue'), 
				props: true
			},
	
			{ 
				path: '/permissions/edit/:id', 
				name: 'permissionsedit', 
				component: () => import('./pages/permissions/edit.vue'), 
				props: true
			},
		

//positions routes
			{
				path: '/positions/:fieldName?/:fieldValue?',
				name: 'positionslist',
				component: () => import('./pages/positions/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/positions/view/:id', 
				name: 'positionsview', 
				component: () => import('./pages/positions/view.vue'), 
				props: true
			},
		
			{ 
				path: '/positions/add', 
				name: 'positionsadd', 
				component: () => import('./pages/positions/add.vue'), 
				props: true
			},
	
			{ 
				path: '/positions/edit/:id', 
				name: 'positionsedit', 
				component: () => import('./pages/positions/edit.vue'), 
				props: true
			},
		

//positionsstatus routes
			{
				path: '/positionsstatus/:fieldName?/:fieldValue?',
				name: 'positionsstatuslist',
				component: () => import('./pages/positionsstatus/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/positionsstatus/view/:id', 
				name: 'positionsstatusview', 
				component: () => import('./pages/positionsstatus/view.vue'), 
				props: true
			},
		
			{ 
				path: '/positionsstatus/add', 
				name: 'positionsstatusadd', 
				component: () => import('./pages/positionsstatus/add.vue'), 
				props: true
			},
	
			{ 
				path: '/positionsstatus/edit/:id', 
				name: 'positionsstatusedit', 
				component: () => import('./pages/positionsstatus/edit.vue'), 
				props: true
			},
		

//role routes
			{
				path: '/role/:fieldName?/:fieldValue?',
				name: 'rolelist',
				component: () => import('./pages/role/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/role/view/:id', 
				name: 'roleview', 
				component: () => import('./pages/role/view.vue'), 
				props: true
			},
		
			{ 
				path: '/role/add', 
				name: 'roleadd', 
				component: () => import('./pages/role/add.vue'), 
				props: true
			},
	
			{ 
				path: '/role/edit/:id', 
				name: 'roleedit', 
				component: () => import('./pages/role/edit.vue'), 
				props: true
			},
		

//schedules routes
			{
				path: '/schedules/:fieldName?/:fieldValue?',
				name: 'scheduleslist',
				component: () => import('./pages/schedules/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/schedules/view/:id', 
				name: 'schedulesview', 
				component: () => import('./pages/schedules/view.vue'), 
				props: true
			},
		
			{ 
				path: '/schedules/add', 
				name: 'schedulesadd', 
				component: () => import('./pages/schedules/add.vue'), 
				props: true
			},
	
			{ 
				path: '/schedules/edit/:id', 
				name: 'schedulesedit', 
				component: () => import('./pages/schedules/edit.vue'), 
				props: true
			},
		

//schedulesstatus routes
			{
				path: '/schedulesstatus/:fieldName?/:fieldValue?',
				name: 'schedulesstatuslist',
				component: () => import('./pages/schedulesstatus/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/schedulesstatus/view/:id', 
				name: 'schedulesstatusview', 
				component: () => import('./pages/schedulesstatus/view.vue'), 
				props: true
			},
		
			{ 
				path: '/schedulesstatus/add', 
				name: 'schedulesstatusadd', 
				component: () => import('./pages/schedulesstatus/add.vue'), 
				props: true
			},
	
			{ 
				path: '/schedulesstatus/edit/:id', 
				name: 'schedulesstatusedit', 
				component: () => import('./pages/schedulesstatus/edit.vue'), 
				props: true
			},
		

//users routes
			{
				path: '/users/:fieldName?/:fieldValue?',
				name: 'userslist',
				component: () => import('./pages/users/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/users/view/:id', 
				name: 'usersview', 
				component: () => import('./pages/users/view.vue'), 
				props: true
			},
		
			{ 
				path: '/account/edit', 
				name: 'usersaccountedit', 
				component: () => import('./pages/account/accountedit.vue'), 
				props: true
			},
	
			{ 
				path: '/account', 
				name: 'usersaccountview', 
				component: () => import('./pages/account/accountview.vue'), 
				props: true
			},
	
			{ 
				path: '/users/add', 
				name: 'usersadd', 
				component: () => import('./pages/users/add.vue'), 
				props: true
			},
	
			{ 
				path: '/users/edit/:id', 
				name: 'usersedit', 
				component: () => import('./pages/users/edit.vue'), 
				props: true
			},
		

//workinghours routes
			{
				path: '/workinghours/:fieldName?/:fieldValue?',
				name: 'workinghourslist',
				component: () => import('./pages/workinghours/list.vue'), 
				props: route => passRouteToProps(route)
			},
	
			{ 
				path: '/workinghours/view/:id', 
				name: 'workinghoursview', 
				component: () => import('./pages/workinghours/view.vue'), 
				props: true
			},
		
			{ 
				path: '/workinghours/add', 
				name: 'workinghoursadd', 
				component: () => import('./pages/workinghours/add.vue'), 
				props: true
			},
	
			{ 
				path: '/workinghours/edit/:id', 
				name: 'workinghoursedit', 
				component: () => import('./pages/workinghours/edit.vue'), 
				props: true
			},
		

	
	
	
	
	{ 
		path:  '/error/forbidden', 
		name: 'forbidden', 
		component: () => import('./pages/errors/forbidden.vue'),
		props: true
	},
	{ 
		path: '/error/notfound', 
		name: 'notfound',
		component: () => import('./pages/errors/pagenotfound.vue'),
		props: true
	},
	{
		path: '/:catchAll(.*)', 
		component: () => import('./pages/errors/pagenotfound.vue')
	}
];

export default () => {
	
const auth = useAuth();

	
	const user = auth.user;
	if(user){
		routes.push({ path: '/', alias: '/home', name: 'home', component: () => import(`./pages/home/home.vue`) });
	}
	else{
		routes.push({ path: '/', alias: '/index', name: 'index', component: () => import('./pages/index/index.vue') });
	}

	const router = createRouter({
		history: createWebHashHistory(),
		routes,
		scrollBehavior(to, from, savedPostion){
			if(savedPostion) return savedPostion;
			return { top:0 }
		}
	});
	
	router.beforeEach((to, from, next) => {
		const user = auth.user;
		let path = to.path;
		let authRequired = auth.pageRequiredAuth(path);
		if (authRequired) {
			if(!user){
				return next({ path: '/',  query: { nexturl: to.fullPath } });
			}
			//authorize user
			if (!auth.canView(path)) {
				return next({path: "/error/forbidden"});
			}
		}

		if(user && to.name == "index"){
			//already logged in, show home when try to access index page
			return next({ path: "/home"});
		}

		//navigate to redirect url if available
		if(to.name == "home" && to.query.nexturl){
			return next({ path: to.query.nexturl});
		}

 		//close dialog from previous page
		//store.closeDialogs('app/closeDialogs');
		
		next();
	});

	return router;
}
