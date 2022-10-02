import { createWebHistory, createRouter } from 'vue-router'
import store from '@/store'
import DashboardComponent from "@/components/admin/dashboard/DashboardComponent";
import LaboratoriesComponent from "@/components/admin/laboratories/LaboratoriesComponent";
import CreateLaboratoryComponent from "@/components/admin/laboratories/CreateLaboratoryComponent";

/* Guest Component */
const Login = () => import('@/components/admin/auth/auth/LoginComponent')
const Register = () => import('@/components/Register.vue')
/* Guest Component */

/* Layouts */
const Dashboard = () => import('@/components/admin/dashboard/DashboardComponent.vue')
/* Layouts */



const routes = [
    {
        name: "login",
        path: "/admin/login",
        component: Login,
        meta: {
            middleware: "guest",
            title: `Login`
        }
    },
    {
        name: "dashboard",
        path: '/admin/dashboard',
        component: Dashboard,
        meta: {
            middleware: "auth"
        }
    },
    {
        name: "labs",
        path: '/admin/laboratories',
        component: LaboratoriesComponent,
        meta: {
            middleware: "auth"
        }
    },
    {
        name: "create-lab",
        path: '/admin/laboratory/create',
        component: CreateLaboratoryComponent,
        meta: {
            middleware: "auth"
        }
    },

    // {
    //     path: "/admin/",
    //     component: DahboardLayout,
    //     meta: {
    //         middleware: "auth"
    //     },
    //     children: [
    //         {
    //             name: "dashboard",
    //             path: '/admin/dashboard',
    //             component: Dashboard,
    //             meta: {
    //                 title: `Dashboard`
    //             }
    //         }
    //     ]
    // }
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.meta.middleware === "guest") {
        if (store.state.auth.authenticated) {
            next({ name: "dashboard" })
        }
        next()
    } else {
        if (store.state.auth.authenticated) {
            next()
        } else {
            next({ name: "login" })
        }
    }
})

export default router
