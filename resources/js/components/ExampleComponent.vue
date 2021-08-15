<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useMeta } from 'vue-meta'
export default {
  setup () {
    useMeta({
      title: 'About',
      htmlAttrs: { lang: 'en', amp: true }
    })
  },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
