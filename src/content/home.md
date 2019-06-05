## Maarten.dev

Welcome to maarten.dev! This is the web page where I showcase my projects, talk
about my experience in (web) development and show off some of the stuff and techniques that I
learned along the way. I've also put down a list of things that I want to research and learn in the future.

This website consists of an Nginx web server that offloads SSL/TLS running in front of a
NodeJS application that serves HTML pages. These pages are created using Twig, a templating
engine that I often use in Symfony applications and styling is done with Sass stylesheets.

Both the Nginx server and the NodeJS app run in Docker containers that are automatically deployed
using an Ansible script. Anytime I commit new changes on Github a Travis-CI pipeline
runs and automatically deploys the new code to my virtual Linux server(s).

You might have guessed from this introduction that I'm more into backend/DevOps than
frontend development. This is true, I often find setting
up environments and servers more fun than styling web pages. You can find more information on
who I am and why I love what I do on the [about me](/about) page.

Feel free to have a look at what I've made in the past! :)