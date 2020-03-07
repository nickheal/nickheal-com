<template>
  <main>
    <cv-icon />

    <section class="cv-block">
      <div class="cv-block__left-column">
        <nuxt-link to="/" class="back-button"></nuxt-link>
      </div>
      <div class="cv-block__right-column">
        <h1>Nicholas Heal</h1>
        <h2>FE Developer</h2>
      </div>
    </section>

    <section class="cv-block">
      <div class="cv-block__left-column">
        <h3>Skills</h3>
      </div>
      <div class="cv-block__right-column">
        <p>
          Passionate self-starting FE developer with experience using HTML, CSS,
          and JavaScript across the full-stack in both Agile and Waterfall
          development environments and GIT for source control.
        </p>
      </div>
    </section>

    <section class="cv-block">
      <div class="cv-block__left-column">
        <h3>Experience</h3>
      </div>
      <div class="cv-block__right-column">
        <p class="cv-block__employer">
          <strong>Pharmiweb Solutions /</strong> Developer
        </p>
        <p class="cv-block__dates">JULY 2015 - PRESENT, BRACKNELL</p>
        <p class="cv-block__description">
          Front-end specialist on responsive website and web applications and FE
          lead on our largest project. Using semantic HTML, CSS (BEM style) &
          Javascript as well as build-process tools and frameworks including
          Node, Webpack, Gulp, Electron, Meteor and Vue.js.
        </p>
        <p class="cv-block__employer">
          <strong>Bauer Media /</strong> Interactive Developer
        </p>
        <p class="cv-block__dates">OCTOBER 2014 - JUNE 2015, LONDON</p>
        <p class="cv-block__description">
          Developing responsive websites and replacing interactive flash content
          with HTML5 and Javascript.
        </p>
        <p class="cv-block__employer">
          <strong>Contractor (primarily IAC Acoustics) /</strong> 3d
          Animator/Developer
        </p>
        <p class="cv-block__dates">AUGUST 2011 - SEPTEMBER 2014, WINCHESTER</p>
        <p class="cv-block__description">
          Producing 3D fly-through visualisations using Cinema4D.
        </p>
      </div>
    </section>

    <section class="cv-block">
      <div class="cv-block__left-column">
        <h3>Education</h3>
      </div>
      <div class="cv-block__right-column">
        <p class="cv-block__employer">
          <strong>University of Sussex /</strong> Music Informatics 2:1
        </p>
        <p class="cv-block__dates">SEPTEMBER 2008 - JUNE 2011, BRIGHTON</p>
        <p class="cv-block__description">
          A split course between music and computer science where I covered
          subjects including AI/Machine learning, sound generation and UI
          design, mostly in JAVA.
        </p>
        <p class="cv-block__employer">
          <strong>Farnborough 6th Form /</strong> AABD
        </p>
        <p class="cv-block__dates">SEPTEMBER 2006 - JUNE 2008, FARNBOROUGH</p>
        <p class="cv-block__description">
          In order of grades above: Computing, Music Technology, Maths &
          Classical Civilisations.
        </p>
      </div>
    </section>
  </main>
</template>

<script>
import CvIcon from '~/components/active-icons/cv-icon.vue'

export default {
  components: {
    CvIcon
  }
}
</script>

<style lang="scss" scoped>
@import './assets/style/config';

main {
  position: relative;
  width: 90%;
  margin: 2em auto;
}

.cv-icon {
  width: 15%;
  margin: 0 auto 2em;
}

.back-button {
  margin-bottom: 1em;
}

h1 {
  font-size: 2em;
  margin-bottom: 0.1em;
}

h2 {
  color: $pri;
  margin-bottom: 0.15em;
}

h3 {
  position: relative;
  font-weight: 700;
  padding: 2em 0 0.5em;
  margin-bottom: 0.8em;

  &:after {
    content: '';
    position: absolute;
    top: 100%;
    left: 0;
    width: 0;
    height: 0.25em;
    background: $pri;
    animation: dividers-in 500ms;
    animation-fill-mode: forwards;
  }
}

.cv-block__right-column {
  opacity: 0;
  transform: scaleY(0);
  transform-origin: top center;
  animation: content-in 500ms;
  animation-fill-mode: forwards;

  & p {
    &:last-child {
      margin-bottom: 0.3em;
    }
  }
}

.cv-block {
  @for $i from 0 through 10 {
    &:nth-child(#{$i}) {
      h3 {
        &:after {
          animation-delay: #{($i - 1) * 250}ms;
        }
      }

      .cv-block__right-column {
        animation-delay: #{($i - 1) * 250}ms;
      }
    }
  }
}

@keyframes dividers-in {
  0% {
    width: 0;
  }
  100% {
    width: 100%;
  }
}

@keyframes content-in {
  0% {
    opacity: 0;
    transform: scaleY(0);
  }
  100% {
    opacity: 1;
    transform: scaleY(1);
  }
}

p {
  margin-bottom: 1em;
  line-height: 1.375;
}

.cv-block__employer {
  margin-bottom: 0.15em;
}

.cv-block__dates {
  color: $text-grey;
  font-size: 0.9em;
  margin-bottom: 0.85em;
  text-transform: uppercase;
}

.cv-block__description {
  margin-bottom: 1.35em;
}

@media (min-width: $tablet-small) {
  main {
    width: 740px;
    margin-top: 20vh;
  }

  .cv-icon {
    margin-bottom: 3.9em;
  }

  .back-button {
    position: absolute;
    top: 0;
    left: 0;
  }

  h3 {
    padding-top: 0;
    margin-bottom: 1em;

    &:after {
      content: none;
    }
  }

  .cv-block {
    position: relative;
    display: flex;
  }
  .cv-block__left-column {
    width: 25%;
    margin-top: 3.15em;
  }
  .cv-block__right-column {
    width: 75%;
    border-top: solid 0.25em $black;
    padding: 1em 1em 0;
    margin-top: 2em;

    & p {
      &:last-child {
        margin-bottom: 0.85em;
      }
    }
  }
  .cv-block {
    &:first-of-type {
      .cv-block__right-column {
        border-top: 0;
        margin-top: 0;
        padding-top: 0;
      }
    }
  }
}
</style>
