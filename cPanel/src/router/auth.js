import Login from "@/views/Auth/Login.vue";
import ForgotPassword from "@/views/Auth/ForgotPassword.vue";
// import Profile from "@/views/Auth/Profile.vue";
import ResetPassword from "@/views/Auth/ResetPassword.vue";

const authRoutes = [
    {
        path: "/login",
        name: "Login",
        component: Login
    },
    {
        path: "/forgot_password",
        name: "ForgotPassword",
        component: ForgotPassword
    },
    {
        path: "/reset_password",
        name: "ResetPassword",
        component: ResetPassword
    },
   
]

export default authRoutes;