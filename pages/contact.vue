<template>
  <main>
    <contact-icon />

    <nuxt-link to="/" class="back-button"></nuxt-link>

    <h1>Contact</h1>

    <transition name="form-change">
      <form
        v-if="
          !formSubmitSuccess &&
            !formSubmitNetworkIssue &&
            !formSubmitServerIssue
        "
        class="wrap"
        @submit.prevent="submitContactForm"
      >
        <label>
          Name
          <input v-model="formName" name="name" required />
        </label>
        <label>
          E-Mail
          <input v-model="formEmail" name="email" type="email" required />
        </label>
        <label>
          Message
          <textarea v-model="formMessage" name="message" required></textarea>
        </label>
        <button type="submit" class="button">Send</button>
      </form>
    </transition>

    <transition name="form-change">
      <div v-if="formSubmitSuccess" class="success-message wrap">
        <p class="result-message">Success, message sent!</p>
        <button class="button button--center" @click.prevent="resetForm">
          Send another?
        </button>
      </div>
    </transition>

    <transition name="form-change">
      <div v-if="formSubmitNetworkIssue" class="network-fail-message wrap">
        <p class="result-message">
          There was a network issue, you may not be connected to the internet!
        </p>
        <button class="button button--center" @click.prevent="resetForm">
          Try again
        </button>
      </div>
    </transition>

    <transition name="form-change">
      <div v-if="formSubmitServerIssue" class="server-fail-message wrap">
        <p class="result-message">
          Sorry, I&rsquo;m having a server issue, please try again.
        </p>
        <button class="button button--center" @click.prevent="resetForm">
          Try again
        </button>
      </div>
    </transition>
  </main>
</template>

<script>
import ContactIcon from '~/components/active-icons/contact-icon.vue'

export default {
  components: {
    ContactIcon
  },

  data() {
    return {
      formSubmitSuccess: false,
      formSubmitNetworkIssue: false,
      formSubmitServerIssue: false,

      formName: null,
      formEmail: null,
      formMessage: null
    }
  },

  methods: {
    submitContactForm() {
      fetch('http://34.242.28.118:3000/mailmaster.php', {
        method: 'POST',
        mode: 'cors',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          name: this.formName,
          email: this.formEmail,
          message: this.formMessage
        })
      })
        .then((res) => {
          if (res.ok) {
            this.formSubmitSuccess = true
          } else {
            this.formSubmitServerIssue = true
          }
        })
        .catch(() => {
          this.formSubmitNetworkIssue = true
        })
    },

    resetForm() {
      this.formSubmitSuccess = false
      this.formSubmitNetworkIssue = false
      this.formSubmitServerIssue = false
    }
  }
}
</script>

<style lang="scss" scoped>
@import './assets/style/config';

.contact-icon {
  width: 20%;
  margin: 0 auto 2em;
}

.back-button {
  margin-bottom: 1.5em;
  margin-left: -0.25em;
}

main {
  position: relative;
  width: 90%;
  margin: 2em auto;
}

.wrap {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  width: 100%;
  margin-bottom: 7em;
}

h1 {
  text-align: center;
}

p {
  margin-bottom: 1em;
}

.button {
  margin-left: -0.85em;
  margin-top: 0.25em;

  &--center {
    display: block;
    margin: {
      left: auto;
      right: auto;
    }
  }
}

.result-message {
  margin-top: 1.3em;
  margin-bottom: 1.65em;
  text-align: center;
  line-height: 1.4;
}

.form-change-enter-active {
  transition: transform 500ms, opacity 500ms;
  transform: translate(-50%, 0);
  opacity: 1;
}

.form-change-leave-active {
  transition: transform 500ms, opacity 500ms;
  transform: translate(-50%, 0);
  opacity: 1;
}

.form-change-enter {
  transform: translate(-50%, -10%);
  opacity: 0;
}

.form-change-leave-to {
  transform: translate(-50%, 10%);
  opacity: 0;
}

@media (min-width: $tablet-small) {
  main {
    width: 740px;
    margin-top: 20vh;
  }

  .contact-icon {
    margin-bottom: 3.4em;
  }

  .wrap {
    width: 100%;
    max-width: 20em;
    margin: {
      top: 0;
      left: auto;
      right: auto;
    }
  }
}
</style>
