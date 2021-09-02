<template>
    <div>
    <div class="modal  border-0 fade" :id="idModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg border-0 " >
    <div class="modal-content border-0">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{titleModal}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <slot></slot>
      </div>
    </div>
  </div>
    </div>
    </div>
</template>
<script>
export default {
    props:{
        titleModal:String,
        idModal:String
    },
}
</script>