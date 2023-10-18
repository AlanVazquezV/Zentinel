
export const AppMenus = {
    
	navbarTopRight: [],
	navbarTopLeft: [],
	navbarSideLeft: [
  {
    "to": "/home",
    "label": "Home",
    "icon": "pi pi-th-large text-primary",
    "iconcolor": "",
    "target": "",
    
  },
  {
    "to": "/users",
    "label": "Usuarios",
    "icon": "pi pi-user text-primary",
    "iconcolor": "",
    "target": "",
    
  },
  {
    "to": "/employees",
    "label": "Empleados",
    "icon": "pi pi-users text-primary",
    "iconcolor": "",
    "target": "",
    
  },
  {
    "to": "/attendance",
    "label": "Asistencia",
    "icon": "pi pi-check-circle text-primary",
    "iconcolor": "",
    "target": "",
    
  },
  {
    "to": "/incidents",
    "label": "Incidencias",
    "icon": "pi pi-times-circle text-primary",
    "iconcolor": "",
    "target": "",
    
  },
  {
    "to": "",
    "label": "Administracion",
    "icon": "pi pi-cog text-primary",
    "iconcolor": "",
    "target": "",
    "items": [
      {
        "to": "/positions",
        "label": "Posiciones",
        "icon": "pi pi-sitemap",
        "iconcolor": "",
        "target": "",
        
      },
      {
        "to": "/workinghours",
        "label": "Horas Trabajadas",
        "icon": "pi pi-stopwatch",
        "iconcolor": "",
        "target": "",
        
      },
      {
        "to": "/schedules",
        "label": "Horarios",
        "icon": "pi pi-clock",
        "iconcolor": "",
        "target": "",
        
      },
      {
        "to": "/biometrics",
        "label": "Biometricos",
        "icon": "pi pi-user-edit",
        "iconcolor": "",
        "target": "",
        
      },
      {
        "to": "/biometrictypes",
        "label": "Tipos de biometricos",
        "icon": "pi pi-list",
        "iconcolor": "",
        "target": "",
        
      }
    ]
  },
  {
    "to": "",
    "label": "Estatus",
    "icon": "pi pi-bookmark-fill text-primary",
    "iconcolor": "",
    "target": "",
    "items": [
      {
        "to": "/schedulesstatus",
        "label": "Schedules Status",
        "icon": "pi pi-bookmark",
        "iconcolor": "",
        "target": "",
        
      },
      {
        "to": "/positionsstatus",
        "label": "Positions Status",
        "icon": "pi pi-bookmark",
        "iconcolor": "",
        "target": "",
        
      },
      {
        "to": "/incidentsstatus",
        "label": "Incidents Status",
        "icon": "pi pi-bookmark",
        "iconcolor": "",
        "target": "",
        
      },
      {
        "to": "/employeestatus",
        "label": "Employee Status",
        "icon": "pi pi-bookmark",
        "iconcolor": "",
        "target": "",
        
      },
      {
        "to": "/biometricstatus",
        "label": "Biometric Status",
        "icon": "pi pi-bookmark",
        "iconcolor": "",
        "target": "",
        
      },
      {
        "to": "/attendancestatus",
        "label": "Attendance Status",
        "icon": "pi pi-bookmark",
        "iconcolor": "",
        "target": "",
        
      }
    ]
  },
  {
    "to": "",
    "label": "Permisos",
    "icon": "pi pi-unlock text-primary",
    "iconcolor": "",
    "target": "",
    "items": [
      {
        "to": "/permissions",
        "label": "Permissions",
        "icon": "pi pi-lock-open",
        "iconcolor": "",
        "target": "",
        
      },
      {
        "to": "/role",
        "label": "Role",
        "icon": "pi pi-tags",
        "iconcolor": "",
        "target": "",
        
      }
    ]
  },
  {
    "to": "/audits",
    "label": "Audits",
    "icon": "pi pi-th-large text-primary",
    "iconcolor": "",
    "target": "",
    
  }
],

    exportFormats: {
        print: {
			label: 'Print',
            icon: 'pi pi-print',
            type: 'print',
            ext: 'print',
        },
        pdf: {
			label: 'Pdf',
			
            icon: 'pi pi-file-pdf',
            type: 'pdf',
            ext: 'pdf',
        },
        excel: {
			label: 'Excel',
            icon: 'pi pi-file-excel',
            type: 'excel',
            ext: 'xlsx',
        },
        csv: {
			label: 'Csv',
            icon: 'pi pi-table',
            type: 'csv',
            ext: 'csv',
        },
    },
    
}