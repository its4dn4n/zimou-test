<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<!-- <template>
    <Head title="Log in" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.remember" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Forgot your password?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
 -->
<template>
    <div class="content">
        <div class="container">
            <div class="row">
                <!-- Image Section -->
                <div class="col-md-6 order-md-2">
                    <img
                        src="@/assets/Delivery-pana.svg"
                        alt="Image"
                        class="img-fluid"
                    />
                </div>
                <!-- Form Section -->
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign In to <strong>Our App</strong></h3>
                                <p class="mb-4" style="width: 35em">
                                    Sign In to easily manage your orders, track
                                    deliveries, and enjoy faster checkouts
                                </p>
                            </div>
                            <form @submit.prevent="submit">
                                <div class="form-group first">
                                    <label v-if="!form.email" for="email"
                                        >Email</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.email"
                                        id="email"
                                    />
                                    <p
                                        class="mt-0 text-danger"
                                        style="font-size: small"
                                    >
                                        {{ form.errors.email }}
                                    </p>
                                </div>

                                <div class="form-group last mb-2">
                                    <label v-if="!form.password" for="password"
                                        >Password</label
                                    >
                                    <input
                                        type="password"
                                        class="form-control"
                                        v-model="form.password"
                                        id="password"
                                    />
                                    <p
                                        class="mt-0 mb-0 text-danger"
                                        style="font-size: small"
                                    >
                                        {{ form.errors.password }}
                                    </p>
                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label
                                        class="control control--checkbox mb-0"
                                    >
                                        <span class="caption">Remember Me</span>
                                        <input
                                            type="checkbox"
                                            v-model="form.remember"
                                        />
                                        <p
                                            class="mt-0 mb-0 text-danger"
                                            style="font-size: small"
                                        >
                                            {{ form.errors.remember }}
                                        </p>
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"
                                        ><a
                                            :href="route('register')"
                                            class="forgot-pass"
                                            >I don't have an account</a
                                        ></span
                                    >
                                </div>
                                <button
                                    type="submit"
                                    class="btn text-white btn-block"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Sign In
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
@import url("https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap");
@import url("@/pages/auth/fonts/icomoon/style.css");
@import url("@/pages/auth/css/owl.carousel.min.css");
@import url("@/pages/auth/css/bootstrap.min.css");
@import url("@/pages/auth/css/style.css");
</style>
