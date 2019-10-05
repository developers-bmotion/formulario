<template>
    <div :class="clases">
      <label :for="id">{{ label }}</label>
      <input type="text" 
        v-model="model" class="form-control" 
        :id="id" :placeholder="label" 
        :required="required"
      >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
</template>
<script>
    export default {
        props : {
            label: String,
            id: String,
            patther: String,
            errorMsg: String,
            requiredMsg: String,
            required: Boolean,
            model: [String, Number],
            clases: String
        }
    }
</script>