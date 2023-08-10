<script lang="ts">
import { defineComponent } from 'vue'

import { ref } from 'vue'
import { Dialog, DialogPanel } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'

export default defineComponent({
    components: {
        dialogelement: Dialog,
        dialogpanel: DialogPanel,
        bars3icon: Bars3Icon,
        xmarkicon: XMarkIcon
    },
    setup(){
        const navigation = [
            { name: 'Product', href: '#' },
            { name: 'Features', href: '#' },
            { name: 'Marketplace', href: '#' },
            { name: 'Company', href: '#' },
        ]

        const mobileMenuOpen = ref(false);

        return {
            navigation,
            mobileMenuOpen
        }
    }
})
</script>