<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<!-- <template>
    <Head title="Register" />



    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>






        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
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
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                        <div class="ms-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
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
                        src="@/assets/delivery.svg"
                        alt="Image"
                        class="img-fluid"
                    />
                </div>
                <!-- Form Section -->
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign Up to <strong>Our App</strong></h3>
                                <p class="mb-4" style="width: 35em">
                                    Sign Up to easily manage your orders, track
                                    deliveries, and enjoy faster checkouts
                                </p>
                            </div>
                            <form @submit.prevent="submit">
                                <div class="form-group first">
                                    <label v-if="!form.name" for="name"
                                        >Name</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.name"
                                        id="name"
                                    />
                                    <p
                                        class="mt-0 text-danger"
                                        style="font-size: small"
                                    >
                                        {{ form.errors.name }}
                                    </p>
                                </div>

                                <div class="form-group last mb-2">
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
                                        class="mt-0 mb-0 text-danger"
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

                                <div class="form-group last mb-2">
                                    <label
                                        v-if="!form.password_confirmation"
                                        for="password_confirmation"
                                        >Password Confirmation</label
                                    >
                                    <input
                                        type="password"
                                        class="form-control"
                                        v-model="form.password_confirmation"
                                        id="password_confirmation"
                                    />
                                    <p
                                        class="mt-0 mb-0 text-danger"
                                        style="font-size: small"
                                    >
                                        {{ form.errors.password_confirmation }}
                                    </p>
                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label
                                        class="control control--checkbox mb-0"
                                    >
                                        <span class="caption"
                                            >Terms of use</span
                                        >
                                        <input
                                            type="checkbox"
                                            v-model="form.terms"
                                        />
                                        <p
                                            class="mt-0 mb-0 text-danger"
                                            style="font-size: small"
                                        >
                                            {{ form.errors.terms }}
                                        </p>
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"
                                        ><a
                                            :href="route('login')"
                                            class="forgot-pass"
                                            >Already have an account</a
                                        ></span
                                    >
                                </div>
                                <button
                                    type="submit"
                                    class="btn text-white btn-block"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Sign Up
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
