<template>
  <main>
    <coveringletter-icon />

    <nuxt-link to="/" class="back-button"></nuxt-link>

    <p>Hi,</p>

    <p>
      I&rsquo;m Nick. I&rsquo;ve built this website because as a web developer I
      think it&rsquo;s a good thing to have to do a bit of experimentation and
      R&amp;D. This site is built with Nuxt.js to server-side render Vue, which
      should hopefully give a fast, application-like feel. The next steps for me
      with the site are to build a CMS with an API to drive the content either
      with C# and Umbraco (as I do a small amount of that at work) or PHP and
      Codeigniter which is what I normally use for personal projects.
    </p>
    <p class="explode-highlight">
      I currently work as a FE developer for an agency building websites and
      iPad-based data visualisation applications for the pharmaceuticals
      industry using Webpack, Vue and Node.
    </p>
    <p>
      In the last year I&rsquo;ve had the opportunity to use the Meteor
      full-stack JS framework (with Blaze for the FE) to build an application
      with live data reloading as well as Vue.js for data visualisation
      projects.
    </p>
    <p>
      I&rsquo;ve also developed an Electron application which analyses HTML
      emails to highlight and in some cases automatically correct code issues
      before they get to testing.
    </p>
    <p>
      To give an idea of my coding style, I&rsquo;ve embraced a lot of ES6
      features in Javascript and I'm a big fan of Airbnb's javascript style
      guide (<a href="https://github.com/airbnb/javascript" target="_blank"
        >https://github.com/airbnb/javascript</a
      >) so I now use classes for any object I&rsquo;m going to initialise with
      the &lsquo;new&rsquo; keyword. I use arrow functions as default unless I
      specifically need access to the internal &lsquo;this&rsquo; object (event
      handlers for example). I don&rsquo;t use &lsquo;var&rsquo; at all any
      more, instead using &lsquo;const&rsquo; & &lsquo;let&rsquo; (primarily
      &lsquo;const&rsquo; as I try to embrace more functional programming). I
      use async/await instead of callbacks. I&rsquo;m still undecided on
      TypeScript; I think it adds some useful features but I also don&rsquo;t
      like to move too far away from natural Javascript.
    </p>

    <p>
      There are a few ideas that I&rsquo;ve got in mind to learn about next.
      I&rsquo;ve taken on board some aspects of functional programming like
      using &lsquo;map&rsquo; and &lsquo;reduce&rsquo; instead of for loops and
      not mutating variables, but there are more terms that I want to understand
      like functors, applicatives and monads.
    </p>

    <p>
      I've been fortunate enough to work with some very good managers and I've
      learnt a lot about leadership and team building which I'd like to bring to
      my working role going forward.
    </p>

    <p>
      I live in central Farnborough which makes it easy to reach a lot of places
      quickly, from London to Southampton and Reading to Guildford.
    </p>
    <p>
      Outside of work I&rsquo;m a keen runner and I enjoy writing and recording
      music.
    </p>
    <p>
      Thank you very much for your time. You can head over to my
      <nuxt-link to="/cv">CV</nuxt-link> page to read an abridged version of my
      CV, and please do get in touch via the
      <nuxt-link to="/contact">contact</nuxt-link> page.
    </p>

    <p>
      You can also find me on
      <a href="https://linkedin.com/in/nick-heal-32208153" target="_blank"
        >LinkedIn</a
      >
      and <a href="https://github.com/nickheal" target="_blank">GitHub</a>
    </p>

    <p>All the best,</p>
    <p class="implode-highlight">Nicholas Heal</p>
  </main>
</template>

<script>
import CoveringletterIcon from '~/components/active-icons/coveringletter-icon.vue'

export default {
  components: {
    CoveringletterIcon,
  },
}
</script>

<style lang="scss" scoped>
@import './assets/style/config';

main {
  position: relative;
  width: 90%;
  margin: 2em auto;
  transform: translate3d(0, 0, 0); // Chrome repaint glitch fix
}

.coveringletter-icon {
  width: 15%;
  margin: 0 auto 2em;
}

.back-button {
  margin-bottom: 2.4em;
  margin-left: -0.25em;
}

p {
  margin-bottom: 1.4em;
  line-height: 1.375;
}

.explode-highlight {
  position: relative;
  font-size: 1.2em;
  line-height: 1.75;
  margin-top: 1.3em;
  margin-bottom: 1.5em;
  text-align: center;
  color: $text-dark-grey;
  transform: translate3d(0, 0, 0);

  &::before {
    content: '';
    display: block;
    position: absolute;
    top: -0.5em;
    left: -0.75em;
    z-index: -1;
    width: calc(100% + 1.5em);
    height: calc(100% + 1em);
    background: #eee;
  }
}

.implode-highlight {
  padding: 0.5em 22px;
  background: #333;
  color: $white;
  font-size: 1.2em;
  margin-top: 1.5em;
  font-weight: 700;
}

@media (min-width: $tablet-small) {
  main {
    width: 550px;
    margin-top: 20vh;
    margin-bottom: 20vh;
  }

  .coveringletter-icon {
    margin-bottom: 3.3em;
  }
}
</style>
