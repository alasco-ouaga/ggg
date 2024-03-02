<template>
    <div class="note note-warning" v-if="!verified">
        <p>
            Votre licence est invalide, veuillez contacter le support. Si vous n'avez pas configuré de code de licence, veuillez vous rendre sur
            <a :href="settingUrl">Settings</a> pour activer votre licence!
        </p>
    </div>
</template>

<script>
export default {
    props: {
        verifyUrl: {
            type: String,
            default: () => null,
            required: true,
        },
        settingUrl: {
            type: String,
            default: () => null,
            required: true,
        },
    },

    data() {
        return {
            verified: true,
        }
    },
    mounted() {
        this.verifyLicense()
    },

    methods: {
        verifyLicense() {
            axios.get(this.verifyUrl).then((res) => {
                if (res.data.error) {
                    this.verified = false
                }
            })
        },
    },
}
</script>
