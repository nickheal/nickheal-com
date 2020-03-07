<template>
  <div class="coveringletter-icon" :class="color">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      data-name="Layer 1"
      viewBox="0 0 151 178.5"
    >
      <title>covering-letter</title>
      <line
        class="header"
        x1="81"
        y1="5"
        x2="144.5"
        y2="5"
        style="fill:none;stroke:#777;stroke-linecap:round;stroke-miterlimit:10;stroke-width:10px"
      />
      <line
        class="bodytext"
        x1="28.5"
        y1="34"
        x2="143.5"
        y2="34"
        style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:15px"
      />
      <line
        class="bodytext"
        x1="28.5"
        y1="68"
        x2="143.5"
        y2="68"
        style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:15px"
      />
      <line
        class="bodytext"
        x1="28.5"
        y1="101"
        x2="143.5"
        y2="101"
        style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:15px"
      />
      <line
        class="bodytext"
        x1="28.5"
        y1="136"
        x2="143.5"
        y2="136"
        style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:15px"
      />
      <line
        class="bodytext"
        x1="28.5"
        y1="171"
        x2="143.5"
        y2="171"
        style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:15px"
      />
      <line
        class="sidebar"
        x1="25"
        y1="25"
        x2="25"
        y2="141"
        style="fill:none;stroke:#fff;stroke-linecap:round;stroke-miterlimit:10;stroke-width:50px"
      />
      <line
        class="sidebar"
        x1="25"
        y1="35"
        x2="25"
        y2="136"
        style="fill:none;stroke:#0F4F8D;stroke-linecap:round;stroke-miterlimit:10;stroke-width:30px"
      />
    </svg>
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

$animationDuration: 5000ms;

.header {
  transform-origin: center right;
  animation: horizontal-content-in 5s infinite;
}

.bodytext {
  transform-origin: center left;
  animation: horizontal-content-in $animationDuration infinite;
}

.white {
  line {
    stroke: $white !important;
  }
}

line {
  transition: stroke 300ms;

  @for $i from 1 through 10 {
    &:nth-child(#{$i}) {
      animation: horizontal-content-in-#{$i} $animationDuration infinite;
    }
  }

  &.sidebar {
    transform-origin: top center;
    animation-delay: 0;
    animation: vertical-content-in $animationDuration infinite;
  }
}

@for $i from 1 through 10 {
  @keyframes horizontal-content-in-#{$i} {
    0% {
      transform: scaleX(0);
      opacity: 1;
    }
    #{$i * 5 + 10}% {
      transform: scaleX(0);
    }
    90% {
      transform: scaleX(1);
      opacity: 1;
    }
    100% {
      opacity: 0;
    }
  }
}

@keyframes vertical-content-in {
  0% {
    transform: scaleY(0);
    opacity: 1;
  }
  95% {
    transform: scaleY(1);
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
</style>
