<template>
    <div :class="'form-group '+clases">
      <label class="form-control-label" :for="id">{{ label }} <span class="text-danger" v-if="required">*</span></label>
      <input type="text"
        class="form-control"
        :class="validate?'':'is-invalid'"
        :id="id" :placeholder="label"
        :required="required"
        v-bind:value="modelo"
        v-on:input="change($event.target.value)"
        v-if="!textArea"
        @blur="changeFocus"
      >
      <textarea
        class="form-control"
        :class="validate?'':'is-invalid'"
        :id="id" :placeholder="label"
        :value="modelo"
        :required="required"
        v-on:input="change($event.target.value)"
        v-if="textArea"
      >
      </textarea>
      <div class="invalid-feedback">
        {{(!validate&&valorActual.length>0) ? errorMsg : requiredMsg}}
      </div>
    </div>
</template>
<script>
    export default {
      data: function () {
        return {
          validator : null,
          validate : true,
          valorActual : ''
        }
      },
        props : {
            label: String,
            id: String,
            pattern: String,
            errorMsg: String,
            requiredMsg: String,
            required: Boolean,
            modelo: [String, Number],
            clases: String,
            textArea: Boolean
        },
        mounted(){
          eventBus.$on('validar',  () => {
            this.changeFocus();
          });

          switch(this.pattern){
            case 'num':
              this.validator = RegExp("^[0-9 ]+[0-9]+$")
              break;
            case 'alf':
              this.validator = RegExp("^[ a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$");
              break;
            case 'email':
              this.validator = RegExp("^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$");
              break;
            case 'all':
              this.validator = RegExp('.+');
              break;
            case 'url':
              this.validator = /^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/;
              break;
            default:
              this.validator = RegExp(this.pattern);
          }
        },
        methods: {
          change(val){
            this.validate = this.validator.test(val);
            this.valorActual = val;
            if (!this.required && val.trim().length < 1) {
              this.validate = true;
            }
            this.$emit('changeinput', val);
          },
          changeFocus(){
            this.validate = this.validator.test(this.valorActual);
            if (!this.required && val.trim().length < 1) {
              this.validate = true;
            }
          }
        }
    }
</script>