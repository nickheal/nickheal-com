<template>
  <nuxt-link :to="link" class="core-nav__link" :class="activityState">
    <coveringletter-icon
      v-if="icon === 'coveringletter'"
      :color-mode="iconColor"
    />
    <cv-icon v-else-if="icon === 'cv'" :color-mode="iconColor" />
    <contact-icon v-else-if="icon === 'contact'" :color-mode="iconColor" />
    <p>{{ content }}</p>
  </nuxt-link>
</template>

<script>
import CoveringletterIcon from '~/components/active-icons/coveringletter-icon.vue'
import CvIcon from '~/components/active-icons/cv-icon.vue'
import ContactIcon from '~/components/active-icons/contact-icon.vue'

export default {
  components: {
    CoveringletterIcon,
    CvIcon,
    ContactIcon
  },

  props: {
    link: {
      required: true,
      type: String
    },
    content: {
      required: true,
      type: String
    },
    icon: {
      required: true,
      type: String
    },
    mode: {
      required: true,
      type: String
    },
    active: {
      required: true,
      type: Boolean
    }
  },

  computed: {
    activityState() {
      if (this.mode === 'expanded') {
        return ''
      } else if (this.active === true) {
        return 'is-active'
      } else {
        return 'is-inactive'
      }
    },

    iconColor() {
      return this.mode === 'compressed' ? 'white' : 'natural'
    }
  }
}
</script>

<style lang="scss" scoped>
@import './assets/style/config';

.core-nav__link {
  position: relative;
  z-index: 0;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  width: 90%;
  font-family: 'Montserrat';
  text-transform: uppercase;
  text-decoration: none;
  letter-spacing: 0.06em;
  background: $white;
  color: $pri;
  border-radius: 2em;
  margin: 1em 5% 0;
  padding: 1em 0;
  box-shadow: 0 0.1em 2em 0px rgba(0, 0, 0, 0.05);
  transition: background-color 500ms, border-radius 500ms, color 500ms,
    box-shadow 100ms ease-in-out;

  &::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    width: 100%;
    height: 100%;
    border: solid 0.25em $pri;
    border-radius: 2em;
    opacity: 0;
    animation: button-pulse 10s infinite;
  }

  &.is-active,
  &.is-inactive {
    &::before {
      content: none;
    }
  }

  @for $i from 1 through 3 {
    &:nth-child(#{$i}) {
      &::before {
        animation-delay: #{$i * 500}ms;
      }
    }
  }

  &:hover {
    box-shadow: 0 0.1em 0.5em 0px rgba(0, 0, 0, 0.15);
  }

  img {
    display: block;
    width: 25%;
    margin: 0 15%;
  }

  p {
    width: 35%;
    text-align: left;
  }

  &.is-inactive {
    .coveringletter-icon,
    .cv-icon,
    .contact-icon,
    p {
      opacity: 0.3;
    }
  }

  &.is-active,
  &.is-inactive {
    background: transparent;
    color: $white;
    border-radius: 0;
    width: 33.333%;
    margin: 0;
    box-shadow: none;

    p {
      width: 100%;
      text-align: center;
    }
  }

  &:last-child {
    margin-right: 0;
  }
}

.coveringletter-icon,
.cv-icon,
.contact-icon {
  width: 25%;
  margin: 0 15%;
  transition: width 300ms;
}

.is-active,
.is-inactive {
  .coveringletter-icon,
  .cv-icon,
  .contact-icon {
    margin: 0 auto;
    width: 21px;
  }
}

@keyframes button-pulse {
  0% {
    opacity: 1;
    transform: scale(1);
  }
  10%,
  100% {
    opacity: 0;
    transform: scale(1.1);
  }
}

@media (min-width: $tablet-small) {
  .core-nav__link {
    display: block;
    width: 20%;
    margin: 0 5%;
    padding: 2em 0;
    transition: all 500ms;

    &:first-child {
      margin-left: 10%;
    }
    &:last-child {
      margin-right: 10%;
    }

    &.is-active,
    &.is-inactive {
      padding: 0.7em 0 0.5em;

      &:first-child,
      &:last-child {
        margin: 0;
      }
    }

    img {
      margin: 0 auto 2em;
    }

    p {
      width: 70%;
      margin: 0 auto;
      text-align: center;
    }

    .page-leave-active & {
      transition: transform 400ms cubic-bezier(0.68, -0.55, 0.265, 1.55);

      @for $i from 1 through 5 {
        &:nth-child(#{$i}) {
          transition-delay: #{($i - 1) * 100}ms;
        }
      }
    }
    .page-leave-to & {
      transform: translateY(-100%);
    }
  }

  .coveringletter-icon,
  .cv-icon,
  .contact-icon {
    margin: 0 auto 1em;
  }
}
</style>
