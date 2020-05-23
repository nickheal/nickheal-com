<template>
  <nav class="core-nav" :class="{ 'is-active': currentPage.length }">
    <NavButton
      content="Covering letter"
      link="/covering-letter"
      icon="coveringletter"
      :mode="currentPage.length ? 'compressed' : 'expanded'"
      :active="currentPage === 'covering-letter' ? true : false"
    />
    <NavButton
      content="CV"
      link="/cv"
      icon="cv"
      :mode="currentPage.length ? 'compressed' : 'expanded'"
      :active="currentPage === 'cv' ? true : false"
    />
    <NavButton
      content="Contact"
      link="/contact"
      icon="contact"
      :mode="currentPage.length ? 'compressed' : 'expanded'"
      :active="currentPage === 'contact' ? true : false"
    />
  </nav>
</template>

<script>
import NavButton from '~/components/NavButton.vue'

export default {
  transition: 'main-nav',

  components: {
    NavButton,
  },

  data() {
    return {
      route: this.$route.path,
    }
  },

  computed: {
    currentPage() {
      return this.$route.path.substring(1, this.$route.path.length)
    },
  },
}
</script>

<style lang="scss" scoped>
@import './assets/style/config';

.core-nav {
  display: flex;
  flex-wrap: wrap;
  transition: height 300ms, background 300ms;

  &.is-active {
    background: $pri;
  }
}

@media (min-width: $tablet-small) {
  .core-nav {
    flex-wrap: nowrap;
    align-items: center;
    height: 100vh;

    &.is-active {
      height: 67px;
    }
  }
}
</style>
