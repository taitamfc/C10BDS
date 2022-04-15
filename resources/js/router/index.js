import { createRouter, createWebHistory } from 'vue-router'

//{ path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFound },
const LoginComponent = () => import('../components/users/LoginComponent.vue')
const ForgotPasswordComponent = () => import('../components/users/ForgotPasswordComponent.vue')
const ProfileComponent = () => import('../components/users/ProfileComponent.vue')
const ProfileUpdateComponent = () => import('../components/users/ProfileUpdateComponent.vue')
const ProfileChangePassComponent = () => import('../components/users/ProfileChangePassComponent.vue')
const HomeComponent = () => import('../components/HomeComponent.vue')
const ProductsComponent = () => import('../components/products/ProductsComponent.vue')
const ProductDetailComponent = () => import('../components/products/ProductDetailComponent.vue')
const CollaboratorsComponent = () => import('../components/collaborators/CollaboratorsComponent.vue')
const CollaboratorDetailComponent = () => import('../components/collaborators/CollaboratorDetailComponent.vue')
const NotificationsComponent = () => import('../components/notifications/NotificationsComponent.vue')

const routes = [
    {
        path: '/',
        name: 'home',
        meta: { requiresAuth: true },
        component: HomeComponent
    },
    {
        path: '/login',
        name: 'users.login',
        component: LoginComponent
    },
    {
        path: '/forgot-password',
        name: 'users.forgot-password',
        component: ForgotPasswordComponent
    },
    {
        path: '/profile',
        name: 'users.index',
        meta: { requiresAuth: true },
        component: ProfileComponent
    },
    {
        path: '/profile/update',
        name: 'users.update',
        meta: { requiresAuth: true },
        component: ProfileUpdateComponent
    },
    {
        path: '/profile/changepass',
        name: 'users.changepass',
        meta: { requiresAuth: true },
        component: ProfileChangePassComponent
    },
    {
        path: '/profile/changepass',
        name: 'users.logout',
        meta: { requiresAuth: true },
        component: ProfileUpdateComponent
    },
    {
        path: '/products',
        name: 'products.index',
        meta: { requiresAuth: true },
        component: ProductsComponent
    },
    {
        path: '/products/:id',
        name: 'products.show',
        meta: { requiresAuth: true },
        component: ProductDetailComponent
    },
    {
        path: '/collaborators',
        name: 'collaborators.index',
        meta: { requiresAuth: true },
        component: CollaboratorsComponent
    },
    {
        path: '/collaborators/:id',
        name: 'collaborators.show',
        meta: { requiresAuth: true },
        component: CollaboratorDetailComponent
    },
    {
        path: '/notifications',
        name: 'notifications.index',
        meta: { requiresAuth: true },
        component: NotificationsComponent
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})