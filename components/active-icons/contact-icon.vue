<template>
  <div class="contact-icon" :class="color">
    <div class="contact-icon__bar"></div>
    <div class="contact-icon__bar"></div>
    <div class="contact-icon__bar"></div>
    <div class="contact-icon__bar"></div>
    <div class="contact-icon__bar"></div>
    <div class="contact-icon__bar"></div>
    <div class="contact-icon__bar"></div>
  </div>
</template>

<script>
export default {
  props: {
    colorMode: {
      default: '',
      type: String
    }
  },

  computed: {
    color() {
      return this.colorMode
    }
  }
}
</script>

<style lang="scss" scoped>
@import './assets/style/config';

.contact-icon {
  display: flex;
  justify-content: center;

  &.white {
    .contact-icon__bar {
      background: $white;
    }
  }
}

.contact-icon__bar {
  width: 10%;
  height: 0;
  padding-bottom: 137%;
  margin-right: 5%;
  background: $pri;
  transition: background 300ms;
  animation: contact-animation 5s infinite;

  &:last-child {
    margin-right: 0;
  }

  @for $i from 1 through 7 {
    &:nth-child(#{$i}) {
      animation-delay: $i * -500ms;
    }
  }
}

@keyframes contact-animation {
  0% {
    transform: scaleY(1);
  }
  10% {
    transform: scaleY(0.2);
  }
  20% {
    transform: scaleY(0.3);
  }
  30% {
    transform: scaleY(0.7);
  }
  40% {
    transform: scaleY(0.1);
  }
  50% {
    transform: scaleY(0.4);
  }
  60% {
    transform: scaleY(0.2);
  }
  70% {
    transform: scaleY(0.8);
  }
  80% {
    transform: scaleY(1);
  }
  90% {
    transform: scaleY(0.2);
  }
  100% {
    transform: scaleY(0.6);
  }
}
</style>
