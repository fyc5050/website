<template>
    <div class="relative py-6 md:py-8">
        <Popover>
            <Container class="px-6">
                <nav class="relative flex items-center space-x-8 sm:h-10" aria-label="Global">
                    <div class="items-center w-full sm:w-auto">
                        <div class="flex w-full items-center justify-between md:w-auto">
                            <inertia-link href="/">
                                <img :src="logoUrl" alt="Logo" class="w-12 h-auto" />
                            </inertia-link>

                            <div class="flex items-center md:hidden">
                                <PopoverButton class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-gray-400 transition focus:outline-none">
                                    <font-awesome-icon icon="fas fa-bars" class="h-6 w-6"/>
                                </PopoverButton>
                            </div>
                        </div>
                    </div>

                    <div class="hidden md:flex md:space-x-5">
                        <inertia-link
                            href="/"
                            class="text-sm text-gray-300 hover:text-gray-200 hover:bg-gray-800 px-3 py-2 rounded-lg transition"
                        >
                            Home
                        </inertia-link>

                        <DropdownMenu>
                            <template #toggle="{ toggle }">
                                <button @click="toggle" class="text-sm text-gray-300 hover:text-gray-200 hover:bg-gray-800 px-3 py-2 rounded-lg transition">
                                    Committee

                                    <font-awesome-icon icon="fas fa-chevron-down" class="w-4 h-4 inline-flex ml-1"/>
                                </button>
                            </template>

                            <DropdownItem href="/committee/about">
                                About Us
                            </DropdownItem>

                            <DropdownItem href="/committee/members">
                                Members
                            </DropdownItem>
                        </DropdownMenu>

                        <inertia-link
                            href="/news"
                            class="text-sm text-gray-300 hover:text-gray-200 hover:bg-gray-800 px-3 py-2 rounded-lg transition"
                        >
                            News
                        </inertia-link>

                        <inertia-link
                            href="/quote-quiz"
                            class="text-sm text-gray-300 hover:text-gray-200 hover:bg-gray-800 px-3 py-2 rounded-lg transition"
                        >
                            Quote Quiz
                        </inertia-link>
                    </div>
                </nav>
            </Container>

            <transition
                enter-active-class="duration-150 ease-out"
                enter-from-class="opacity-0 scale-95"
                enter-to-class="opacity-100 scale-100"
                leave-active-class="duration-100 ease-in"
                leave-from-class="opacity-100 scale-100"
                leave-to-class="opacity-0 scale-95"
            >
                <PopoverPanel
                    focus
                    class="absolute inset-x-0 top-0 z-10 origin-top-right transform p-2 transition md:hidden"
                >
                    <div class="overflow-hidden rounded-lg bg-gray-800 shadow-md ring-1 ring-black ring-opacity-5">
                        <div class="flex items-center justify-between px-5 pt-4">
                            <div>
                                <img :src="logoUrl" alt="50/50 logo" class="h-10 w-auto"/>
                            </div>

                            <div class="-mr-2">
                                <PopoverButton class="inline-flex items-center justify-center rounded-md bg-gray-700 p-2 text-gray-400 hover:bg-gray-600 transition focus:outline-none">
                                    <font-awesome-icon icon="fas fa-xmark" class="h-6 w-6"/>
                                </PopoverButton>
                            </div>
                        </div>

                        <div class="space-y-1 px-2 pt-2 pb-3">
                            <inertia-link href="/" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-gray-200">
                                Home
                            </inertia-link>

                            <inertia-link href="/committee/about" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-gray-200">
                                About Us
                            </inertia-link>

                            <inertia-link href="/committee/members" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-gray-200">
                                Members
                            </inertia-link>

                            <inertia-link href="/news" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-gray-200">
                                News
                            </inertia-link>
                        </div>
                    </div>
                </PopoverPanel>
            </transition>
        </Popover>
    </div>
</template>

<script lang="ts" setup>
import { Popover, PopoverPanel, PopoverButton } from "@headlessui/vue";
import DropdownMenu from "~/js/components/dropdown/DropdownMenu.vue";
import DropdownItem from "~/js/components/dropdown/DropdownItem.vue";
import Container from "~/js/components/Container.vue";
import logoUrl from "~/images/logo.png";
</script>
