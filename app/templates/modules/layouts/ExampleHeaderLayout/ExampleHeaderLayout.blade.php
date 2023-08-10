<div class="tw-bg-white" id="exampleheaderlayout" v-cloak>
    <header class="tw-absolute tw-inset-x-0 tw-top-0 tw-z-50">
        <nav class="tw-flex tw-items-center tw-justify-between tw-p-6 lg:tw-px-8" aria-label="Global">
            <div class="tw-flex lg:tw-flex-1">
                <a href="#" class="tw--m-1.5 tw-p-1.5">
                    <span class="tw-sr-only">Your Company</span>
                    <img class="tw-h-8 tw-w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" />
                </a>
            </div>
            <div class="tw-flex lg:tw-hidden">
                <button type="button" class="tw--m-2.5 tw-inline-flex tw-items-center tw-justify-center tw-rounded-md tw-p-2.5 tw-text-gray-700" @click="mobileMenuOpen = true">
                    <span class="tw-sr-only">Open main menu</span>
                    <Bars3Icon class="tw-h-6 tw-w-6" aria-hidden="true" />
                </button>
            </div>
            <div class="tw-hidden lg:tw-flex lg:tw-gap-x-12">
                <a v-for="item in navigation" :key="item.name" :href="item.href" class="tw-text-sm tw-font-semibold tw-leading-6 tw-text-gray-900">@{{ item.name }}</a>
            </div>
            <div class="tw-hidden lg:tw-flex lg:tw-flex-1 lg:tw-justify-end">
                <a href="#" class="tw-text-sm tw-font-semibold tw-leading-6 tw-text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>
        <DialogElement as="div" class="lg:tw-hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
            <div class="tw-fixed tw-inset-0 tw-z-50" />
            <DialogPanel class="tw-fixed tw-inset-y-0 tw-right-0 tw-z-50 tw-w-full tw-overflow-y-auto tw-bg-white tw-px-6 tw-py-6 sm:tw-max-w-sm sm:tw-ring-1 sm:ring-gray-900/10">
                <div class="tw-flex tw-items-center tw-justify-between">
                    <a href="#" class="tw--m-1.5 tw-p-1.5">
                        <span class="tw-sr-only">Your Company</span>
                        <img class="tw-h-8 tw-w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" />
                    </a>
                    <button type="button" class="tw--m-2.5 tw-rounded-md tw-p-2.5 tw-text-gray-700" @click="mobileMenuOpen = false">
                        <span class="tw-sr-only">Close menu</span>
                        <XMarkIcon class="tw-h-6 tw-w-6" aria-hidden="true" />
                    </button>
                </div>
                <div class="tw-mt-6 tw-flow-root">
                    <div class="tw--my-6 tw-divide-y tw-divide-gray-500/10">
                        <div class="tw-space-y-2 tw-py-6">
                            <a v-for="item in navigation" :key="item.name" :href="item.href" class="tw--mx-3 tw-block tw-rounded-lg tw-px-3 tw-py-2 tw-text-base tw-font-semibold tw-leading-7 tw-text-gray-900 hover:tw-bg-gray-50">@{{ item.name }}</a>
                        </div>
                        <div class="tw-py-6">
                            <a href="#" class="tw--mx-3 tw-block tw-rounded-lg tw-px-3 tw-py-2.5 tw-text-base tw-font-semibold tw-leading-7 tw-text-gray-900 hover:tw-bg-gray-50">Log in</a>
                        </div>
                    </div>
                </div>
            </DialogPanel>
        </DialogElement>
    </header>
</div>