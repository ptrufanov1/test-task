<script>

export default {
    name: 'App',
    data() {
        return {
            form: {
                name: '',
                phone: '',
                message: '',
            },
            errors: {
                name: '',
                phone: '',
                message: '',
            },
            loading: false,
        }
    },
    methods: {
        send() {
            if (this.loading) {
                return;
            }

            this.loading = true

            axios('/api/feedback', {
                method: 'POST',
                data: this.form
            })
                .then(({data: { success }}) => {
                    if (success) {
                        this.resetForm();
                        alert('Форма успешно отправлена')
                    } else {
                        alert('Неизвестная ошибка отправки формы')
                    }
                })
                .catch(({response: { data }}) => {
                    if (data.errors) {
                        this.errors = Object.fromEntries(Object.entries(data.errors).map(([key, messages]) => [key, messages[0]] ))
                    } else {
                        alert('Неизвестная ошибка отправки формы')
                    }
                })
                .finally(() => this.loading = false)
        },
        hasError(fieldName) {
          return this.errors.hasOwnProperty(fieldName) && this.errors[fieldName]
        },
        errorMessage(fieldName) {
            return this.hasError(fieldName)? this.errors[fieldName]: ''
        },
        resetForm() {
            this.form = {
                name: '',
                phone: '',
                message: '',
            }
            this.errors = {
                name: '',
                phone: '',
                message: '',
            }
        }
    }
}
</script>

<template>

    <section class="bg-gray-900 rounded-lg border border-gray-300 px-12">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-8 text-4xl tracking-tight font-extrabold text-center text-white">Форма обратной связи</h2>
            <form action="#" ref="form" class="space-y-8">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-300">Как вас зовут</label>
                    <input :class="{'!border-red-700': hasError('name')}" v-model="form.name" autofocus tabindex="1" type="text" id="name" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500 shadow-sm-light" placeholder="Ваше имя">
                    <p class="mt-2 text-red-700 text-sm" v-if="hasError('name')">{{ errorMessage('name') }}</p>
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-300">Телефон</label>
                    <input :class="{'!border-red-700': hasError('phone')}" v-model="form.phone" type="text" tabindex="2" id="phone" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500 shadow-sm-light" placeholder="+7 ">
                    <p class="mt-2 text-red-700 text-sm" v-if="hasError('phone')">{{ errorMessage('phone') }}</p>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-400">Текс обращения</label>
                    <textarea :class="{'!border-red-700': hasError('message')}" v-model="form.message" tabindex="3" id="message" rows="6" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500 shadow-sm-light" placeholder="Сообщение ..."></textarea>
                    <p class="mt-2 text-red-700 text-sm" v-if="hasError('message')">{{ errorMessage('message') }}</p>
                </div>
                <button @click.prevent="send" type="submit" tabindex="4" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg sm:w-fit focus:ring-4 focus:outline-none bg-primary-600 hover:bg-primary-700 focus:ring-primary-800">Отправить</button>
            </form>
        </div>
    </section>

</template>

<style scoped>

</style>
